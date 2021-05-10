<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\RequestAbstract;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetShops
 * @package Jolioo\JoliooAPI\Request\Shop
 */
class GetShops extends RequestAbstract {
    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/getshops';
    }

    /**
     * @return \JoliooAPI\Response\Shop\GetShops|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\GetShops($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}