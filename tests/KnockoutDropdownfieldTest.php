<?php

/**
 * KnockoutDropdownFieldTest
 *
 * @package Silverstripe Knockout Forms
 * @subpackage tests
 */
class KnockoutDropdownFieldTest extends SapphireTest {

	public function testKnockoutDropdownField() {
		$field = new KnockoutDropdownField("SpaceExploration", "Space Exploration", array(
			"Rocket" => "Rocket",
			"Launcher" => "Launcher",
			"Blast Off" => "Blast Off"
		)
		, "Blast Off");
		$field->setObservable('spaceship');
		$this->assertEquals("spaceship", $field->getObservable(), "observable can be obtained");
	}
	
}
