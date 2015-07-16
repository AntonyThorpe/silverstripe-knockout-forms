<?php
/**
 * KnockoutOptionsetFieldTest
 *
 * @package Silverstripe Knockout Forms
 * @subpackage tests
 */
class KnockoutOptionsetFieldTest extends SapphireTest {

	public function testKnockoutOptionsetField() {
		$field = new KnockoutOptionsetField("MyField", "My Field", array(
            	'Flying High DVD' => 'Flying High DVD',
            	'Zero Gravity Pillow' => 'Zero Gravity Pillow',
            	'Rocket Replica' => 'Rocket Replica'
        ), 'Zero Gravity Pillow');
		$field->setObservable('accessories')->setOtherBindings("blah: console.log('blast-off')")->setHasFocus(true);
		$this->assertEquals("accessories", $field->getObservable(), "observable is set");
		$this->assertEquals("blah: console.log('blast-off')", $field->getOtherBindings(), "other bindings are set");
		$this->assertEquals("checked", $field->getBindingType(), "Default Binding Type is set");
		$this->assertTrue($field->getHasFocus(), "Focus is set to True");
	}
}
