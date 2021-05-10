<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\RequestAbstract;
use JoliooAPI\ResponseAbstract;

/**
 * Class SearchCustomerProduct
 * @package JoliooAPI\Request\Shop
 */
class SearchCustomerProduct extends RequestAbstract {
    const PRODUCT_TYPE_VOUCHER = 'voucher';
    const PRODUCT_TYPE_COUPON = 'coupon';
    const PRODUCT_TYPE_CUSTOM = 'custom';

    const STATE_VALID = 'valid';
    const STATE_INVALIDATED = 'invalidated';
    const STATE_CANCELED = 'canceled';
    const STATE_EXPIRED = 'expired';
    const STATE_PRINTING = 'printing';
    const STATE_WAITING_TO_SELL = 'waitingtosell';
    const STATE_UNPAID = 'unpaid';

    protected $offset;
    protected $limit;
    protected $code;
    protected $product_type;
    protected $state;

    /**
     * @param int $offset
     * @param int $limit
     * @param string|null $code
     * @param string|null $product_type
     * @param string|null $state
     */
    public function __construct(JoliooApiAbstract $api, $offset = 0, $limit = 10, $code = null, $product_type = null, $state = null) {
        parent::__construct($api);

        $this->offset = $offset;
        $this->limit = $limit;
        $this->setCode($code);
        $this->setProductType($product_type);
        $this->setState($state);
    }

    /**
     * @param string|null $val
     * @return $this
     */
    public function setCode($val) {
        $this->code = empty($val)? null : $val;
        return $this;
    }

    /**
     * @param string|null $val
     * @return $this
     */
    public function setProductType($val) {
        $this->product_type = empty($val)? null : $val;
        return $this;
    }

    /**
     * @param string|null $val
     * @return $this
     */
    public function setState($val) {
        $this->state = empty($val)? null : $val;
        return $this;
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/searchcustomerproduct';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'code' => $this->code,
                'product_type' => $this->product_type,
                'state' => $this->state,
                'offset' => $this->offset,
                'limit' => $this->limit,
            ]
        );
    }


    /**
     * @return \JoliooAPI\Response\Shop\SearchCustomerProducts|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\SearchCustomerProducts($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}