<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutTextField;

/**
 * KnockoutTextFieldTest
 */
final class KnockoutTextFieldTest extends SapphireTest
{
    public function testKnockoutTextField(): void
    {
        $knockoutTextField = KnockoutTextField::create("MyField", "My Field", '', 50)
            ->setObservable('spaceship')
            ->setHasFocus(true);

        $this->assertEquals(
            "spaceship",
            $knockoutTextField->getObservable(),
            "observable is set"
        );
        $this->assertEquals(
            "textInput",
            $knockoutTextField->getBindingType(),
            "Binding Type is set"
        );
        $this->assertTrue(
            $knockoutTextField->getHasFocus(),
            "Focus is set to True"
        );
        $this->assertStringContainsString(
            '<input data-bind="textInput: spaceship, hasFocus: true"',
            (string) $knockoutTextField->Field()->getValue()
        );
    }
}
