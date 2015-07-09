<?php
/**
 * KnockoutFormTest
 *
 * Controller tests
 * 
 * @package framework
 * @subpackage tests
 */
class KnockoutFormTest extends FunctionalTest {
	
	public function testKnockoutForm() {
		$page = $this->get('KnockoutFormTest_Controller');
		$this->assertEquals(200, $page->getStatusCode(), "a page should load");
		
		$this->assertContains('<input data-bind="textInput: spaceship, hasFocus: true"', $page->getBody(), 'Databind attribute in input element');
		$this->assertContains('<select data-bind="value: menu"', $page->getBody(), 'Databind attribute applied to select element');
		
		$this->assertContains('<input data-bind="enable: canSaveInterGalacticAction, css:{ \'FormAction_Disabled\': !canSaveInterGalacticAction() }" type="submit"', $page->getBody(), 'Databind attribute in submit button');

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
		$form = Form::create(
			$this,
			'Form',
			FieldList::create(
				KnockoutTextField::create('Spaceship', 'Spaceship')
					->setObservable('spaceship')
					->setHasFocus(true),
				KnockoutDropdownField::create('Menu', 'Space Menu', array('1'=>'Light Speed Salad','2'=>'Comet Custard'))
					->setObservable('menu'),
				CheckboxSetField::create('Boxes', null, array('1'=>'one','2'=>'two'))
			),
			FieldList::create(
				KnockoutFormAction::create('doSubmit', 'Submit')
					->setObservable('canSaveInterGalacticAction')
			)
		);

		$form->disableSecurityToken(); // Disable CSRF protection for easier form submission handling
		
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



