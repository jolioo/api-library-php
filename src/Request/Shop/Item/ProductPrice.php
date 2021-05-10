<?php namespace JoliooAPI\Request\Shop\Item;

use JoliooAPI\Response\Shop\Item\Currency;
use JoliooAPI\Response\Shop\Item\Discount;

/**
 * Class ProductPrice
 * @package JoliooAPI\Request\Shop\Item
 * @property-read string $price_type
 * @property-read float $price
 * @property-read Currency|int $currency_id
 * @property-read float|null $discount_id
 */
class ProductPrice extends RequestItemAbstract {
    /**
     * @param string $price_type
     * @param \JoliooAPI\Response\Shop\Item\ProductPrice|int $price_id
     * @param Currency|int $currency_id
     * @param float|null $discount_precental
     */
    public function __construct($price_type, $price, $currency_id, $discount_precental = null) {
        parent::__construct([
            'product_version_price_type' => $price_type,
            'product_price_value' => $price,
            'currency_id' => ($currency_id instanceof Currency)? $currency_id->currency_id : $currency_id,
            'product_price_discount' => $discount_precental,
        ]);
    }
}