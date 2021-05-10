<?php namespace JoliooAPI\Request\Shop\Item;

use JoliooAPI\Response\Shop\Item\Language;

/**
 * Class ProductTranslate
 * @package JoliooAPI\Request\Shop
 * @property-read int $language_id
 * @property-read string $product_title
 * @property-read string|null $product_subtitle
 * @property-read string|null $product_details
 * @property-read string|null $product_content
 * @property-read string|null $product_validity_text
 */
class ProductTranslate extends RequestItemAbstract {
    /**
     * @param Language|int $language_id
     * @param string $product_title
     * @param string|null $product_subtitle
     * @param string|null $product_details
     * @param string|null $product_content
     * @param string|null $product_validity_text
     */
    public function __construct($language_id, $product_title = null, $product_subtitle = null, $product_details = null, $product_content = null, $product_validity_text = null) {
        parent::__construct([
            'language_id' => ($language_id instanceof Language)? $language_id->language_id : $language_id,
            'product_title' => $product_title,
            'product_subtitle' => $product_subtitle,
            'product_details' => $product_details,
            'product_content' => $product_content,
            'product_validity_text' => $product_validity_text,
        ]);
    }
}