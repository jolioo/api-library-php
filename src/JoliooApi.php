<?php namespace JoliooAPI;

/**
 * Class JoliooApi
 * @package JoliooAPI
 */
class JoliooApi extends JoliooApiAbstract {
    /**
     * @param string $apiKey
     * @param string $apiSecret
     * @param string $defaultLanguage
     * @param string|null $sessionToken
     */
    public function __construct($apiKey, $apiSecret, $defaultLanguage = self::LANGUAGE_LOCALE_DE, $sessionToken = null) {
        parent::__construct($apiKey, $apiSecret, 'https://app.jolioo.com/api/', $defaultLanguage, $sessionToken);
    }

    /**
     * @param string $log
     * @return bool|int
     */
    public function log($log) {
        return file_put_contents('jolioo-api-'.date('Ymd').'.log', $log, FILE_APPEND);
    }
}