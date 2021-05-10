<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class CustomerProductHistory
 * @package JoliooAPI\Response\Shop\Item
 * @property-read string $history_type
 * @property-read string|null $history_team
 * @property-read string|null $history_order_nr
 * @property-read string|null $history_customer
 * @property-read \DateTime $history_time
 */
class CustomerProductHistory extends AbstractClass {
    /**
     * @param string $val
     * @return \DateTime
     */
    protected function format_history_time_attribute($val) {
        return \DateTime::createFromFormat(\DateTime::W3C, $val);
    }
}