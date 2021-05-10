<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\Response\Shop\Item\ProductsStatus;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetProducts
 * @package JoliooAPI\Response\Shop
 * @property-read ProductsStatus $products
 */
class GetProductsStatus extends ResponseAbstract {
    /**
     * @return ProductsStatus
     */
    protected function format_products_attribute($obj) {
        return new ProductsStatus($obj);
    }
}