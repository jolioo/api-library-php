<?php namespace JoliooAPI\Request\Shop\Item;

use JoliooAPI\Response\Shop\Item\Language;

/**
 * Class PropertyTranslate
 * @package JoliooAPI\Request\Shop
 * @property-read int $language_id
 * @property-read string $shop_property_title
 */
class PropertyTranslate extends RequestItemAbstract {
    /**
     * @param Language|int $language_id
     * @param string $shop_property_title
     */
    public function __construct($language_id, $shop_property_title) {
        parent::__construct([
            'language_id' => ($language_id instanceof Language)? $language_id->language_id : $language_id,
            'shop_property_title' => $shop_property_title,
        ]);
    }
}