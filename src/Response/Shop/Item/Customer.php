<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class Customer
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $customer_id
 * @property-read string|null $persondata_company
 * @property-read string|null $persondata_title_before
 * @property-read string|null $persondata_firstname
 * @property-read string|null $persondata_lastname
 * @property-read string|null $persondata_title_after
 * @property-read string|null $persondata_street
 * @property-read string|null $persondata_postcode
 * @property-read string|null $persondata_postname
 * @property-read int|null $country_id
 * @property-read string|null $persondata_email
 * @property-read string|null $persondata_mobile
 * @property-read string|null $persondata_phone
 * @property-read string|null $persondata_www
 * @property-read string|null $persondata_sex
 * @property-read \DateTime|null $persondata_birthday
 * @property-read string|null $persondata_uid
 */
class Customer extends AbstractClass {
    /**
     * @param string $val
     * @return \DateTime|false|null
     */
    protected function format_persondata_birthday_attribute($val) {
        if ($val) {
            return \DateTime::createFromFormat(\DateTime::W3C, $val);
        }
        return null;
    }
}