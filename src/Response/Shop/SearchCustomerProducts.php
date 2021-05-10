<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\Response\Shop\Item\CustomerProducts;
use JoliooAPI\ResponseAbstract;

/**
 * Class SearchCustomerProducts
 * @package JoliooAPI\Response\Shop
 * @property-read CustomerProducts $products
 */
class SearchCustomerProducts extends ResponseAbstract {
    /**
     * @return CustomerProducts
     */
    protected function format_customer_products_attribute($obj) {
        return new CustomerProducts($obj);
    }
}