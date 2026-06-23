<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutTextField;
use AntonyThorpe\Knockout\KnockoutToggleCompositeButtonField;

/**
 * KnockoutCheckboxFieldTest
 */
final class KnockoutToggleCompositeButtonFieldTest extends SapphireTest
{
    public function testKnockoutCompositeButtonField(): void
    {
        $knockoutToggleCompositeButtonField = KnockoutToggleCompositeButtonField::create(
            "MyField",
            "This is a knockout composite button field",
            [
                KnockoutTextField::create('Test1', 'Test1')->setObservable('test1'),
                KnockoutTextField::create('Test2', 'Test2')->setObservable('test2')
            ]
        )->setObservable('compositeButtonField');

        $this->assertStringContainsString(
            '<button data-bind="click: function(){ compositeButtonField(!compositeButtonField());
  }" class="btn btn-primary btn-sm mb-2 ml-2 mr-2" type="button" aria-expanded="false" aria-controls="toggle">
            Yes/No
        </button>',
            (string) $knockoutToggleCompositeButtonField->Field()->getValue(),
            'Contains a button to show/hide based upon the observable'
        );

        $this->assertStringContainsString(
            '<div data-bind="visible: compositeButtonField"',
            (string) $knockoutToggleCompositeButtonField->Field()->getValue(),
            'Contains the visible data-bind'
        );
    }
}
