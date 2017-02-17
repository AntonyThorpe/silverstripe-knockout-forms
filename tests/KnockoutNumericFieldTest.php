<?php
/**
 * KnockoutNumericFieldTest
 */
class KnockoutNumericFieldTest extends SapphireTest {

	public function testKnockoutNumericField() {
		$field = KnockoutNumericField::create("MyField", "My Field", 50)
            ->setObservable('seatNumber')
            ->setHasFocus(true);

		$this->assertEquals(
            "seatNumber",
            $field->getObservable(),
            "observable is set"
            );
		$this->assertTrue(
            $field->getHasFocus(),
            "Focus is set to True"
        );
	}
}

