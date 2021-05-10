<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class CustomerProduct
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $customer_product_id
 * @property-read int|null $product_id
 * @property-read string $customer_product_couponcode
 * @property-read string|null $customer_product_couponserial
 * @property-read string $customer_product_title
 * @property-read string|null $customer_product_media_preview
 * @property-read string $customer_product_state
 * @property-read \DateTime $customer_product_created_at
 * @property-read double $customer_product_value
 * @property-read double $customer_product_value_current
 * @property-read double $customer_product_value_reserved
 * @property-read int $currency_id
 */
class CustomerProduct extends AbstractClass {
    /**
     * @param string $val
     * @return \DateTime|false|null
     */
    protected function format_customer_product_created_at_attribute($val) {
        if ($val) {
            return \DateTime::createFromFormat(\DateTime::W3C, $val);
        }
        return null;
    }
}