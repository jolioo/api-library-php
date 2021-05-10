<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\AbstractClass;
use JoliooAPI\Response\Shop\Item\CustomerProductDetails;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetCustomerProductDetails
 * @package JoliooAPI\Response\Shop
 * @property-read CustomerProductDetails|null $customer_product
 */
class GetCustomerProductDetails extends ResponseAbstract {
    /**
     * @param \stdClass|null $obj
     * @return CustomerProductDetails
     */
    protected function format_customer_product_attribute($obj) {
        if ($obj) {
            return new CustomerProductDetails($obj);
        }
        return null;
    }
}