<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\RequestAbstract;
use JoliooAPI\Response\Shop\Item\Shop;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetShopDetails
 * @package JoliooAPI\Request\Shop
 */
class GetShopDetails extends RequestAbstract {
    protected $shop_id;

    /**
     * @param JoliooApiAbstract $api
     * @param Shop|int $shop_id
     */
    public function __construct(JoliooApiAbstract $api, $shop_id) {
        parent::__construct($api);
        $this->shop_id = ($shop_id instanceof Shop)? $shop_id->shop_id : $shop_id;
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/getshopdetails';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'shop_id' => $this->shop_id,
            ]
        );
    }


    /**
     * @return \JoliooAPI\Response\Shop\GetShopDetails|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\GetShopDetails($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}