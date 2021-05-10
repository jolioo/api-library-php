<?php namespace JoliooAPI\Request\Shop;

/**
 * Class ReservationDeclineCustomerProduct
 * @package JoliooAPI\Request\Shop
 */
class ReservationDeclineCustomerProduct extends ReservationAcceptCustomerProduct {
    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/reservationdeclinecustomerproduct';
    }
}