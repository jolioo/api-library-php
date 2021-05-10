<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\RequestAbstract;
use JoliooAPI\Response\Shop\Item\CustomerProductDelta;
use JoliooAPI\ResponseAbstract;

/**
 * Class ReservationAcceptCustomerProduct
 * @package JoliooAPI\Request\Shop
 */
class ReservationAcceptCustomerProduct extends RequestAbstract {
    protected $customer_product_delta_id;

    /**
     * @param JoliooApiAbstract $api
     * @param CustomerProductDelta|int $customer_product_delta_id
     */
    public function __construct(JoliooApiAbstract $api, $customer_product_delta_id) {
        parent::__construct($api);
        $this->customer_product_delta_id = ($customer_product_delta_id instanceof CustomerProductDelta)? $customer_product_delta_id->customer_product_delta_id : $customer_product_delta_id;
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/reservationacceptcustomerproduct';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'delta_id' => $this->customer_product_delta_id,
            ]
        );
    }


    /**
     * @return \JoliooAPI\Response\Shop\CustomerProductTransaction|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\CustomerProductTransaction($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}