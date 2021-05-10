<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\Request\Shop\Item\CustomerProductBag;
use JoliooAPI\Request\Shop\Item\CustomerProductBagItemAbstract;
use JoliooAPI\Request\Shop\Item\PersondataAutoCustomer;
use JoliooAPI\RequestAbstract;
use JoliooAPI\Response\Shop\Item\Customer;

/**
 * Class AddCustomerProduct
 * @package JoliooAPI\Request\Shop
 */
class GenerateCustomerProduct extends RequestAbstract {
    protected $customer_product_bag;
    protected $recipient;

    /**
     * @param JoliooApiAbstract $api
     * @param CustomerProductBag $customer_product_bag
     * @param Customer|PersondataAutoCustomer $recipient
     */
    public function __construct(JoliooApiAbstract $api, CustomerProductBag $customer_product_bag, $recipient) {
        parent::__construct($api);
        $this->customer_product_bag = $customer_product_bag;
        if ($recipient instanceof PersondataAutoCustomer || $recipient instanceof Customer) {
            $this->recipient = $recipient;
        }
        else {
            throw new \Exception('Invalid recipient!');
        }
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/generatecustomerproduct';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'items' => array_map(
                    function(CustomerProductBagItemAbstract $item) {
                        return $item->getRequestParameters();
                    },
                    $this->customer_product_bag->items
                ),
            ],
            ($this->recipient instanceof Customer)?
                [
                    'customer_id' => $this->recipient->customer_id
                ]:
                [
                    'customer_team_id' => $this->recipient->customer_team_id,
                    'persondata_company' => $this->recipient->persondata_company,
                    'persondata_uid' => $this->recipient->persondata_uid,
                    'persondata_title_before' => $this->recipient->persondata_title_before,
                    'persondata_firstname' => $this->recipient->persondata_firstname,
                    'persondata_lastname' => $this->recipient->persondata_lastname,
                    'persondata_title_after' => $this->recipient->persondata_title_after,
                    'persondata_street' => $this->recipient->persondata_street,
                    'persondata_postcode' => $this->recipient->persondata_postcode,
                    'persondata_postname' => $this->recipient->persondata_postname,
                    'country_id' => $this->recipient->country_id,
                    'persondata_email' => $this->recipient->persondata_email,
                    'persondata_mobile' => $this->recipient->persondata_mobile,
                    'persondata_phone' => $this->recipient->persondata_phone,
                    'persondata_www' => $this->recipient->persondata_www,
                    'persondata_sex' => $this->recipient->persondata_sex,
                    'persondata_birthday' => $this->recipient->persondata_birthday,
                ]
        );
    }


    /**
     * @return \JoliooAPI\Response\Shop\GenerateCustomerProduct|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\GenerateCustomerProduct($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}