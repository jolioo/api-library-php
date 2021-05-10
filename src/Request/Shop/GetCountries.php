<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\RequestAbstract;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetCountries
 * @package JoliooAPI\Request\Shop
 */
class GetCountries extends RequestAbstract {
    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/getcountries';
    }

    /**
     * @return \JoliooAPI\Response\Shop\GetCountries|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\GetCountries($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}