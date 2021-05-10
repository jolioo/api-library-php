<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\AbstractClass;
use JoliooAPI\Response\Shop\Item\Customer;
use JoliooAPI\Response\Shop\Item\CustomerProduct;

/**
 * Class AddCustomerProduct
 * @package JoliooAPI\Response\Shop\Item
 * @property-read CustomerProduct[] $customer_products
 * @property-read string|null $customer_fullname_preview
 * @property-read Customer|null $customer
 */
class GenerateCustomerProduct extends AbstractClass {
    /**
     * @param \stdClass[] $arr
     * @return CustomerProduct[]
     */
    protected function format_customer_products_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new CustomerProduct($item);
            },
            $arr
        );
    }


    /**
     * @param \stdClass $obj
     * @return Customer
     */
    protected function format_customer_attribute(\stdClass $obj) {
        if ($obj) {
            return new Customer($obj);
        }
        return null;
    }
}