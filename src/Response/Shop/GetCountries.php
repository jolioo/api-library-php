<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\Response\Shop\Item\Country;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetCountries
 * @package JoliooAPI\Response\Shop
 * @property-read Country[] $countries
 */
class GetCountries extends ResponseAbstract {
    /**
     * @return Country[]
     */
    protected function format_countries_attribute(array $shops) {
        return array_map(
            function(\stdClass $item) {
                return new Country($item);
            },
            $shops
        );
    }
}