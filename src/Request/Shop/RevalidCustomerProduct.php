<?php namespace JoliooAPI\Request\Shop;

/**
 * Class RevalidCustomerProduct
 * @package JoliooAPI\Request\Shop
 */
class RevalidCustomerProduct extends InvalidateCustomerProduct {
    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/revalidcustomerproduct';
    }
}