<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\Request\Shop\Item\PropertyTranslate;
use JoliooAPI\RequestAbstract;
use JoliooAPI\Response\Shop\Item\Shop;
use JoliooAPI\ResponseAbstract;

/**
 * Class AddProperty
 * @package JoliooAPI\Request\Shop
 */
class AddProperty extends RequestAbstract {
    protected $shop_id;
    protected $translations;
    protected $const;

    /**
     * @param Shop|int $shop_id
     * @param PropertyTranslate[] $translations
     * @param string|null $const
     */
    public function __construct(JoliooApiAbstract $api, $shop_id, array $translations, $const = null) {
        parent::__construct($api);
        $this->shop_id = ($shop_id && $shop_id instanceof Shop)? $shop_id->shop_id : $shop_id;
        $this->translations = $translations;
        $this->const = $const;
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/addproperty';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'shop_id' => $this->shop_id,
                'shop_property_const' => $this->const,
                'translations' => array_map(
                    function(PropertyTranslate $translate) {
                        return $translate->getParameters();
                    },
                    $this->translations
                )
            ]
        );
    }


    /**
     * @return \JoliooAPI\Response\Shop\AddProperty|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\AddProperty($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}