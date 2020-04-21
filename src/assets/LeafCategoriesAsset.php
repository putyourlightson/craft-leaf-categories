<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\leafcategories\assets;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class LeafCategoriesAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = '@putyourlightson/leafcategories/resources';

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/LeafCategorySelectInput.js',
        ];

        parent::init();
    }
}
