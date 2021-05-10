<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\RequestAbstract;
use JoliooAPI\Response\Shop\Item\CustomerProduct;
use JoliooAPI\ResponseAbstract;

/**
 * Class ReservateCustomerProduct
 * @package JoliooAPI\Request\Shop
 */
class ReservateCustomerProduct extends InvalidateCustomerProduct {
    const STATE_SUBSTRACT = 'substract';
    const STATE_ADDED = 'added';

    protected $timeout_minutes;
    protected $timeout_state;

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/reservatecustomerproduct';
    }

    /**
     * @param int $timeout_minutes
     * @param string $timeout_state
     * @return $this
     */
    public function setTimeout($timeout_minutes = null, $timeout_state = null) {
        if ($timeout_state !== null && !in_array($timeout_state, [static::STATE_ADDED, static::STATE_SUBSTRACT], true)) {
            throw new \Exception('Invalid state!');
        }

        $this->timeout_minutes = $timeout_minutes;
        $this->timeout_state = $timeout_state;
        return $this;
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'timeout_minutes' => $this->timeout_minutes,
                'timeout_state' => $this->timeout_state,
            ]
        );
    }
}