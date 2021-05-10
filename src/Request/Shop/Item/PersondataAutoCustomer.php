<?php namespace JoliooAPI\Request\Shop\Item;

use JoliooAPI\Response\Shop\Item\Team;

/**
 * Class PersondataAutoCustomer
 * @package JoliooAPI\Request\Shop\Item
 * @property-read int $customer_team_id
 */
class PersondataAutoCustomer extends Persondata {
    /**
     * @param Team|int $team_id
     */
    public function __construct($team_id) {
        parent::__construct([
            'customer_team_id' => ($team_id instanceof Team)? $team_id->team_id : $team_id,
        ]);
    }
}