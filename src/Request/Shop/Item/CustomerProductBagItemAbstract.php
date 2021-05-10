<?php namespace JoliooAPI\Request\Shop\Item;

/**
 * Class CustomerProductBagItemAbstract
 * @package JoliooAPI\Request\Shop\Item
 * @property-read float $value
 * @property-read int $amount
 * @property-read string|null $prefix
 * @property-read string|null $suffix
 */
abstract class CustomerProductBagItemAbstract extends RequestItemAbstract {
    /**
     * @param float $val
     * @return $this
     */
    public function setValue($val) {
        $this->_data['value'] = $val;
        return $this;
    }

    /**
     * @param string|null $val
     * @return $this
     */
    public function setPrefix($val) {
        $this->_data['prefix'] = $val;
        return $this;
    }

    /**
     * @param string|null $val
     * @return $this
     */
    public function setSuffix($val) {
        $this->_data['suffix'] = $val;
        return $this;
    }

    /**
     * @param \DateTime|null $val
     * @return $this
     */
    public function setValidUntil(\DateTime $val = null) {
        $this->_data['valid_until'] = $val;
        return $this;
    }


    /**
     * @return array
     */
    public function getRequestParameters() {
        return [
            'value' => $this->value,
            'amount' => $this->amount,
            'prefix' => $this->prefix,
            'suffix' => $this->suffix,
            'valid_until' => $this->valid_until,
        ];
    }
}