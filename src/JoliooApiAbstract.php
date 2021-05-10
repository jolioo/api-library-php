<?php namespace JoliooAPI;

use JoliooAPI\Request\Shop\AddBill;
use JoliooAPI\Request\Shop\AddCategory;
use JoliooAPI\Request\Shop\GenerateCustomerProduct;
use JoliooAPI\Request\Shop\AddProduct;
use JoliooAPI\Request\Shop\AddProperty;
use JoliooAPI\Request\Shop\CheckCustomerCard;
use JoliooAPI\Request\Shop\GetCountries;
use JoliooAPI\Request\Shop\GetCustomerProductDetails;
use JoliooAPI\Request\Shop\GetCustomerProductDetailsByCode;
use JoliooAPI\Request\Shop\GetCustomerProductHistory;
use JoliooAPI\Request\Shop\GetCustomerProductOpenReservations;
use JoliooAPI\Request\Shop\GetCustomerProductPdf;
use JoliooAPI\Request\Shop\GetProducts;
use JoliooAPI\Request\Shop\GetProductsStatus;
use JoliooAPI\Request\Shop\GetShopDetails;
use JoliooAPI\Request\Shop\GetShops;
use JoliooAPI\Request\Shop\InvalidateCustomerProduct;
use JoliooAPI\Request\Shop\Item\CategoryTranslate;
use JoliooAPI\Request\Shop\Item\CustomerProductBag;
use JoliooAPI\Request\Shop\Item\PersondataAutoCustomer;
use JoliooAPI\Request\Shop\Item\ProductTranslate;
use JoliooAPI\Request\Shop\Item\ProductVersion;
use JoliooAPI\Request\Shop\Item\PropertyTranslate;
use JoliooAPI\Request\Shop\ProductVersionStockDecrement;
use JoliooAPI\Request\Shop\ProductVersionStockIncrement;
use JoliooAPI\Request\Shop\ReservateCustomerProduct;
use JoliooAPI\Request\Shop\ReservationAcceptCustomerProduct;
use JoliooAPI\Request\Shop\ReservationDeclineCustomerProduct;
use JoliooAPI\Request\Shop\RevalidCustomerProduct;
use JoliooAPI\Request\Shop\SearchCustomerProduct;
use JoliooAPI\Request\StaticFile\Upload;
use JoliooAPI\Response\Shop\Item\Category;
use JoliooAPI\Response\Shop\Item\Customer;
use JoliooAPI\Response\Shop\Item\CustomerProduct;
use JoliooAPI\Response\Shop\Item\CustomerProductDelta;
use JoliooAPI\Response\Shop\Item\Product;
use JoliooAPI\Response\Shop\Item\ProductMedia;
use JoliooAPI\Response\Shop\Item\Shop;
use JoliooAPI\Response\Shop\Item\ShopDetails;
use JoliooAPI\Response\Shop\Item\Team;

/**
 * Class JoliooApiAbstract
 * @package JoliooAPI
 */
abstract class JoliooApiAbstract {
    const LANGUAGE_LOCALE_DE = 'de';
    const LANGUAGE_LOCALE_EN = 'en';
    const LANGUAGE_LOCALE_SL = 'sl';

    protected $apiKey;
    protected $apiSecret;
    protected $urlPrefix;
    protected $defaultLanguage;
    protected $sessionToken;

    /**
     * @param \Exception $exception
     * @return bool
     */
    public function logException(\Exception $exception) {
        return $this->log((string)$exception);
    }

    /**
     * @param string $log
     * @return bool
     */
    abstract public function log($log);

    /**
     * @return bool
     */
    public function validateConnection() {
        return true;
    }

    /**
     * @return string[]
     */
    public function getHeaders() {
        return [
            'VERSION' => '1',
        ];
    }

    /**
     * @return string[]
     */
    public function getCookies() {
        return [];
    }

