<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutCheckboxField;

/**
 * KnockoutCheckboxFieldTest
 */
final class KnockoutCheckboxFieldTest extends SapphireTest
{
    public function testKnockoutCheckboxField(): void
    {
        $knockoutCheckboxField = KnockoutCheckboxField::create("MyField", "This is a checkbox")
            ->setObservable('checkboxField')
            ->setOtherBindings("blah: anotherFunction")
            ->setHasFocus(true);

        $this->assertEquals(
            "checkboxField",
            $knockoutCheckboxField->getObservable(),
            "observable is set"
        );
        $this->assertEquals(
            "blah: anotherFunction",
            $knockoutCheckboxField->getOtherBindings(),
            "other bindings are set"
        );
        $this->assertEquals(
            "checked",
            $knockoutCheckboxField->getBindingType(),
            "Default Binding Type is set"
        );
        $this->assertTrue(
            $knockoutCheckboxField->getHasFocus(),
            "Focus is set to True"
        );
        $this->assertStringContainsString(
            '<input data-bind="checked: checkboxField, blah: anotherFunction',
            (string) $knockoutCheckboxField->Field()->getValue()
        );
    }
}
