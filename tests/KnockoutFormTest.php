<?php
/**
 * KnockoutFormTest
 *
 * Controller tests
 */
class KnockoutFormTest extends FunctionalTest {

	public function setUp() {
		parent::setUp();
		Config::inst()->update('SSViewer', 'source_file_comments', true);
	}

	public function testKnockoutForm() {
		$page = $this->get('KnockoutFormTest_Controller');
		$this->assertEquals(200, $page->getStatusCode(), "a page should load");
		$body = $page->getBody();

		$this->assertContains(
			'data-bind="submit: addToCart"',
			$body,
			'form element has submit binding to javascript function'
		);
		$this->assertContains(
			'<input data-bind="textInput: spaceship, hasFocus: true"',
			$body,
			'Databind attribute in input element'
		);
		$this->assertContains(
			"setKnockout:{value:'Enterprise\'s Voyage'}",
			$body,
			'Comma escaped in HTML for javascript'
		);
		$this->assertContains(
			'<select data-bind="value: menu"',
			$body,
			'Databind attribute applied to select element'
		);
		$this->assertContains(
			'<input data-bind="textInput: seatNumber, setKnockout:{value:4}"',
			$body,'KnockoutNumericField works'
		);
		$this->assertContains(
			'<input data-bind="enable: canSaveInterGalacticAction, css:{ \'FormAction_Disabled\': !canSaveInterGalacticAction() }" type="submit"',
			$body, 'Databind attribute in submit button'
		);
		$this->assertContains(
			'<input data-bind="textInput: email, setKnockout:{value:\'steven@sanderson.com\'}"',
			$body,
			'Databind attribute applied to input element for email field'
		);
		$this->assertContains(
			'class="email text"',
			$body,
			'KnockoutEmailField has a class of "email text"'
		);
		$this->assertContains(
			'<textarea data-bind="textInput: comments"',
			$body,
			'Databind attribute applied to the textareafield'
		);
		$this->assertContains(
			'class="knockouttextarea textarea"',
			$body,
			'KnockoutTextareaField has a class of "textarea text"'
		);
		$this->assertContains(
			'data-bind="checked: accessories, setKnockout:{value:\'Zero Gravity Pillow\'}, blah: console.log(\'blast-off\')"',
			$body,
			'Databind attribute applied to the radio buttons'
		);
		$this->assertContains(
			'class="radio"',
			$body,
			'KnockoutOptionsetField has a class of "radio"'
		);
		$this->assertContains(
			'data-bind="enable: canSaveInterGalacticAction',
			$body,
			'KnockoutFormAction has an obserable of "canSaveInterGalacticAction"'
		);
		$this->assertContains(
			'data-bind="textInput: password',
			$body,
			'KnockoutConfirmedPasswordField has a child with an obserable of "password"'
		);
		$this->assertContains(
			'data-bind="textInput: confirmedPassword',
			$body,
			'KnockoutConfirmedPasswordField has a child with an obserable of "confirmedPassword"'
		);

		// add additional tests here after adding to the form below




	}
}


class KnockoutFormTest_Controller extends Controller implements TestOnly {

	private static $allowed_actions = array('Form');

	private static $url_handlers = array(
		'$Action//$ID/$OtherID' => "handleAction",
	);

	protected $template = 'BlankPage';
	
	public function Link($action = null) {
		return Controller::join_links('KnockoutFormTest_Controller', $this->request->latestParam('Action'),
			$this->request->latestParam('ID'), $action);
	}
	
	public function Form() {
		$form = KnockoutForm::create(
			$this,
			'Form',
			FieldList::create(
				KnockoutTextField::create('Spaceship', 'Spaceship')
					->setObservable('spaceship')
					->setHasFocus(true),
				KnockoutTextField::create('FieldWithComma', 'FieldWithComma')
					->setObservable('fieldwithcomma')
					->setValue("Enterprise's Voyage"),
				KnockoutDropdownField::create('Menu', 'Space Menu', array('1'=>'Light Speed Salad','2'=>'Comet Custard'))
					->setObservable('menu'),
				KnockoutNumericField::create('SeatNumber', 'Seat Number', 4)
					->setObservable('seatNumber'),
				KnockoutEmailField::create('Email', 'Email')
					->setObservable('email')
					->setValue('steven@sanderson.com'),
				KnockoutTextareaField::create('Comments', 'Comments')
					->setObservable('comments'),
				KnockoutOptionsetField::create('Accessories', 'Accessories', array(
	            	'Flying High DVD' => 'Flying High DVD',
	            	'Zero Gravity Pillow' => 'Zero Gravity Pillow',
	            	'Rocket Replica' => 'Rocket Replica'
            	), 'Zero Gravity Pillow')
					->setObservable('accessories')
					->setOtherBindings("blah: console.log('blast-off')"),
				KnockoutConfirmedPasswordField::create('Password', 'Password')

				// add new knockout fields here and assert above





			),
			FieldList::create(
				KnockoutFormAction::create('doSubmit', 'Submit')
					->setObservable('canSaveInterGalacticAction')
			)
		);
		$form->setSubmit('addToCart');  // using KnockoutForm

		return $form;
	}
	
	public function doSubmit($data, $form, $request) {
		$form->sessionMessage('Test save was successful', 'good');
		return $this->redirectBack();
	}

	public function getViewer($action = null) {
		return new SSViewer('BlankPage');
	}
}

