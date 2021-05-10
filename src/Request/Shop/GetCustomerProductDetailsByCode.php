<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\RequestAbstract;
use JoliooAPI\Response\Shop\Item\CustomerProduct;
use JoliooAPI\Response\Shop\Item\Shop;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetCustomerProductDetailsByCode
 * @package JoliooAPI\Request\Shop
 */
class GetCustomerProductDetailsByCode extends RequestAbstract {
    protected $code;

    /**
     * @param JoliooApiAbstract $api
     * @param string $code
     */
    public function __construct(JoliooApiAbstract $api, $code) {
        parent::__construct($api);
        $this->code = $code;
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/getcustomerproductdetails';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'code' => $this->code,
            ]
        );
    }


    /**
     * @return \JoliooAPI\Response\Shop\GetCustomerProductDetails|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\GetCustomerProductDetails($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}