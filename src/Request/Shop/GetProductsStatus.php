<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetProductsStatus
 * @package JoliooAPI\Request\Shop
 */
class GetProductsStatus extends GetProducts {
    protected $updated_at_from;

    public function __construct(JoliooApiAbstract $api, $offset = 0, $limit = 10, $shop_id = null, \DateTime $updateAtFrom = null) {
        parent::__construct($api, $offset, $limit, $shop_id);
        $this->updated_at_from = ($updateAtFrom)? $updateAtFrom->format(\DateTime::W3C) : null;
    }


    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/getproductsstatus';
    }


    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'updated_at_from' => $this->updated_at_from,
            ]
        );
    }


    /**
     * @return \JoliooAPI\Response\Shop\GetProductsStatus|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\GetProductsStatus($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}