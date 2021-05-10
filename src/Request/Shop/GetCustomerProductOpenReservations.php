<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\RequestAbstract;
use JoliooAPI\Response\Shop\Item\CustomerProductDelta;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetCustomerProductOpenReservations
 * @package JoliooAPI\Request\Shop
 */
class GetCustomerProductOpenReservations extends GetCustomerProductHistory {
    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/getcustomerproductopenreservations';
    }

    /**
     * @return \JoliooAPI\Response\Shop\GetCustomerProductOpenReservations|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\GetCustomerProductOpenReservations($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}