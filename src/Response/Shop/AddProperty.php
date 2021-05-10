<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\Response\Shop\Item\Products;
use JoliooAPI\Response\Shop\Item\Property;
use JoliooAPI\ResponseAbstract;

/**
 * Class AddProperty
 * @package JoliooAPI\Response\Shop
 * @property-read bool $success
 * @property-read Property $property
 */
class AddProperty extends ResponseAbstract {
    /**
     * @return Property
     */
    protected function format_property_attribute($obj) {
        return new Property($obj);
    }
}