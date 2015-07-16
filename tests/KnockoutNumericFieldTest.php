<?php
/**
 * KnockoutNumericFieldTest
 *
 * @package Silverstripe Knockout Forms
 * @subpackage tests
 */
class KnockoutNumericFieldTest extends SapphireTest {

	public function testKnockoutNumericField() {
		$field = new KnockoutNumericField("MyField", "My Field", 50);
		$field->setObservable('seatNumber')->setHasFocus(true);
		$this->assertEquals("seatNumber", $field->getObservable(), "observable is set");
		$this->assertTrue($field->getHasFocus(), "Focus is set to True");
	}

	
	
	
	
}
