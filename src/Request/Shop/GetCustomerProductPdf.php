<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\RequestAbstract;
use JoliooAPI\Response\Shop\Item\CustomerProduct;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetCustomerProductPdf
 * @package JoliooAPI\Request\Shop
 */
class GetCustomerProductPdf extends RequestAbstract {
    protected $customer_product_id;

    /**
     * @param JoliooApiAbstract $api
     * @param CustomerProduct|int $customer_product_id
     */
    public function __construct(JoliooApiAbstract $api, $customer_product_id) {
        parent::__construct($api);
        $this->customer_product_id = ($customer_product_id instanceof CustomerProduct)? $customer_product_id->customer_product_id : $customer_product_id;
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/getcustomerproductpdf';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'customer_product_id' => $this->customer_product_id,
            ]
        );
    }


    /**
     * @return \JoliooAPI\Response\Shop\GetCustomerProductPdf|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\GetCustomerProductPdf($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}