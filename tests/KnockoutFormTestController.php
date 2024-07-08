<?php

namespace AntonyThorpe\Knockout\Tests;

use SilverStripe\Control\HTTPResponse;
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
use AntonyThorpe\Knockout\KnockoutCheckboxField;
use AntonyThorpe\Knockout\KnockoutSwitchField;
use AntonyThorpe\Knockout\KnockoutToggleCompositeButtonField;
use AntonyThorpe\Knockout\KnockoutFormAction;

class KnockoutFormTestController extends Controller implements TestOnly
{
    public function __construct()
    {
        parent::__construct();
        if (Controller::has_curr()) {
            $this->setRequest(Controller::curr()->getRequest());
        }
    }

    /**
     * @config
     */
    private static array $allowed_actions = ['Form'];

    /**
     * @config
     */
    private static array $url_handlers = ['$Action//$ID/$OtherID' => "handleAction"];

    protected string $template = 'BlankPage';

    public function Link($action = null)
    {
        return Controller::join_links(
            'KnockoutFormTestController',
            $this->getRequest()->latestParam('Action'),
            $this->getRequest()->latestParam('ID'),
            $action
        );
    }

    public function Form(): KnockoutForm
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
                    ['1'=>'Light Speed Salad', '2'=>'Comet Custard']
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
                    ['Flying High DVD' => 'Flying High DVD', 'Zero Gravity Pillow' => 'Zero Gravity Pillow', 'Rocket Replica' => 'Rocket Replica'],
                    'Zero Gravity Pillow'
                )->setObservable('accessories')
                    ->setOtherBindings("blah: someOtherFunction"),
                KnockoutConfirmedPasswordField::create('Password', 'Password'),
                KnockoutCheckboxField::create('CheckboxFieldExample', 'Checkbox Field Example')
                    ->setObservable('checkboxField'),
                KnockoutSwitchField::create('SwitchFieldExample', 'Switch Field Example')
                    ->setObservable('switchField'),
                KnockoutToggleCompositeButtonField::create(
                    "MyToggleCompositeButtonField",
                    "This is a knockout composite button field",
                    [
                        KnockoutTextField::create('Test1', 'Test1')->setObservable('test1'),
                        KnockoutTextField::create('Test2', 'Test2')->setObservable('test2')
                    ]
                )->setObservable('compositeButtonField')
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

    public function doSubmit(array $data, KnockoutForm $form, HTTPRequest $request): HTTPResponse
    {
        $form->sessionMessage('Test save was successful', 'good');
        return $this->redirectBack();
    }

    public function getViewer($action = null)
    {
        return SSViewer::create('BlankPage');
    }
}
