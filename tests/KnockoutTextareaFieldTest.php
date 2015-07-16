<?php
/**
 * KnockoutTextareaFieldTest
 *
 * @package Silverstripe Knockout Forms
 * @subpackage tests
 */
class KnockoutTextareaFieldTest extends SapphireTest {

	public function testKnockoutTextareaField() {
		$field = new KnockoutTextareaField("MyField", "My Field");
		$field->setObservable('comments')->setHasFocus(true);
		$this->assertEquals("comments", $field->getObservable(), "observable is set");
		$this->assertTrue($field->getHasFocus(), "Focus is set to True");
	}

	
	
	
	
}
