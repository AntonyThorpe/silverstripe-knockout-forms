<?php

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\FunctionalTest;
use SilverStripe\Core\Config\Config;
use AntonyThorpe\Knockout\Tests\KnockoutFormTestController;

/**
 * KnockoutFormTest
 *
 * Controller tests
 */
class KnockoutFormTest extends FunctionalTest
{
    protected static $disable_theme = true;

    protected static $extra_controllers = [
        KnockoutFormTestController::class
    ];

    public function setUp(): void
    {
        parent::setUp();
        Config::modify()->set('SSViewer', 'source_file_comments', true);
    }

    public function testKnockoutForm()
    {
        $page = $this->get('KnockoutFormTestController');
        $this->assertEquals(200, $page->getStatusCode(), "a page should load");
        $body = $page->getBody();

        $this->assertStringContainsString(
            'data-bind="submit: addToCart2"',
            $body,
            'form element has submit binding to javascript function'
        );
        $this->assertStringContainsString(
            '<input data-bind="textInput: spaceship2, hasFocus: true"',
            $body,
            'Databind attribute in input element'
        );
        $this->assertStringContainsString(
            "setKnockout:{value:'Enterprise\'s Voyage'}",
            $body,
            'Comma escaped in HTML for javascript'
        );
        $this->assertStringContainsString(
            '<select data-bind="value: menu"',
            $body,
            'Databind attribute applied to select element'
        );
        $this->assertStringContainsString(
            '<input data-bind="textInput: seatNumber, setKnockout:{value:4}"',
            $body,
            'KnockoutNumericField works'
        );
        $this->assertStringContainsString(
            '<input data-bind="enable: canSaveInterGalacticAction, css:{ \'FormAction_Disabled\': !canSaveInterGalacticAction() }" type="submit"',
            $body,
            'Databind attribute in submit button'
        );
        $this->assertStringContainsString(
            '<input data-bind="textInput: email, setKnockout:{value:\'steven@sanderson.com\'}"',
            $body,
            'Databind attribute applied to input element for email field'
        );
        $this->assertStringContainsString(
            'class="email text"',
            $body,
            'KnockoutEmailField has a class of "email text"'
        );
        $this->assertStringContainsString(
            '<textarea data-bind="textInput: comments"',
            $body,
            'Databind attribute applied to the textareafield'
        );
        $this->assertStringContainsString(
            'class="knockouttextarea textarea"',
            $body,
            'KnockoutTextareaField has a class of "textarea text"'
        );
        $this->assertStringContainsString(
            'data-bind="checked: accessories, setKnockout:{value:\'Zero Gravity Pillow\'}, blah: someOtherFunction"',
            $body,
            'Databind attribute applied to the radio buttons'
        );
        $this->assertStringContainsString(
            'class="radio"',
            $body,
            'KnockoutOptionsetField has a class of "radio"'
        );
        $this->assertStringContainsString(
            'data-bind="enable: canSaveInterGalacticAction',
            $body,
            'KnockoutFormAction has an observable of "canSaveInterGalacticAction"'
        );
        $this->assertStringContainsString(
            'data-bind="textInput: password',
            $body,
            'KnockoutConfirmedPasswordField has a child with an observable of "password"'
        );
        $this->assertStringContainsString(
            'data-bind="textInput: confirmedPassword',
            $body,
            'KnockoutConfirmedPasswordField has a child with an observable of "confirmedPassword"'
        );
        $this->assertStringContainsString(
            'data-bind="checked: checkboxField"',
            $body,
            'KnockoutCheckboxField has an observable of "checkboxField"'
        );
        $this->assertStringContainsString(
            'data-bind="checked: switchField"',
            $body,
            'KnockoutSwitchField has an observable of "switchField"'
        );
        $this->assertStringContainsString(
            ' <button data-bind="click: function(){ compositeButtonField(!compositeButtonField());',
            $body,
            'KnockoutToggleCompositeButtonField has a button that shows/hides based upon the observable of "compositeButtonField"'
        );
        $this->assertStringContainsString(
            '<div data-bind="visible: compositeButtonField"',
            $body,
            'KnockoutToggleCompositeButtonField has an observable of "compositeButtonField"'
        );
        $this->assertSame(
            substr_count($body, 'label class="form-check-label left"'),
            1,
            'the label element with class "left" appears once'
        );

        // add additional tests here after adding to the form in KnockoutFormTestController.php
    }
}
