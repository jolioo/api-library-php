<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class BillLine
 * @package JoliooAPI\Response\Shop\Item
 * @property-read string|null $bill_line_title
 * @property-read string|null $bill_line_subtitle
 * @property-read int|null $product_version_id
 * @property-read float $bill_line_price
 * @property-read float $bill_line_amount
 * @property-read float $bill_line_unit
 * @property-read float $bill_line_sum
 * @property-read float $bill_line_discount
 * @property-read float $bill_line_tax_sum
 * @property-read float $bill_line_total
 * @property-read BillLineTax[] $bill_line_taxes
 */
class BillLine extends AbstractClass {
    /**
     * @param array $arr
     * @return BillLineTax[]
     */
    protected function format_bill_line_taxes_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new BillLineTax($item);
            },
            $arr
        );
    }
}