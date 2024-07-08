<?php

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutDropdownField;

/**
 * KnockoutDropdownFieldTest
 */
class KnockoutDropdownFieldTest extends SapphireTest
{
    public function testKnockoutDropdownField(): void
    {
        $field = KnockoutDropdownField::create(
            "SpaceExploration",
            "Space Exploration",
            ["Rocket" => "Rocket", "Launcher" => "Launcher", "Blast Off" => "Blast Off"],
            "Blast Off"
        )->setObservable('spaceship');

        $this->assertEquals(
            "spaceship",
            $field->getObservable(),
            "observable can be obtained"
        );
        $this->assertStringContainsString(
            '<select data-bind="value: spaceship, setKnockout:{value:\'Blast Off\'}"',
            $field->Field()->getValue()
        );
    }
}
