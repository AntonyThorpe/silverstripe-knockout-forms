<?php

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutNumericField;

/**
 * KnockoutNumericFieldTest
 */
class KnockoutNumericFieldTest extends SapphireTest
{
    public function testKnockoutNumericField()
    {
        $field = KnockoutNumericField::create("MyField", "My Field", 50)
            ->setObservable('seatNumber')
            ->setHasFocus(true);

        $this->assertEquals(
            "seatNumber",
            $field->getObservable(),
            "observable is set"
        );
        $this->assertTrue(
            $field->getHasFocus(),
            "Focus is set to True"
        );
        $this->assertStringContainsString(
            '<input data-bind="textInput: seatNumber, setKnockout:{value:50}, hasFocus: true"',
            $field->Field()->getValue()
        );
    }
}
