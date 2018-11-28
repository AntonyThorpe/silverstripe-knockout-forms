<?php

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutCheckboxField;

/**
 * KnockoutCheckboxFieldTest
 */
class KnockoutCheckboxFieldTest extends SapphireTest
{
    public function testKnockoutCheckboxField()
    {
        $field = KnockoutCheckboxField::create("MyField", "This is a checkbox")
            ->setObservable('checkboxField')
            ->setOtherBindings("blah: anotherFunction")
            ->setHasFocus(true);

        $this->assertEquals(
            "checkboxField",
            $field->getObservable(),
            "observable is set"
        );
        $this->assertEquals(
            "blah: anotherFunction",
            $field->getOtherBindings(),
            "other bindings are set"
        );
        $this->assertEquals(
            "checked",
            $field->getBindingType(),
            "Default Binding Type is set"
        );
        $this->assertTrue(
            $field->getHasFocus(),
            "Focus is set to True"
        );
        $this->assertContains(
            '<input data-bind="checked: checkboxField, blah: anotherFunction',
            $field->Field()->getValue()
        );
    }
}
