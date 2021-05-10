<?php namespace JoliooAPI;

/**
 * Class RequestAbstract
 * @package JoliooAPI
 */
abstract class AbstractClass implements \Serializable, \JsonSerializable {
    protected $_data;

    /**
     * @param array|\stdClass|bool|string|int|float $data
     */
    public function __construct($data) {
        $this->_data = $data;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name) {
        return ($this->__get($name) !== null)? true : false;
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function __get($name) {
        if (is_object($this->_data)) {
            if (isset($this->_data->{$name})) {
                $func = 'format_'.$name.'_attribute';
                if (method_exists($this, $func)) {
                    return $this->{$func}($this->_data->{$name});
                }
                return $this->_data->{$name};
            }
        }

        if (is_array($this->_data)) {
            if (array_key_exists($name, $this->_data)) {
                $func = 'format_'.$name.'_attribute';
                if (method_exists($this, $func)) {
                    return $this->{$func}($this->_data[$name]);
                }
                return $this->_data[$name];
            }
        }

        $func = 'get_'.$name.'_attribute';
        if (method_exists($this, $func)) {
            return $this->{$func}();
        }
        return null;
    }

    /**
     * @return string
     */
    public function serialize() {
        return serialize($this->_data);
    }

    /**
     * @param string $serialized
     */
    public function unserialize($serialized) {
        $this->_data = unserialize($serialized);
    }

    /**
     * @return array|bool|float|int|mixed|\stdClass|string
     */
    public function jsonSerialize() {
        return $this->_data;
    }
}
