<?php namespace JoliooAPI\Request\Shop;

use JoliooAPI\JoliooApiAbstract;
use JoliooAPI\RequestAbstract;
use JoliooAPI\Response\Shop\Item\ProductVersion;
use JoliooAPI\ResponseAbstract;

/**
 * Class ProductVersionStockIncrement
 * @package JoliooAPI\Request\Shop
 */
class ProductVersionStockIncrement extends RequestAbstract {
    protected $product_version_id;
    protected $delta;

    /**
     * @param JoliooApiAbstract $api
     * @param ProductVersion|int $productVersion
     * @param float $deltaAbs
     */
    public function __construct(JoliooApiAbstract $api, $productVersion, $deltaAbs) {
        if ($deltaAbs <= 0.00) {
            throw new \Exception('Invalid delta!');
        }

        parent::__construct($api);

        $this->product_version_id = ($productVersion instanceof ProductVersion)? $productVersion->product_version_id : $productVersion;
        $this->delta = $deltaAbs;
    }

    /**
     * @inheritDoc
     */
    protected function getPath() {
        return 'shop/incrementproductversionstock';
    }

    /**
     * @inheritDoc
     */
    protected function getParameters() {
        return array_merge(
            parent::getParameters(),
            [
                'product_version_id' => $this->product_version_id,
                'delta' => $this->delta,
            ]
        );
    }

    /**
     * @return \JoliooAPI\Response\Shop\ProductVersionStockChange|ResponseAbstract|null
     */
    public function execute() {
        if ($responseData = $this->executeIt($valid)) {
            if ($valid) {
                return new \JoliooAPI\Response\Shop\ProductVersionStockChange($responseData);
            }
            $this->api->log(static::class.' - Invalid response data!');
        }
        return null;
    }
}