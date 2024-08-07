<?php

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutPasswordField;

/**
 * KnockoutPasswordFieldTest
 */
class KnockoutPasswordFieldTest extends SapphireTest
{
    public function testKnockoutPasswordField(): void
    {
        $field = KnockoutPasswordField::create("MyField", "My Field")
            ->setHasFocus(true);

        $this->assertEquals(
            "password",
            $field->getObservable(),
            "observable is set to password by default"
        );
        $this->assertTrue(
            $field->getHasFocus(),
            "Focus is set to True"
        );
        $this->assertStringContainsString(
            '<input data-bind="textInput: password, hasFocus: true"',
            $field->Field()->getValue()
        );
    }
}
