<?php namespace JoliooAPI\Request\Shop\Item;

use JoliooAPI\Response\Shop\Item\Country;

/**
 * Class Persondata
 * @package JoliooAPI\Request\Shop\Item
 * @property-read string|null $persondata_company
 * @property-read string|null $persondata_uid
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
 * @property-read string|null $persondata_birthday
 */
class Persondata extends RequestItemAbstract {
    const SEX_COMPANY = 'COMPANY';
    const SEX_MALE = 'MALE';
    const SEX_FEMALE = 'FEMALE';

    /**
     * @param array $data
     */
    public function __construct($data = []) {
        parent::__construct($data);
    }

    /**
     * @param string $val
     * @return $this
     */
    public function setCompany($val) {
        $this->_data['persondata_company'] = trim($val)?: null;
        return $this;
    }

    /**
     * @param string|null $val
     * @return $this
     */
    public function setUID($val) {
        $this->_data['persondata_uid'] = trim($val)?: null;
        return $this;
    }

    /**
     * @param string|null $firstname
     * @param string|null $lastname
     * @param string|null $title_before
     * @param string|null $title_after
     * @return $this
     */
    public function setPerson($firstname, $lastname, $title_before = null, $title_after = null) {
        $this->_data['persondata_firstname'] = trim($firstname)?: null;
        $this->_data['persondata_lastname'] = trim($lastname)?: null;
        $this->_data['persondata_title_before'] = trim($title_before)?: null;
        $this->_data['persondata_title_after'] = trim($title_after)?: null;
        return $this;
    }

    /**
     * @param string|null $street
     * @param string|null $postcode
     * @param string|null $postname
     * @param Country|int|null $country
     * @return $this
     */
    public function setAddress($street, $postcode, $postname, $country) {
        $this->_data['persondata_street'] = trim($street)?: null;
        $this->_data['persondata_postcode'] = trim($postcode)?: null;
        $this->_data['persondata_postname'] = trim($postname)?: null;
        $this->_data['country_id'] = ($country instanceof Country)? $country->country_id : $country;
        return $this;
    }

    /**
     * @param string|null $val
     * @return $this
     */
    public function setEmail($val) {
        $this->_data['persondata_email'] = trim($val)?: null;
        return $this;
    }

    /**
     * @param string|null $val
     * @return $this
     */
    public function setMobile($val) {
        $this->_data['persondata_mobile'] = trim($val)?: null;
        return $this;
    }

    /**
     * @param string|null $val
     * @return $this
     */
    public function setPhone($val) {
        $this->_data['persondata_phone'] = trim($val)?: null;
        return $this;
    }

    /**
     * @param string|null $val
     * @return $this
     */
    public function setWWW($val) {
        $this->_data['persondata_www'] = trim($val)?: null;
        return $this;
    }

    /**
     * @param string|null $val
     * @return $this
     */
    public function setSex($val) {
        $this->_data['persondata_sex'] = trim($val)?: null;
        return $this;
    }

    /**
     * @param \DateTime|null $val
     * @return $this
     */
    public function setBirthday(\DateTime $val = null) {
        $this->_data['persondata_birthday'] = ($val)? $val->format('d.m.Y'): null;
        return $this;
    }
}