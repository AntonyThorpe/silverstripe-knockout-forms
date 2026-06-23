<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutDropdownField;

/**
 * KnockoutDropdownFieldTest
 */
final class KnockoutDropdownFieldTest extends SapphireTest
{
    public function testKnockoutDropdownField(): void
    {
        $knockoutDropdownField = KnockoutDropdownField::create(
            "SpaceExploration",
            "Space Exploration",
            ["Rocket" => "Rocket", "Launcher" => "Launcher", "Blast Off" => "Blast Off"],
            "Blast Off"
        )->setObservable('spaceship');

        $this->assertEquals(
            "spaceship",
            $knockoutDropdownField->getObservable(),
            "observable can be obtained"
        );
        $this->assertStringContainsString(
            '<select data-bind="value: spaceship, setKnockout:{value:\'Blast Off\'}"',
            (string) $knockoutDropdownField->Field()
        );
    }
}
