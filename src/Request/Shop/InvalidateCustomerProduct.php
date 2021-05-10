<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\RequestAbstract;
use JoliooAPI\Response\Shop\Item\CustomerProduct;
use JoliooAPI\ResponseAbstract;

/**
 * Class InvalidateCustomerProduct
 * @package JoliooAPI\Request\Shop
 */
class InvalidateCustomerProduct extends RequestAbstract {
    protected $customer_product_id;
    protected $value;

    /**
     * @param JoliooApiAbstract $api
     * @param CustomerProduct|int $customer_product_id
     * @param float|null $value
     */
    public function __construct(JoliooApiAbstract $api, $customer_product_id, $value = null) {
        parent::__construct($api);
        $this->customer_product_id = ($customer_product_id instanceof CustomerProduct)? $customer_product_id->customer_product_id : $customer_product_id;
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/invalidatecustomerproduct';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'customer_product_id' => $this->customer_product_id,
                'value' => $this->value,
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