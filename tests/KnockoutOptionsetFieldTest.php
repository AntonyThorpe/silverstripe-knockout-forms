<?php

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutOptionsetField;

/**
 * KnockoutOptionsetFieldTest
 */
class KnockoutOptionsetFieldTest extends SapphireTest
{
    public function testKnockoutOptionsetField(): void
    {
        $field = KnockoutOptionsetField::create(
            "MyField",
            "My Field",
            ['Flying High DVD' => 'Flying High DVD', 'Zero Gravity Pillow' => 'Zero Gravity Pillow', 'Rocket Replica' => 'Rocket Replica'],
            'Zero Gravity Pillow'
        )->setObservable('accessories')
            ->setOtherBindings("blah: someFunction")
            ->setHasFocus(true);

        $this->assertEquals(
            "accessories",
            $field->getObservable(),
            "observable is set"
        );
        $this->assertEquals(
            "blah: someFunction",
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
        $this->assertStringContainsString(
            '<input data-bind="checked: accessories, blah: someFunction"',
            $field->Field()->getValue()
        );
    }
}
