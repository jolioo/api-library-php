<?php namespace JoliooAPI\Request\Shop\Item;

/**
 * Class BillLineTax
 * @package JoliooAPI\Request\Shop\Item
 */
class BillLineTax extends RequestItemAbstract {
    /**
     * @param float $value
     * @param float $percent
     */
    public function __construct($value, $percent = 100.00) {
        parent::__construct([
            'bill_line_tax_value' => $value,
            'bill_line_tax_procent' => $percent,
        ]);
    }
}