<?php

require_once('Common.php');
	
/**
 * KnockoutEmailField
 * 
 * Creates a {@link EmailField} with an additional data-bind attribute that links to a Knockout obervable
 *
 * @package Silverstripe Knockout Forms
 */
class KnockoutEmailField extends EmailField {

	use \Knockout\Common;

	/**
	 * bindingType
	 *
	 * KnockoutEmailField needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute.
	 * Default to textInput for live updates
	 *
	 * @var string data-bind attribute key
	 * @example  data-bind="textInput: email" - the binding type is: textInput.
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
        "HasFocus" => "Boolean"
    );

	/**
	 * Returns an input field
	 *
	 * Set the class of 'email text' to match the EmailField
	 *
	 * @param string $name
	 * @param null|string $title
	 * @param string $value
	 * @param null|int $maxLength
	 * @param null|Form $form
	 */
	public function __construct($name, $title = null, $value = '', $maxLength = null, $form = null) {
		parent::__construct($name, $title, $value, $maxLength, $form);
		$this->setTemplate('KnockoutTextField');
	}


}