<?php
/**
 * KnockoutTextFieldTest
 *
 * @package Silverstripe Knockout Forms
 * @subpackage tests
 */
class KnockoutTextFieldTest extends SapphireTest {

	public function testKnockoutTextField() {
		$field = new KnockoutTextField("MyField", "My Field", null, 50);
		$field->setObservable('spaceship')->setBindingType('value')->setOtherBindings("valueUpdate: 'input'")->setHasFocus(true);
		$this->assertEquals("spaceship", $field->getObservable(), "observable is set");
		$this->assertEquals("valueUpdate: 'input'", $field->getOtherBindings(), "other bindings are set");
		$this->assertEquals("value", $field->getBindingType(), "Binding Type is set");

		$field->setBindingType('textInput');
		$this->assertEquals("textInput", $field->getBindingType(), "Binding Type is reset");

		$this->assertTrue($field->getHasFocus(), "Focus is set to True");
	}

	
	
	
	
}