    /**
     * @param string $apiKey
     * @param string $apiSecret
     * @param string $urlPrefix
     * @param string $defaultLanguage
     * @param string|null $sessionToken
     */
    public function __construct($apiKey, $apiSecret, $urlPrefix = 'https://app.jolioo.com/api/', $defaultLanguage = self::LANGUAGE_LOCALE_DE, $sessionToken = null) {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->urlPrefix = $urlPrefix;
        $this->defaultLanguage = $defaultLanguage;
        $this->sessionToken = $sessionToken;
    }

    /**
     * @return GetShops
     */
    public function requestShopGetShops() {
        return new GetShops($this);
    }

    /**
     * @param Shop|int $shop
     * @return GetShopDetails
     */
    public function requestShopGetShopDetails($shop) {
        return new GetShopDetails($this, $shop);
    }

    /**
     * @param int $offset
     * @param int $limit
     * @param Shop|int|null $shop
     * @param Product|int|null $product
     * @return GetProducts
     */
    public function requestShopGetProducts($offset = 0, $limit = 10, $shop = null, $product = null) {
        return new GetProducts($this, $offset, $limit, $shop, $product);
    }

    /**
     * @param int $offset
     * @param int $limit
     * @param Shop|int|null $shop
     * @param \DateTime|null $updateAtFrom
     * @return GetProductsStatus
     */
    public function requestShopGetProductsStatus($offset = 0, $limit = 10, $shop = null, \DateTime $updateAtFrom = null) {
        return new GetProductsStatus($this, $offset, $limit, $shop, $updateAtFrom);
    }

    /**
     * @param \JoliooAPI\Response\Shop\Item\ProductVersion|int $productVersion
     * @param float $deltaAbs
     * @return ProductVersionStockIncrement
     */
    public function requestShopProductVersionIncrementStock($productVersion, $deltaAbs) {
        return new ProductVersionStockIncrement($this, $productVersion, $deltaAbs);
    }

    /**
     * @param \JoliooAPI\Response\Shop\Item\ProductVersion|int $productVersion
     * @param float $deltaAbs
     * @return ProductVersionStockDecrement
     */
    public function requestShopProductVersionDecrementStock($productVersion, $deltaAbs) {
        return new ProductVersionStockDecrement($this, $productVersion, $deltaAbs);
    }

    /**
     * @param Shop|int $shop
     * @param PropertyTranslate[] $translations
     * @param string|null $const
     * @return AddProperty
     */
    public function requestShopAddProperty($shop, array $translations, $const = null) {
        return new AddProperty($this, $shop, $translations, $const);
    }

    /**
     * @param Shop|int $shop
     * @param CategoryTranslate[] $translations
     * @param string|null $external_id
     * @return AddCategory
     */
    public function requestShopAddCategory($shop, array $translations, $external_id = null) {
        return new AddCategory($this, $shop, $translations, $external_id);
    }

    /**
     * @param string $filepath
     * @param string|null $filename
     * @return Upload
     */
    public function requestStaticFileUpload($filepath, $filename = null) {
        return new Upload($this, $filepath, $filename);
    }

    /**
     * @param Team|int $team_id
     * @param ProductTranslate[] $translations
     * @param string|null $external_id
     * @param ProductVersion[] $product_versions
     * @param Category[]|int[] $categories
     * @param Category|int|null $detault_category
     * @param Shop[]|int[] $shops
     * @param ProductMedia[]|int[] $medias
     * @return AddProduct
     */
    public function requestShopAddProduct($team_id, array $translations, $external_id, array $product_versions, $categories, $detault_category, array $shops, array $medias) {
        return new AddProduct($this, $team_id, $translations, $external_id, $product_versions, $categories, $detault_category, $shops, $medias);
    }

    /**
     * @param string $customer_card_nr
     * @return CheckCustomerCard
     */
    public function requestShopCheckCustomerCard($customer_card_nr) {
        return new CheckCustomerCard($this, $customer_card_nr);
    }

    /**
     * @param Shop|int $shop
     * @return AddBill
     */
    public function requestShopAddBill($shop) {
        return new AddBill($this, $shop);
    }

    /**
     * @return GetCountries
     */
    public function requestGetCountries() {
        return new GetCountries($this);
    }

