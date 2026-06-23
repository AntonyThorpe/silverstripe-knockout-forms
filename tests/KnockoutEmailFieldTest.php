<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutEmailField;

/**
 * KnockoutEmailFieldTest
 */
final class KnockoutEmailFieldTest extends SapphireTest
{

    public function testKnockoutEmailField(): void
    {
        $knockoutEmailField = KnockoutEmailField::create("MyField", "My Field")
            ->setObservable('email')
            ->setHasFocus(true);
        $this->assertEquals(
            "email",
            $knockoutEmailField->getObservable(),
            "observable is set"
        );
        $this->assertTrue(
            $knockoutEmailField->getHasFocus(),
            "Focus is set to True"
        );
        $this->assertStringContainsString(
            '<input data-bind="textInput: email, hasFocus: true"',
            (string) $knockoutEmailField->Field()->getValue()
        );
    }
}
