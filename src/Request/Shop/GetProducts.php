<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\RequestAbstract;
use JoliooAPI\Response\Shop\Item\Product;
use JoliooAPI\Response\Shop\Item\Shop;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetProducts
 * @package JoliooAPI\Request\Shop
 */
class GetProducts extends RequestAbstract {
    protected $shop_id;
    protected $product_id;
    protected $offset;
    protected $limit;

    /**
     * @param JoliooApiAbstract $api
     * @param Shop|int|null $shop_id
     * @param Product|int|null $product_id
     * @param int $offset
     * @param int $limit
     */
    public function __construct(JoliooApiAbstract $api, $offset = 0, $limit = 10, $shop_id = null, $product_id = null) {
        parent::__construct($api);
        $this->shop_id = ($shop_id && $shop_id instanceof Shop)? $shop_id->shop_id : $shop_id;
        $this->product_id = ($product_id && $product_id instanceof Product)? $product_id->product_id : $product_id;
        $this->offset = $offset;
        $this->limit = $limit;
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/getproducts';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'shop_id' => $this->shop_id,
                'product_id' => $this->product_id,
                'offset' => $this->offset,
                'limit' => $this->limit,
            ]
        );
    }


    /**
     * @return \JoliooAPI\Response\Shop\GetProducts|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\GetProducts($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}