<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class Product
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $product_id
 * @property-read string $product_type
 * @property-read string $product_title
 * @property-read string|null $product_external_id
 * @property-read ProductTranslate[] $translations
 * @property-read int[] $shops
 * @property-read int[] $categories
 * @property-read int|null $category_default
 * @property-read ProductVersion[] $product_versions
 * @property-read ProductMedia[] $medias
 * @property-read Team $team
 * @property-read int[] $delivery_types
 * @property-read bool $product_stock_active
 * @property-read bool $product_dedication_available
 */
class Product extends AbstractClass {
    /**
     * @param \stdClass[] $arr
     * @return ProductTranslate[]
     */
    protected function format_translations_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new ProductTranslate($item);
            },
            $arr
        );
    }


    /**
     * @param \stdClass[] $arr
     * @return ProductVersion[]
     */
    protected function format_product_versions_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new ProductVersion($item);
            },
            $arr
        );
    }


    /**
     * @param \stdClass[] $arr
     * @return ProductMedia[]
     */
    protected function format_medias_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new ProductMedia($item);
            },
            $arr
        );
    }


    /**
     * @param \stdClass $elem
     * @return Team
     */
    protected function format_team_attribute(\stdClass $elem) {
        return new Team($elem);
    }
}