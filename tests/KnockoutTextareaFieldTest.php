<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutTextareaField;

/**
 * KnockoutTextareaFieldTest
 */
final class KnockoutTextareaFieldTest extends SapphireTest
{
    public function testKnockoutTextareaField(): void
    {
        $knockoutTextareaField = KnockoutTextareaField::create("MyField", "My Field")
            ->setObservable('comments')
            ->setHasFocus(true);

        $this->assertEquals(
            "comments",
            $knockoutTextareaField->getObservable(),
            "observable is set"
        );
        $this->assertTrue(
            $knockoutTextareaField->getHasFocus(),
            "Focus is set to True"
        );
        $this->assertStringContainsString(
            '<textarea data-bind="textInput: comments, hasFocus: true"',
            (string) $knockoutTextareaField->Field()->getValue()
        );
    }
}
