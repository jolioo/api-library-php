<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class DeliveryType
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $delivery_type_id
 * @property-read string $shop_delivery_type_title
 * @property-read bool $shop_delivery_type_require_email
 * @property-read bool $shop_delivery_type_require_address
 * @property-read DeliveryTypeTranslation[] $translations
 */
class DeliveryType extends AbstractClass {
    /**
     * @param \stdClass[] $arr
     * @return DiscountTranslation[]
     */
    protected function format_translations_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new DeliveryTypeTranslation($item);
            },
            $arr
        );
    }
}