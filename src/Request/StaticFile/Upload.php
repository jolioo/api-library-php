<?php namespace JoliooAPI\Request\StaticFile;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\Request\Shop\Item\CategoryTranslate;
use JoliooAPI\RequestAbstract;
use JoliooAPI\ResponseAbstract;

/**
 * Class Upload
 * @package JoliooAPI\Request\StaticFile
 */
class Upload extends RequestAbstract {
    protected $filepath;
    protected $filename;

    /**
     * @param JoliooApiAbstract $api
     * @param string $filepath
     * @param string|null $filename
     */
    public function __construct(JoliooApiAbstract $api, $filepath, $filename = null) {
        parent::__construct($api);
        $this->filepath = $filepath;
        $this->filename = ($filename)?: basename($filepath);
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'static-file/upload';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'filename' => $this->filename,
            ]
        );
    }

    /**
     * @inheritDoc
     */
    protected function getFiles() {
        return [
            'file' => $this->filepath,
        ];
    }

    /**
     * @return \JoliooAPI\Response\StaticFile\Upload|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\StaticFile\Upload($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}