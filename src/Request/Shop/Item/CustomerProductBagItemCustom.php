<?php namespace JoliooAPI\Request\Shop\Item;

use JoliooAPI\Response\Shop\Item\Currency;
use JoliooAPI\Response\Shop\Item\Team;
use JoliooAPI\Response\StaticFile\Item\StaticFile;

/**
 * Class CustomerProductBagItemCustom
 * @package JoliooAPI\Request\Shop\Item
 * @property-read int $team_id
 * @property-read string|null $title
 * @property-read string|null $subtitle
 * @property-read string|null $details
 * @property-read string|null $valid_text
 * @property-read int $currency_id
 * @property-read int|null $preview
 * @property-read \DateTime $valid_until
 */
class CustomerProductBagItemCustom extends CustomerProductBagItemAbstract {
    /**
     * @param Team|int $team_id
     * @param string $title
     * @param float $value
     * @param Currency|int $currency_id
     * @param int $amount
     * @param StaticFile|int|null $preview
     */
    public function __construct($team_id, $title, $value, $currency_id, $amount = 1, $preview = null) {
        parent::__construct([
            'team_id' => ($team_id instanceof Team)? $team_id->team_id : $team_id,
            'title' => trim($title)?: null,
            'value' => $value,
            'currency_id' => ($currency_id instanceof Currency)? $currency_id->currency_id : $currency_id,
            'amount' => $amount,
            'preview' => ($preview instanceof StaticFile)? $preview->static_file_id : $preview,
        ]);
    }

    /**
     * @param string|null $val
     * @return $this
     */
    public function setSubtitle($val = null) {
        $this->_data['subtitle'] = trim($val)?: null;
        return $this;
    }

    /**
     * @param string|null $val
     * @return $this
     */
    public function setDetails($val = null) {
        $this->_data['details'] = trim($val)?: null;
        return $this;
    }

    /**
     * @param string|null $val
     * @return $this
     */
    public function setValidText($val = null) {
        $this->_data['valid_text'] = trim($val)?: null;
        return $this;
    }

    /**
     * @param \DateTime|null $val
     * @return $this
     */
    public function setValidUntil(\DateTime $val = null) {
        $this->_data['valid_until'] = ($val)? $val->format('d.m.Y H:i') : null;
        return $this;
    }


    /**
     * @return array
     */
    public function getRequestParameters() {
        return array_merge(
            parent::getRequestParameters(),
            [
                'product_team_id' => $this->team_id,
                'title' => $this->title,
                'currency_id' => $this->currency_id,
                'subtitle' => $this->subtitle,
                'details' => $this->details,
                'valid_text' => $this->valid_text,
                'preview' => $this->preview,
            ]);
    }
}