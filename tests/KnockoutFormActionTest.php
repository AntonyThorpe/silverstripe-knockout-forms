<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutFormAction;

/**
 * KnockoutFormActionTest
 */
final class KnockoutFormActionTest extends SapphireTest
{
    public function testKnockoutFormAction(): void
    {
        $knockoutFormAction = KnockoutFormAction::create('doSave', 'Save')
            ->setDisabledClass('astroid')
            ->setObservable('canSave');

        $this->assertEquals(
            "astroid",
            $knockoutFormAction->getDisabledClass(),
            "astroid"
        );
        $this->assertEquals(
            "canSave",
            $knockoutFormAction->getObservable(),
            "observable is set"
        );
        $this->assertStringContainsString(
            '<input data-bind="enable: canSave, css:{ \'astroid\': !canSave() }"',
            (string) $knockoutFormAction->Field()->getValue()
        );
    }
}
