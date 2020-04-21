<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\leafcategories\fields;

use Craft;
use craft\base\ElementInterface;
use craft\db\Query;
use craft\elements\Category;
use craft\elements\db\ElementQuery;
use craft\elements\db\ElementQueryInterface;
use craft\fields\Categories;
use craft\helpers\ElementHelper;
use putyourlightson\leafcategories\assets\LeafCategoriesAsset;

class LeafCategoriesField extends Categories
{
    /**
     * @inheritdoc
     */
    protected $inputJsClass = 'Craft.LeafCategorySelectInput';

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return 'Leaf Categories';
    }

    /**
     * @inheritdoc
     */
    public function getInputHtml($value, ElementInterface $element = null): string
    {
        Craft::$app->getView()->registerAssetBundle(LeafCategoriesAsset::class);

        // Get IDs of categories with descendants
        $ids = Category::find()
            ->siteId($this->targetSiteId($element))
            ->anyStatus()
            ->hasDescendants()
            ->ids();

        $js = 'leafCategoriesDisabledElementIds = ['.implode(', ', $ids).'];';
        Craft::$app->getView()->registerJs($js);

        return parent::getInputHtml($value, $element);
    }
}
