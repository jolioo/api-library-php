<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\Request\Shop\Item\ProductTranslate;
use JoliooAPI\Request\Shop\Item\ProductVersion;
use JoliooAPI\RequestAbstract;
use JoliooAPI\Response\Shop\Item\Category;
use JoliooAPI\Response\Shop\Item\ProductMedia;
use JoliooAPI\Response\Shop\Item\Shop;
use JoliooAPI\Response\Shop\Item\Team;
use JoliooAPI\Response\StaticFile\Item\StaticFile;
use JoliooAPI\ResponseAbstract;

/**
 * Class AddProduct
 * @package JoliooAPI\Request\Shop
 */
class AddProduct extends RequestAbstract {
    protected $team_id;
    protected $translations;
    protected $external_id;
    protected $product_versions;
    protected $categories;
    protected $default_category;
    protected $shops;
    protected $medias;

    /**
     * @param JoliooApiAbstract $api
     * @param Team|int $team_id
     * @param ProductTranslate[] $translations
     * @param string|null $external_id
     * @param ProductVersion[] $product_versions
     * @param Category[]|int[] $categories
     * @param Category|int|null $detault_category
     * @param Shop[]|int[] $shops
     * @param ProductMedia[]|int[] $medias
     */
    public function __construct(JoliooApiAbstract $api, $team_id, array $translations, $external_id, array $product_versions, $categories, $detault_category, array $shops, array $medias) {
        parent::__construct($api);

        $this->team_id = $team_id;
        $this->translations = $translations;
        $this->external_id = $external_id;
        $this->product_versions = $product_versions;
        $this->categories = $categories;
        $this->default_category = $detault_category;
        $this->shops = $shops;
        $this->medias = $medias;
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/addproduct';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'team_id' => ($this->team_id instanceof Team)? $this->team_id->team_id : $this->team_id,
                'translates' => array_map(
                    function(ProductTranslate $translate) {
                        return $translate->getParameters();
                    },
                    $this->translations
                ),
                'product_external_id' => $this->external_id,
                'product_versions' => array_map(
                    function(ProductVersion $productVersion) {
                        return $productVersion->getParameters();
                    },
                    $this->product_versions
                ),
                'categories' => empty($this->categories)? null : array_map(
                    function($c) {
                        if ($c instanceof Category) {
                            return $c->shop_category_id;
                        }
                        return $c;
                    },
                    $this->categories
                ),
                'category_default' => ($this->default_category instanceof Category)? $this->default_category->shop_category_id : $this->default_category,
                'shops' => empty($this->shops)? null : array_map(
                    function($shop) {
                        if ($shop instanceof Shop) {
                            return $shop->shop_id;
                        }
                        return $shop;
                    },
                    $this->shops
                ),
                'medias' => empty($this->medias)? null : array_map(
                    function($media) {
                        if ($media instanceof StaticFile) {
                            return $media->static_file_id;
                        }
                        return $media;
                    },
                    $this->medias
                ),
            ]
        );
    }


    /**
     * @return \JoliooAPI\Response\Shop\AddProduct|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\AddProduct($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}