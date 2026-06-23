<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Forms\FormField;
use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutConfirmedPasswordField;

/**
 * KnockoutConfirmedPasswordFieldTest
 */
final class KnockoutConfirmedPasswordFieldTest extends SapphireTest
{
    public function testKnockoutConfirmedPasswordField(): void
    {
        $knockoutConfirmedPasswordField = KnockoutConfirmedPasswordField::create('MyField', 'My Field');
        $fields = $knockoutConfirmedPasswordField->children;
        $password_field = $fields->fieldByName('MyField[_Password]');
        $password_confirmed_field = $fields->fieldByName('MyField[_ConfirmPassword]');

        $this->assertInstanceOf(
            FormField::class,
            $password_field,
            "password field is not null"
        );
        $this->assertInstanceOf(
            FormField::class,
            $password_confirmed_field,
            "password confirmed field is not null"
        );
        $this->assertStringContainsString(
            "password",
            $password_field->getObservable(),
            "observable is set to password by default in the Password field"
        );

        $this->assertEquals(
            "confirmedPassword",
            $password_confirmed_field->getObservable(),
            "observable is set to confirmedPassword by default in the Confirmed Password field"
        );
        $this->assertEquals(
            ['password', 'confirmedPassword'],
            $knockoutConfirmedPasswordField->getObservables(),
            "The function getObservables returns an array of the observables set on the child fields"
        );
        $this->assertStringContainsString(
            '<input data-bind="textInput: confirmedPassword" type="password"',
            $knockoutConfirmedPasswordField->Field()
        );


        $field2 = KnockoutConfirmedPasswordField::create('MyField2', 'My Field2')
            ->setObservables(['password2', 'confirmedPassword2']);
        $fields2 = $field2->children;

        $password_field2 = $fields2->fieldByName('MyField2[_Password]');
        $password_confirmed_field2 = $fields2->fieldByName('MyField2[_ConfirmPassword]');
        $this->assertInstanceOf(FormField::class, $password_field2);

        $this->assertEquals(
            "password2",
            $password_field2->getObservable(),
            "observable is set to password2 through the setObservables method"
        );
        $this->assertInstanceOf(FormField::class, $password_confirmed_field2);
        $this->assertEquals(
            "confirmedPassword2",
            $password_confirmed_field2->getObservable(),
            "observable is set to confirmedPassword2 through the setObservables method"
        );
        $this->assertEquals(
            ['password2', 'confirmedPassword2'],
            $field2->getObservables(),
            "The function getObservables returns an array of the observables set on the child fields"
        );
        $this->assertStringContainsString(
            '<input data-bind="textInput: confirmedPassword2"',
            $field2->Field()
        );
    }
}
