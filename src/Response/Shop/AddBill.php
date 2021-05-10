<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\Response\Shop\Item\Bill;
use JoliooAPI\Response\Shop\Item\CustomerAccountDelta;
use JoliooAPI\ResponseAbstract;

/**
 * Class AddBill
 * @package JoliooAPI\Response\Shop
 * @property-read Bill $bill
 * @property-read CustomerAccountDelta[] $customer_account_deltas
 */
class AddBill extends ResponseAbstract {
    /**
     * @param \stdClass $obj
     * @return Bill
     */
    protected function format_bill_attribute($obj) {
        return new Bill($obj);
    }

    /**
     * @param \stdClass[] $obj
     * @return CustomerAccountDelta[]
     */
    protected function format_customer_account_deltas_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new CustomerAccountDelta($item);
            },
            $arr
        );
    }
}