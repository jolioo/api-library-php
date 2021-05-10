<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\Request\Shop\Item\CategoryTranslate;
use JoliooAPI\RequestAbstract;
use JoliooAPI\Response\Shop\Item\Shop;
use JoliooAPI\ResponseAbstract;

/**
 * Class AddCategory
 * @package JoliooAPI\Request\Shop
 */
class AddCategory extends RequestAbstract {
    protected $shop_id;
    protected $translations;
    protected $external_id;

    /**
     * @param Shop|int $shop_id
     * @param CategoryTranslate[] $translations
     * @param string|null $external_id
     */
    public function __construct(JoliooApiAbstract $api, $shop_id, array $translations, $external_id = null) {
        parent::__construct($api);
        $this->shop_id = ($shop_id && $shop_id instanceof Shop)? $shop_id->shop_id : $shop_id;
        $this->translations = $translations;
        $this->external_id = $external_id;
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/addcategory';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'shop_id' => $this->shop_id,
                'shop_category_external_id' => $this->external_id,
                'translations' => array_map(
                    function(CategoryTranslate $translate) {
                        return $translate->getParameters();
                    },
                    $this->translations
                )
            ]
        );
    }


    /**
     * @return \JoliooAPI\Response\Shop\AddCategory|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\AddCategory($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}