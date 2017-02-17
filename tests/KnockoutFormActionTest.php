<?php
/**
 * KnockoutFormActionTest
 */
class KnockoutFormActionTest extends SapphireTest {

	public function testKnockoutFormAction() {
		$action = KnockoutFormAction::create('doSave', 'Save')
            ->setDisabledClass('astroid');

		$this->assertEquals(
            "astroid",
            $action->getDisabledClass(),
            "astroid"
        );
	}	
}

