<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\Response\Shop\Item\Product;
use JoliooAPI\ResponseAbstract;

/**
 * Class AddProduct
 * @package JoliooAPI\Response\Shop
 * @property-read bool $success
 * @property-read Product $product
 */
class AddProduct extends ResponseAbstract {
    /**
     * @param \stdClass $obj
     * @return Product
     */
    protected function format_product_attribute($obj) {
        return new Product($obj);
    }
}