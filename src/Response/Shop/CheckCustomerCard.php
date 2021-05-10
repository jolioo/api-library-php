<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\ResponseAbstract;

/**
 * Class CheckCustomerCard
 * @package JoliooAPI\Response\Shop
 * @property-read bool $exist
 * @property-read string $customercard
 * @property-read string $customercard_full
 * @property-read int|null $customer_id
 * @property-read bool|null $customer_autocreated
 * @property-read string|null $customer_fullname
 * @property-read CustomerAccount[] $customer_accounts
 */
class CheckCustomerCard extends ResponseAbstract {
    /**
     * @param \stdClass[] $arr
     * @return CustomerAccount[]
     */
    protected function format_customer_accounts_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new CustomerAccount($item);
            },
            $arr
        );
    }
}