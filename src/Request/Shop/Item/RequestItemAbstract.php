<?php namespace JoliooAPI\Request\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class RequestItemAbstract
 * @package JoliooAPI\Request\Shop
 */
abstract class RequestItemAbstract extends AbstractClass {
    /**
     * @return string[]
     */
    public function getParameters() {
        return $this->_data;
    }
}