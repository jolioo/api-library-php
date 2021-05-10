<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\Response\Shop\Item\Products;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetProducts
 * @package JoliooAPI\Response\Shop
 * @property-read Products $products
 */
class GetProducts extends ResponseAbstract {
    /**
     * @return Products
     */
    protected function format_products_attribute($obj) {
        return new Products($obj);
    }
}