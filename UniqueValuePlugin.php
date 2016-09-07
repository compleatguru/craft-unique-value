<?php

namespace Craft;

/**
 * Unique Value by Josh Angell
 *
 * @package   Unique Value
 * @author    Josh Angell
 * @copyright Copyright (c) 2014, Josh Angell
 * @link      http://www.joshangell.co.uk
 */
class UniqueValuePlugin extends BasePlugin
{

    public function getName()
    {
        return Craft::t('Unique Value');
    }

    public function getVersion()
    {
        return '1.2';
    }

    public function getDeveloper()
    {
        return 'Josh Angell';
    }

    public function getDeveloperUrl()
    {
        return 'http://www.joshangell.co.uk';
    }

    /**
     * Additional table columns available to entry indexes
     * 
     * @link https://craftcms.com/docs/plugins/hooks-reference#defineAdditionalEntryTableAttributes Hooks' reference on defineAdditionalEntryTableAttributes
     * 
     * @return array
     */
    public function defineAdditionalEntryTableAttributes()
    {
        $array = [];

        foreach (craft()->fields->getFieldsWithContent() as $field) {
            if ($field->type == $this->getClassHandle()) {
                $array[$field->handle] = $field->name;
            }
        }

        return $array;
    }

}
