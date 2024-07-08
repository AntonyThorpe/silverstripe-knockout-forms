<?php

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutEmailField;

/**
 * KnockoutEmailFieldTest
 */
class KnockoutEmailFieldTest extends SapphireTest
{

    public function testKnockoutEmailField(): void
    {
        $field = KnockoutEmailField::create("MyField", "My Field")
            ->setObservable('email')
            ->setHasFocus(true);
        $this->assertEquals(
            "email",
            $field->getObservable(),
            "observable is set"
        );
        $this->assertTrue(
            $field->getHasFocus(),
            "Focus is set to True"
        );
        $this->assertStringContainsString(
            '<input data-bind="textInput: email, hasFocus: true"',
            $field->Field()->getValue()
        );
    }
}
