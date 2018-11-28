<?php

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutFormAction;

/**
 * KnockoutFormActionTest
 */
class KnockoutFormActionTest extends SapphireTest
{
    public function testKnockoutFormAction()
    {
        $action = KnockoutFormAction::create('doSave', 'Save')
            ->setDisabledClass('astroid')
            ->setObservable('canSave');

        $this->assertEquals(
            "astroid",
            $action->getDisabledClass(),
            "astroid"
        );
        $this->assertEquals(
            "canSave",
            $action->getObservable(),
            "observable is set"
        );
        $this->assertContains(
            '<input data-bind="enable: canSave, css:{ \'astroid\': !canSave() }"',
            $action->Field()->getValue()
        );
    }
}
