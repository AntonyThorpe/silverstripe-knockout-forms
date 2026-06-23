<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutOptionsetField;

/**
 * KnockoutOptionsetFieldTest
 */
final class KnockoutOptionsetFieldTest extends SapphireTest
{
    public function testKnockoutOptionsetField(): void
    {
        $knockoutOptionsetField = KnockoutOptionsetField::create(
            "MyField",
            "My Field",
            ['Flying High DVD' => 'Flying High DVD', 'Zero Gravity Pillow' => 'Zero Gravity Pillow', 'Rocket Replica' => 'Rocket Replica'],
            'Zero Gravity Pillow'
        )->setObservable('accessories')
            ->setOtherBindings("blah: someFunction")
            ->setHasFocus(true);

        $this->assertEquals(
            "accessories",
            $knockoutOptionsetField->getObservable(),
            "observable is set"
        );
        $this->assertEquals(
            "blah: someFunction",
            $knockoutOptionsetField->getOtherBindings(),
            "other bindings are set"
        );
        $this->assertEquals(
            "checked",
            $knockoutOptionsetField->getBindingType(),
            "Default Binding Type is set"
        );
        $this->assertTrue(
            $knockoutOptionsetField->getHasFocus(),
            "Focus is set to True"
        );
        $this->assertStringContainsString(
            '<input data-bind="checked: accessories, blah: someFunction"',
            (string) $knockoutOptionsetField->Field()->getValue()
        );
    }
}
