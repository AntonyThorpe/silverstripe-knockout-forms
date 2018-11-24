<?php

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\SapphireTest;
use AntonyThorpe\Knockout\KnockoutConfirmedPasswordField;

/**
 * KnockoutConfirmedPasswordFieldTest
 */
class KnockoutConfirmedPasswordFieldTest extends SapphireTest
{
    public function testKnockoutConfirmedPasswordField()
    {
        $field = KnockoutConfirmedPasswordField::create("MyField", "My Field");
        $fields = $field->children;
        $password_field = $fields->fieldByName('MyField[_Password]');
        $password_confirmed_field = $fields->fieldByName('MyField[_ConfirmPassword]');

        $this->assertNotNull(
            $password_field,
            "password field is not null"
        );
        $this->assertNotNull(
            $password_confirmed_field,
            "password confirmed field is not null"
        );
        $this->assertEquals(
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
            $field->getObservables(),
            "The function getObservables returns an array of the observables set on the child fields"
        );


        $field2 = KnockoutConfirmedPasswordField::create("MyField2", "My Field2")
            ->setObservables(['password2', 'confirmedPassword2']);
        $fields2 = $field2->children;

        $password_field2 = $fields2->fieldByName('MyField2[_Password]');
        $password_confirmed_field2 = $fields2->fieldByName('MyField2[_ConfirmPassword]');

        $this->assertEquals(
            "password2",
            $password_field2->getObservable(),
            "observable is set to password2 through the setObservables method"
        );
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
    }
}