    /**
     * @param CustomerProductBag $customer_product_bag
     * @param Customer|PersondataAutoCustomer $recipient
     * @return GenerateCustomerProduct
     * @throws \Exception
     */
    public function requestShopGnerateCustomerProduct(CustomerProductBag $customer_product_bag, $recipient) {
        return new GenerateCustomerProduct($this, $customer_product_bag, $recipient);
    }

    /**
     * @param int $offset
     * @param int $limit
     * @param string|null $code
     * @param string|null $product_type
     * @param string|null $state
     * @return SearchCustomerProduct
     */
    public function requestShopSearchCustomerProduct($offset = 0, $limit = 10, $code = null, $product_type = null, $state = null) {
        return new SearchCustomerProduct($this, $offset, $limit, $code, $product_type, $state);
    }

    /**
     * @param CustomerProduct|int $customer_product_id
     * @return GetCustomerProductDetails
     */
    public function requestShopGetCustomerProductDetailsById($customer_product_id) {
        return new GetCustomerProductDetails($this, $customer_product_id);
    }

    /**
     * @param string $code
     * @return GetCustomerProductDetailsByCode
     */
    public function requestShopGetCustomerProductDetailsByCode($code) {
        return new GetCustomerProductDetailsByCode($this, $code);
    }

    /**
     * @param CustomerProduct|int $customer_product_id
     * @return GetCustomerProductHistory
     */
    public function requestShopGetCustomerProductHistory($customer_product_id) {
        return new GetCustomerProductHistory($this, $customer_product_id);
    }

    /**
     * @param CustomerProduct|int $customer_product_id
     * @return GetCustomerProductPdf
     */
    public function requestShopGetCustomerProductPdf($customer_product_id) {
        return new GetCustomerProductPdf($this, $customer_product_id);
    }

    /**
     * @param CustomerProduct|int $customer_product_id
     * @param float|null $value
     * @return InvalidateCustomerProduct
     */
    public function requestShopInvalidateCustomerProduct($customer_product_id, $value = null) {
        return new InvalidateCustomerProduct($this, $customer_product_id, $value);
    }

    /**
     * @param CustomerProduct|int $customer_product_id
     * @param float|null $value
     * @return ReservateCustomerProduct
     */
    public function requestShopReservateCustomerProduct($customer_product_id, $value = null) {
        return new ReservateCustomerProduct($this, $customer_product_id, $value);
    }

    /**
     * @param CustomerProduct|int $customer_product_id
     * @return GetCustomerProductOpenReservations
     */
    public function requestShopGetCustomerProductOpenReservations($customer_product_id) {
        return new GetCustomerProductOpenReservations($this, $customer_product_id);
    }

    /**
     * @param CustomerProductDelta|int $customer_product_delta_id
     * @return ReservationAcceptCustomerProduct
     */
    public function requestShopReservationAcceptCustomerProduct($customer_product_delta_id) {
        return new ReservationAcceptCustomerProduct($this, $customer_product_delta_id);
    }

    /**
     * @param CustomerProductDelta|int $customer_product_delta_id
     * @return ReservationDeclineCustomerProduct
     */
    public function requestShopReservationDeclineCustomerProduct($customer_product_delta_id) {
        return new ReservationDeclineCustomerProduct($this, $customer_product_delta_id);
    }

    /**
     * @param CustomerProduct|int $customer_product_id
     * @param float|null $value
     * @return RevalidCustomerProduct
     */
    public function requestShopRevalidCustomerProduct($customer_product_id, $value = null) {
        return new RevalidCustomerProduct($this, $customer_product_id, $value);
    }

    /**
     * @return string
     */
    public function getApiKey() {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getApiSecret() {
        return $this->apiSecret;
    }

    /**
     * @return string
     */
    public function getDefaultLanguage() {
        return $this->defaultLanguage;
    }

    /**
     * @param string|null $token
     * @return $this
     */
    public function setSessionToken($token = null) {
        $this->sessionToken = $token;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSessionToken() {
        return $this->sessionToken;
    }

    /**
     * @param string $path
     * @return string
     */
    public function generateUrl($path) {
        return $this->urlPrefix . $path;
    }
}
