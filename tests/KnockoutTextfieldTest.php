<?php

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutTextField;

/**
 * KnockoutTextFieldTest
 */
class KnockoutTextFieldTest extends SapphireTest
{
    public function testKnockoutTextField()
    {
        $field = KnockoutTextField::create("MyField", "My Field", null, 50)
            ->setObservable('spaceship')
            ->setHasFocus(true);

        $this->assertEquals(
            "spaceship",
            $field->getObservable(),
            "observable is set"
        );
        $this->assertEquals(
            "textInput",
            $field->getBindingType(),
            "Binding Type is set"
        );
        $this->assertTrue(
            $field->getHasFocus(),
            "Focus is set to True"
        );
        $this->assertContains(
            '<input data-bind="textInput: spaceship, hasFocus: true"',
            $field->Field()->getValue()
        );
    }
}
