<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\Request\Shop\Item\BillLine;
use JoliooAPI\Request\Shop\Item\Persondata;
use JoliooAPI\Request\Shop\Item\PropertyTranslate;
use JoliooAPI\RequestAbstract;
use JoliooAPI\Response\Shop\Item\Currency;
use JoliooAPI\Response\Shop\Item\Shop;
use JoliooAPI\ResponseAbstract;

/**
 * Class AddBill
 * @package JoliooAPI\Request\Shop
 */
class AddBill extends RequestAbstract {
    protected $shop_id;
    protected $customer_card;
    protected $add_bonus_points;
    protected $bill_nr;
    protected $bill_date;
    protected $currency_id;
    protected $bill_lines;
    protected $persondata;

    /**
     * @param Shop|int $shop_id
     * @param string|null $customer_card
     */
    public function __construct(JoliooApiAbstract $api, $shop_id) {
        parent::__construct($api);
        $this->shop_id = ($shop_id && $shop_id instanceof Shop)? $shop_id->shop_id : $shop_id;
    }

    /**
     * @param \JoliooAPI\Response\Shop\CheckCustomerCard|string|null $customer_card_nr
     * @return $this
     */
    public function setCustomerCard($customer_card_nr, $add_bonus_points = true) {
        if ($customer_card_nr instanceof \JoliooAPI\Response\Shop\CheckCustomerCard) {
            $this->customer_card = ($customer_card_nr->exist)? $customer_card_nr->customercard_full : null;
        }
        else {
            $this->customer_card = trim($customer_card_nr)?: null;
        }
        $this->add_bonus_points = ($add_bonus_points)? '1' : '0';
        return $this;
    }

    /**
     * @param string $bill_nr
     * @param \DateTime $bill_date
     * @return $this
     */
    public function setBillData($bill_nr, \DateTime $bill_date) {
        $this->bill_nr = trim($bill_nr)?: null;
        $this->bill_date = $bill_date->format('d.m.Y');
        return $this;
    }

    /**
     * @param Currency|int $currency_id
     * @return $this
     */
    public function setCurrency($currency_id) {
        $this->currency_id = ($currency_id instanceof Currency)? $currency_id->currency_id : $currency_id;
        return $this;
    }

    /**
     * @param BillLine[] $bill_lines
     * @return $this
     */
    public function setBillLines(array $bill_lines) {
        $this->bill_lines = $bill_lines;
        return $this;
    }

    /**
     * @param Persondata $persondata
     * @return $this
     */
    public function setPersondata(Persondata $persondata) {
        $this->persondata = $persondata;
        return $this;
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/addbill';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'shop_id' => $this->shop_id,
                'customer_card' => $this->customer_card,
                'bill_nr' => $this->bill_nr,
                'bill_date' => $this->bill_date,
                'currency_id' => $this->currency_id,
                'bill_lines_json' => json_encode($this->bill_lines),
                'persondata_json' => json_encode($this->persondata),
                'add_bonus_points' => $this->add_bonus_points,
            ]
        );
    }


    /**
     * @return \JoliooAPI\Response\Shop\AddBill|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\AddBill($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}