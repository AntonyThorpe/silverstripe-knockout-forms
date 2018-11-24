<?php

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Dev\TestOnly;
use SilverStripe\Control\Controller;
use AntonyThorpe\Knockout\KnockoutForm;
use SilverStripe\View\SSViewer;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use AntonyThorpe\Knockout\KnockoutTextField;
use AntonyThorpe\Knockout\KnockoutDropdownField;
use AntonyThorpe\Knockout\KnockoutNumericField;
use AntonyThorpe\Knockout\KnockoutEmailField;
use AntonyThorpe\Knockout\KnockoutTextareaField;
use AntonyThorpe\Knockout\KnockoutOptionsetField;
use AntonyThorpe\Knockout\KnockoutConfirmedPasswordField;
use AntonyThorpe\Knockout\KnockoutFormAction;

class KnockoutFormTest_Controller extends Controller implements TestOnly
{
    public function __construct()
    {
        parent::__construct();
        if (Controller::has_curr()) {
            $this->setRequest(Controller::curr()->getRequest());
        }
    }

    private static $allowed_actions = array('Form');

    private static $url_handlers = array(
        '$Action//$ID/$OtherID' => "handleAction",
    );

    protected $template = 'BlankPage';

    public function Link($action = null)
    {
        return Controller::join_links(
            'KnockoutFormTest_Controller',
            $this->getRequest()->latestParam('Action'),
            $this->getRequest()->latestParam('ID'),
            $action
        );
    }

    public function Form()
    {
        $form = KnockoutForm::create(
            $this,
            'Form',
            FieldList::create(
                KnockoutTextField::create('Spaceship', 'Spaceship')
                    ->setObservable('spaceship2')
                    ->setHasFocus(true),
                KnockoutTextField::create('FieldWithComma', 'FieldWithComma')
                    ->setObservable('fieldwithcomma')
                    ->setValue("Enterprise's Voyage"),
                KnockoutDropdownField::create(
                    'Menu',
                    'Space Menu',
                    array('1'=>'Light Speed Salad','2'=>'Comet Custard')
                )->setObservable('menu'),
                KnockoutNumericField::create('SeatNumber', 'Seat Number', 4)
                    ->setObservable('seatNumber'),
                KnockoutEmailField::create('Email', 'Email')
                    ->setObservable('email')
                    ->setValue('steven@sanderson.com'),
                KnockoutTextareaField::create('Comments', 'Comments')
                    ->setObservable('comments'),
                KnockoutOptionsetField::create(
                    'Accessories',
                    'Accessories',
                    array(
                        'Flying High DVD' => 'Flying High DVD',
                        'Zero Gravity Pillow' => 'Zero Gravity Pillow',
                        'Rocket Replica' => 'Rocket Replica'
                    ),
                    'Zero Gravity Pillow'
                )->setObservable('accessories')
                    ->setOtherBindings("blah: someOtherFunction"),
                KnockoutConfirmedPasswordField::create('Password', 'Password')
                // add any new knockout fields here and assert above
            ),
            FieldList::create(
                KnockoutFormAction::create('doSubmit', 'Submit')
                    ->setObservable('canSaveInterGalacticAction')
            )
        );
        $form->setSubmit('addToCart2');

        return $form;
    }

    public function doSubmit($data, Form $form, HTTPRequest $request)
    {
        $form->sessionMessage('Test save was successful', 'good');
        return $this->redirectBack();
    }

    public function getViewer($action = null)
    {
        return new SSViewer('BlankPage');
    }
}
