<?php

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutSwitchField;

/**
 * KnockoutCheckboxFieldTest
 */
class KnockoutSwitchFieldTest extends SapphireTest
{
    public function testKnockoutCheckboxField()
    {
        $field = KnockoutSwitchField::create("MyField", "This is a switchField")
            ->setObservable('switchField');

        $this->assertContains(
            '<input data-bind="checked: switchField',
            $field->Field()->getValue()
        );
    }
}
