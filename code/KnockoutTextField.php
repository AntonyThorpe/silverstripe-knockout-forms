<?php

require_once('Common.php');
	
/**
 * KnockoutTextField
 * 
 * Creates a {@link TextField} and an additional data-bind attribute that links to a Knockout obervable
 *
 * @package Silverstripe Knockout Forms
 */
class KnockoutTextField extends TextField {

	use \Knockout\Common;

	/**
	 * bindingType
	 *
	 * KnockoutTextField needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute
	 *
	 * @var string data-bind attribute key
	 * @example  data-bind="text: name, valueUpdate: 'input'" - the binding type is: text.
	 */
	protected $bindingType = "textInput";

	/**
	 * casting of variables for security purposes
	 *
	 * Reference: http://docs.silverstripe.org/en/3.1/developer_guides/security/secure_coding/
	 */
	protected $casting = array(
        "Observable" => "Varchar",
        "BindingType" => "Varchar",
        "OtherBindings" => "Varchar",
        "HasFocus" => "Varchar"
    );

	/**
	 * Returns an input field.
	 *
	 * Set the class of 'text' to match TextField
	 *
	 * @param string $name
	 * @param null|string $title
	 * @param string $value
	 * @param null|int $maxLength
	 * @param null|Form $form
	 */
	public function __construct($name, $title = null, $value = '', $maxLength = null, $form = null) {
		parent::__construct($name, $title, $value);
		$this->addExtraClass('text');
	}


}