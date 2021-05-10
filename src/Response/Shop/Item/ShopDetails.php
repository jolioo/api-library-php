<?php namespace JoliooAPI\Response\Shop\Item;

/**
 * Class ShopDetails
 * @package JoliooAPI\Response\Shop\Item
 * @property-read Language[] $languages
 * @property-read Property[] $properties
 * @property-read Category[] $categories
 * @property-read Currency[] $currencies
 * @property-read Discount[] $discounts
 * @property-read DeliveryType[] $delivery_types
 * @property-read Team[] $teams
 */
class ShopDetails extends Shop {
    /**
     * @param \stdClass[] $arr
     * @return Language[]
     */
    protected function format_languages_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new Language($item);
            },
            $arr
        );
    }

    /**
     * @param \stdClass[] $arr
     * @return Property[]
     */
    protected function format_properties_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new Property($item);
            },
            $arr
        );
    }

    /**
     * @param \stdClass[] $arr
     * @return Category[]
     */
    protected function format_categories_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new Category($item);
            },
            $arr
        );
    }

    /**
     * @param \stdClass[] $arr
     * @return Currency[]
     */
    protected function format_currencies_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new Currency($item);
            },
            $arr
        );
    }

    /**
     * @param \stdClass[] $arr
     * @return Discount[]
     */
    protected function format_discounts_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new Discount($item);
            },
            $arr
        );
    }

    /**
     * @param \stdClass[] $arr
     * @return Team[]
     */
    protected function format_teams_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new Team($item);
            },
            $arr
        );
    }

    /**
     * @param \stdClass[] $arr
     * @return DeliveryType[]
     */
    protected function format_delivery_types_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new DeliveryType($item);
            },
            $arr
        );
    }
}