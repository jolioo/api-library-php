<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\ResponseAbstract;

/**
 * Class GetCustomerProductPdf
 * @package JoliooAPI\Response\Shop
 * @property-read string|null $pdf
 */
class GetCustomerProductPdf extends ResponseAbstract {
    /**
     * @param string $val
     * @return string
     */
    protected function format_pdf_attribute($val) {
        return base64_decode($val);
    }
}