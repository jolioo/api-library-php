<?php namespace JoliooAPI\Response\StaticFile;

use JoliooAPI\Response\StaticFile\Item\StaticFile;
use JoliooAPI\ResponseAbstract;

/**
 * Class Upload
 * @package JoliooAPI\Response\Shop
 * @property-read bool $success
 * @property-read StaticFile $static_file
 */
class Upload extends ResponseAbstract {
    /**
     * @param \stdClass $obj
     * @return StaticFile
     */
    protected function format_static_file_attribute($obj) {
        return new StaticFile($obj);
    }
}