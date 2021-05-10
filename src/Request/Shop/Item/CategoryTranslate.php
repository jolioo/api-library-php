<?php namespace JoliooAPI\Request\Shop\Item;

use JoliooAPI\Response\Shop\Item\Language;

/**
 * Class CategoryTranslate
 * @package JoliooAPI\Request\Shop
 * @property-read int $language_id
 * @property-read string $shop_property_title
 */
class CategoryTranslate extends RequestItemAbstract {
    /**
     * @param Language|int $language_id
     * @param string $shop_category_title
     * @param string|null $shop_category_description
     */
    public function __construct($language_id, $shop_category_title, $shop_category_description = null) {
        parent::__construct([
            'language_id' => ($language_id instanceof Language)? $language_id->language_id : $language_id,
            'shop_category_title' => $shop_category_title,
            'shop_category_description' => $shop_category_description,
        ]);
    }
}