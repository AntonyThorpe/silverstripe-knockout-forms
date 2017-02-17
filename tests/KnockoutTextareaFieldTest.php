<?php
/**
 * KnockoutTextareaFieldTest
 */
class KnockoutTextareaFieldTest extends SapphireTest {

	public function testKnockoutTextareaField() {
		$field = KnockoutTextareaField::create("MyField", "My Field")
            ->setObservable('comments')
            ->setHasFocus(true);

		$this->assertEquals(
            "comments",
            $field->getObservable(),
            "observable is set"
        );
		$this->assertTrue(
            $field->getHasFocus(),
            "Focus is set to True"
        );
	}
}

