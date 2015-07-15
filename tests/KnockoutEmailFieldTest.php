<?php
/**
 * KnockoutEmailFieldTest
 *
 * @package Silverstripe Knockout Forms
 * @subpackage tests
 */
class KnockoutEmailFieldTest extends SapphireTest {

	public function testKnockoutEmailfield() {
		$field = new KnockoutEmailfield("MyField", "My Field");
		$field->setObservable('email')->setHasFocus(true);
		$this->assertEquals("email", $field->getObservable(), "observable is set");
		$this->assertTrue($field->getHasFocus(), "Focus is set to True");
	}

	
	
	
	
}
