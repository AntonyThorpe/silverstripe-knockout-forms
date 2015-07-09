<?php
/**
 * KnockoutFormActionTest
 *
 * @package Silverstripe Knockout Forms
 * @subpackage tests
 */
class KnockoutFormActionTest extends SapphireTest {

	public function testKnockoutFormAction() {
		$action = KnockoutFormAction::create('doSave', 'Save');
		$action->setDisabledClass('astroid');
		$this->assertEquals("astroid", $action->getDisabledClass(), "astroid");
	}
	
}
