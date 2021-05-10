<?php namespace JoliooAPI\Request\Shop\Item;

/**
 * Class BillLine
 * @package JoliooAPI\Request\Shop\Item
 */
class BillLine extends RequestItemAbstract {
    /**
     * @param string $title
     * @param string|null $subtitle
     */
    public function __construct($title, $subtitle = null) {
        parent::__construct([
            'bill_line_title' => trim($title)?: null,
            'bill_line_subtitle' => trim($subtitle)?: null,
        ]);
    }

    public function setProductVersion($productVersion) {
        $this->_data['product_version_id'] = ($productVersion instanceof \JoliooAPI\Response\Shop\Item\ProductVersion)? $productVersion->product_version_id : $productVersion;
        return $this;
    }

    /**
     * @param float $price
     * @param float $amount
     * @param string|null $unit
     * @param float $discountAbs
     * @return $this
     */
    public function setPricing($price, $amount, $unit, $discountAbs) {
        $this->_data['bill_line_price'] = $price;
        $this->_data['bill_line_amount'] = $amount;
        $this->_data['bill_line_unit'] = trim($unit)?: null;
        $this->_data['bill_line_discount'] = $discountAbs;
        return $this;
    }

    /**
     * @param BillLineTax[]|BillLineTax $taxes
     * @return $this
     */
    public function setTaxes($taxes) {
        $this->_data['bill_line_taxes'] = is_array($taxes)? $taxes : [ $taxes ];
        return $this;
    }
}