<?php namespace JoliooAPI\Request\Shop\Item;

use JoliooAPI\Response\Shop\Item\Currency;
use JoliooAPI\Response\Shop\Item\Discount;
use JoliooAPI\Response\Shop\Item\Language;
use JoliooAPI\Response\Shop\Item\Property;

/**
 * Class PropertyValue
 * @package JoliooAPI\Request\Shop\Item
 */
class PropertyValue extends RequestItemAbstract {
    /**
     * @param Property|int $property_id
     * @param string|float|int|bool $value
     * @param Language|int $language_id
     */
    public function __construct($property_id, $value, $language_id = null) {
        parent::__construct([
            'shop_property_id' => ($property_id instanceof Property)? $property_id->shop_property_id : $property_id,
            'value' => serialize($value),
            'language_id' => ($language_id instanceof Language)? $language_id->language_id : $language_id,
        ]);
    }
}