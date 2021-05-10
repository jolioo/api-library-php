<?php namespace JoliooAPI\Request\Shop\Item;

/**
 * Class CustomerProductBag
 * @package JoliooAPI\Request\Shop\Item
 * @property-read CustomerProductBagItemAbstract[] $items
 */
class CustomerProductBag extends RequestItemAbstract {
    /**
     * @param CustomerProductBagItemAbstract[]|null $items
     */
    public function __construct(array $items = null) {
        parent::__construct([
            'items' => empty($items)? [] : $items,
        ]);
    }

    /**
     * @param CustomerProductBagItemAbstract $item
     * @return $this
     */
    public function addItem(CustomerProductBagItemAbstract $item) {
        $this->_data['items'][] = $item;
        return $this;
    }
}