<?php
/**
 * KnockoutEmailFieldTest
 */
class KnockoutEmailFieldTest extends SapphireTest {

	public function testKnockoutEmailField() {
		$field = KnockoutEmailField::create("MyField", "My Field")
            ->setObservable('email')
            ->setHasFocus(true);

		$this->assertEquals(
            "email",
            $field->getObservable(),
            "observable is set"
        );
		$this->assertTrue(
            $field->getHasFocus(),
            "Focus is set to True"
        );
	}	
}

