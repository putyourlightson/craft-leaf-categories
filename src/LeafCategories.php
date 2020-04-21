<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\leafcategories;

use Craft;
use craft\base\Plugin;
use craft\events\RegisterComponentTypesEvent;
use craft\services\Fields;
use putyourlightson\leafcategories\fields\LeafCategoriesField;
use yii\base\Event;

/**
 * LeafCategories plugin
 *
 * @property SettingsModel $settings
 */
class LeafCategories extends Plugin
{
    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();

        // Register custom fieldtype
        Event::on(Fields::class, Fields::EVENT_REGISTER_FIELD_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = LeafCategoriesField::class;
            }
        );
    }
}
