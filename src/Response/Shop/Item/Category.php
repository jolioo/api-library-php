<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class Category
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $shop_category_id
 * @property-read int|null $shop_category_id_parent
 * @property-read int $shop_category_left
 * @property-read int $shop_category_right
 * @property-read int $shop_category_depth
 * @property-read string|null $shop_category_external_id
 * @property-read string $shop_category_title
 * @property-read string|null $shop_category_description
 * @property-read CategoryTranslation[] $translations
 */
class Category extends AbstractClass {}