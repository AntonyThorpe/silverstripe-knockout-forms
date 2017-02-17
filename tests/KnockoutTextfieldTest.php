<?php
/**
 * KnockoutTextFieldTest
 */
class KnockoutTextFieldTest extends SapphireTest {

	public function testKnockoutTextField() {
		$field = KnockoutTextField::create("MyField", "My Field", null, 50)
			->setObservable('spaceship')
			->setBindingType('value')
			->setOtherBindings("valueUpdate: 'input'")
			->setHasFocus(true);

		$this->assertEquals(
			"spaceship",
			$field->getObservable(),
			"observable is set"
		);
		$this->assertEquals(
			"valueUpdate: 'input'",
			$field->getOtherBindings(),
			"other bindings are set"
		);
		$this->assertEquals("value",
			$field->getBindingType(),
			"Binding Type is set"
		);

		$field->setBindingType('textInput');
		$this->assertEquals(
			"textInput",
			$field->getBindingType(),
			"Binding Type is reset"
		);
		$this->assertTrue(
			$field->getHasFocus(),
			"Focus is set to True"
		);
	}	
}

