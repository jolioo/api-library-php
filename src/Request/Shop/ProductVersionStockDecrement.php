<?php namespace JoliooAPI\Request\Shop;

/**
 * Class ProductVersionStockDecrement
 * @package JoliooAPI\Request\Shop
 */
class ProductVersionStockDecrement extends ProductVersionStockIncrement {
    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/decrementproductversionstock';
    }
}