<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutPasswordField;

/**
 * KnockoutPasswordFieldTest
 */
final class KnockoutPasswordFieldTest extends SapphireTest
{
    public function testKnockoutPasswordField(): void
    {
        $knockoutPasswordField = KnockoutPasswordField::create("MyField", "My Field")
            ->setHasFocus(true);

        $this->assertEquals(
            "password",
            $knockoutPasswordField->getObservable(),
            "observable is set to password by default"
        );
        $this->assertTrue(
            $knockoutPasswordField->getHasFocus(),
            "Focus is set to True"
        );
        $this->assertStringContainsString(
            '<input data-bind="textInput: password, hasFocus: true"',
            (string) $knockoutPasswordField->Field()->getValue()
        );
    }
}
