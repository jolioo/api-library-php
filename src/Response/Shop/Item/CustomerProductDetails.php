<?php namespace JoliooAPI\Response\Shop\Item;

/**
 * Class CustomerProductDetails
 * @package JoliooAPI\Response\Shop\Item
 * @property-read string|null $customer_fullname_preview
 * @property-read Customer|null $customer
 * @property-read Product|null $product
 */
class CustomerProductDetails extends CustomerProduct {
    /**
     * @param string $val
     * @return Customer|null
     */
    protected function format_customer_attribute($val) {
        if ($val) {
            return new Customer($val);
        }
        return null;
    }

    /**
     * @param string $val
     * @return Product|null
     */
    protected function format_product_attribute($val) {
        if ($val) {
            return new Product($val);
        }
        return null;
    }
}