<?php
/**
 * KnockoutDropdownFieldTest
 */
class KnockoutDropdownFieldTest extends SapphireTest {

	public function testKnockoutDropdownField() {
		$field = KnockoutDropdownField::create("SpaceExploration", "Space Exploration", array(
			"Rocket" => "Rocket",
			"Launcher" => "Launcher",
			"Blast Off" => "Blast Off"
		)
		, "Blast Off")
			->setObservable('spaceship');

		$this->assertEquals(
			"spaceship",
			$field->getObservable(),
			"observable can be obtained"
		);
	}	
}

