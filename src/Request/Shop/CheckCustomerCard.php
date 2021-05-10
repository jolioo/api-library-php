<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\RequestAbstract;
use JoliooAPI\ResponseAbstract;

/**
 * Class CheckCustomerCard
 * @package Jolioo\JoliooAPI\Request\Shop
 */
class CheckCustomerCard extends RequestAbstract {
    protected $customer_card_nr;

    /**
     * @param JoliooApiAbstract $api
     * @param string $customer_card_nr
     */
    public function __construct(JoliooApiAbstract $api, $customer_card_nr) {
        parent::__construct($api);
        $this->customer_card_nr = trim($customer_card_nr)?: null;
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/checkcustomercard';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'customercardnr' => $this->customer_card_nr,
            ]
        );
    }

    /**
     * @return \JoliooAPI\Response\Shop\CheckCustomerCard|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\CheckCustomerCard($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}