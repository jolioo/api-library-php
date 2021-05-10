<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class Discount
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $discount_id
 * @property-read string $discount_title
 * @property-read bool $discount_scheduled
 * @property-read \DateTime|null $discount_schedule_from
 * @property-read \DateTime|null $discount_schedule_to
 * @property-read bool $discount_default
 * @property-read DiscountTranslation[] $translations
 */
class Discount extends AbstractClass {
    /**
     * @param string|null $val
     * @return \DateTime|null
     */
    protected function format_discount_schedule_from_attribute($val) {
        if ($val) {
            return \DateTime::createFromFormat(\DateTime::W3C, $val);
        }
        return null;
    }

    /**
     * @param string|null $val
     * @return \DateTime|null
     */
    protected function format_discount_schedule_to_attribute($val) {
        if ($val) {
            return \DateTime::createFromFormat(\DateTime::W3C, $val);
        }
        return null;
    }


    /**
     * @param \stdClass[] $arr
     * @return DiscountTranslation[]
     */
    protected function format_translations_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new DiscountTranslation($item);
            },
            $arr
        );
    }
}