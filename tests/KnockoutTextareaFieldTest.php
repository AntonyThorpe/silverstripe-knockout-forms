<?php
/**
 * KnockoutTextareaFieldTest
 *
 * @package Silverstripe Knockout Forms
 * @subpackage tests
 */
class KnockoutTextareaFieldTest extends SapphireTest {

	public function testKnockoutTextareafield() {
		$field = new KnockoutTextareafield("MyField", "My Field");
		$field->setObservable('comments')->setHasFocus(true);
		$this->assertEquals("comments", $field->getObservable(), "observable is set");
		$this->assertTrue($field->getHasFocus(), "Focus is set to True");
	}

	
	
	
	
}
