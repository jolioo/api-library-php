<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\Response\Shop\Item\Category;
use JoliooAPI\ResponseAbstract;

/**
 * Class AddCategory
 * @package JoliooAPI\Response\Shop
 * @property-read bool $success
 * @property-read Category $category
 */
class AddCategory extends ResponseAbstract {
    /**
     * @param \stdClass $obj
     * @return Category
     */
    protected function format_category_attribute($obj) {
        return new Category($obj);
    }
}