<?php namespace JoliooAPI;

/**
 * Class RequestAbstract
 * @package JoliooAPI
 */
abstract class RequestAbstract {
    protected $api;

    /**
     * @return string
     */
    abstract protected function getPath();

    /**
     * @return array
     */
    protected function getParameters() {
        return [
            'language' => $this->api->getDefaultLanguage(),
        ];
    }

    /**
     * @return string[]
     */
    protected function getCookies() {
        return $this->api->getCookies();
    }

    /**
     * @return string[]
     */
    protected function getHeaders() {
        $res = array_merge(
            $this->api->getHeaders(),
            [
                'APIKEY' => $this->api->getApiKey(),
            ]);
        if ($st = $this->api->getSessionToken()) {
            $res['TOKEN'] = $st;
        }
        return $res;
    }

    /**
     * @return string[]
     */
    protected function getFiles() {
        return [];
    }

    /**
     * @return ResponseAbstract
     */
    abstract public function execute();

    /**
     * @param JoliooApiAbstract $api
     */
    public function __construct(JoliooApiAbstract $api) {
        $this->api = $api;
    }

    /**
     * @return JoliooApiAbstract
     */
    public function getApi() {
        return $this->api;
    }

    /**
     * @param array $params
     */
    protected static function cleanParameters(array &$params) {
        foreach ($params as $key => &$val) {
            if ($val === null || $val === '') {
                unset($params[$key]);
            }
            elseif (is_float($val)) {
                $val = number_format($val, 10, ',', '');
            }
            elseif (is_array($val)) {
                static::cleanParameters($val);
                if (empty($val)) {
                    unset($params[$key]);
                }
            }
        }
    }

    /**
     * @param bool $valid
     * @return ResponseAbstract|null
     */
    protected function executeIt(&$valid) {
        try {
            $ch = curl_init();

            $postdata = [];
            if ($parameters = $this->getParameters()) {
                static::cleanParameters($parameters);
                if (!empty($parameters)) {
                    $postdata = $parameters;
                }
            }

            $files = $this->getFiles();
            $sessionToken = $this->api->getSessionToken();

            $headers = $this->getHeaders();
            $headers['APIHASH'] = sha1($this->api->getApiSecret().'@'.(($sessionToken)?$sessionToken.'@':'').'api/'.$this->getPath().'@'.http_build_query($postdata));
            if (!empty($files)) {
                $headers['Cache-Control'] = 'no-cache';
            }

            if (!empty($files)) {
                foreach ($files as $field => $filepath) {
                    $mime = mime_content_type($filepath);
                    $postdata[$field] = new \CURLFile($filepath, ($mime)?: 'application/octet-stream', basename($filepath));
                }
            }

            if (!$this->api->validateConnection()) {
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            }

            curl_setopt($ch, CURLOPT_URL, $this->api->generateUrl($this->getPath()));

            $headersArr = array_map(
                function($key, $val) {
                    return urlencode($key).':'.urlencode($val);
                },
                array_keys($headers), array_values($headers)
            );
            if ($cookies = $this->getCookies()) {
                if (!empty($cookies)) {
                    $headersArr[] = 'COOKIE:'.http_build_query($cookies);
                }
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headersArr);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, empty($files)? http_build_query($postdata) : $postdata);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);

            curl_close ($ch);

            if ($resp = @json_decode($response)) {
                if (is_object($resp) && isset($resp->success) && $resp->success) {
                    $valid = true;
                    return $resp->data;
                }
            }
            $this->api->log('Invalid response from server: '.$response);
        }
        catch (\Exception $exception) {
            $this->api->logException($exception);
        }
        $valid = false;
        return null;
    }
}
