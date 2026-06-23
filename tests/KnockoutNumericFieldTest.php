<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutNumericField;

/**
 * KnockoutNumericFieldTest
 */
final class KnockoutNumericFieldTest extends SapphireTest
{
    public function testKnockoutNumericField(): void
    {
        $knockoutNumericField = KnockoutNumericField::create("MyField", "My Field", 50)
            ->setObservable('seatNumber')
            ->setHasFocus(true);

        $this->assertEquals(
            "seatNumber",
            $knockoutNumericField->getObservable(),
            "observable is set"
        );
        $this->assertTrue(
            $knockoutNumericField->getHasFocus(),
            "Focus is set to True"
        );
        $this->assertStringContainsString(
            '<input data-bind="textInput: seatNumber, setKnockout:{value:50}, hasFocus: true"',
            (string) $knockoutNumericField->Field()->getValue()
        );
    }
}
