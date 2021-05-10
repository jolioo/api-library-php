<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\Response\Shop\Item\ShopDetails;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetShopDetails
 * @package JoliooAPI\Response\Shop
 * @property-read ShopDetails $shop
 */
class GetShopDetails extends ResponseAbstract {
    /**
     * @return ShopDetails
     */
    protected function format_shop_attribute($obj) {
        return new ShopDetails($obj);
    }
}