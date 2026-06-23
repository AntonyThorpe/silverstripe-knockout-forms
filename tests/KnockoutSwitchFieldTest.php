<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutSwitchField;

/**
 * KnockoutCheckboxFieldTest
 */
final class KnockoutSwitchFieldTest extends SapphireTest
{
    public function testKnockoutSwitchField(): void
    {
        $knockoutSwitchField = KnockoutSwitchField::create("MyField", "This is a switchField")
            ->setObservable('switchField');

        $this->assertStringContainsString(
            '<input data-bind="checked: switchField',
            (string) $knockoutSwitchField->Field()->getValue()
        );
    }
}
