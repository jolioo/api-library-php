<?php namespace JoliooAPI\Request\Shop\Item;

/**
 * Class ProductVersion
 * @package JoliooAPI\Request\Shop
 * @property-read array $prices
 * @property-read array $properties
 */
class ProductVersion extends RequestItemAbstract {
    /**
     * @param ProductPrice[] $prices
     * @param PropertyValue[] $properties
     */
    public function __construct(array $prices, array $properties) {
        parent::__construct([
            'prices' => $prices,
            'properties' => $properties,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getParameters() {
        return [
            'prices' => array_map(
                function(ProductPrice $price) {
                    return $price->getParameters();
                },
                $this->prices
            ),
            'properties' => array_map(
                function(PropertyValue $propertyValue) {
                    return $propertyValue->getParameters();
                },
                $this->properties
            )
        ];
    }
}