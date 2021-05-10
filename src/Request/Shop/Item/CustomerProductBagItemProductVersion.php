<?php namespace JoliooAPI\Request\Shop\Item;

use JoliooAPI\Response\Shop\Item\ProductVersion;

/**
 * Class CustomerProductBagItemProductVersion
 * @package JoliooAPI\Request\Shop\Item
 * @property-read int $product_version_id
 */
class CustomerProductBagItemProductVersion extends CustomerProductBagItemAbstract {
    /**
     * @param ProductVersion|int $product_version_id
     * @param float|null $value
     */
    public function __construct($product_version_id, $amount = 1, $value = null) {
        parent::__construct([
            'product_version_id' => ($product_version_id instanceof ProductVersion)? $product_version_id->product_version_id : $product_version_id,
            'amount' => $amount,
            'value' => $value,
        ]);
    }

    /**
     * @return array
     */
    public function getRequestParameters() {
        return array_merge(
            parent::getRequestParameters(),
            [
                'product_version_id' => $this->product_version_id,
            ]);
    }
}