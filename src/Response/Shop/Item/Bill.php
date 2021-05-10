<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class Bill
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $bill_id
 * @property-read string $bill_nr
 * @property-read \DateTime $bill_date
 * @property-read Currency $currency
 * @property-read BillLine[] $bill_lines
 * @property-read float $bill_sum
 * @property-read float $bill_discount
 * @property-read float $bill_tax_sum
 * @property-read float $bill_total
 */
class Bill extends AbstractClass {
    /**
     * @param string $val
     * @return \DateTime|false|null
     */
    protected function format_bill_date_attribute($val) {
        if ($val) {
            return \DateTime::createFromFormat(\DateTime::W3C, $val);
        }
        return null;
    }

    /**
     * @param \stdClass $val
     * @return Currency
     */
    protected function format_currency_attribute($val) {
        return new Currency($val);
    }

    /**
     * @param \stdClass[] $val
     * @return BillLine[]
     */
    protected function format_bill_lines_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new BillLine($item);
            },
            $arr
        );
    }
}