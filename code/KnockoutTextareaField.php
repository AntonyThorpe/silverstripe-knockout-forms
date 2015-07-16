<?php

require_once('Common.php');
	
/**
 * KnockoutTextareaField
 * 
 * Creates a {@link TextareaField} with an additional data-bind attribute that links to a Knockout obervable
 *
 * @package Silverstripe Knockout Forms
 */
class KnockoutTextareaField extends TextareaField {

	use \Knockout\Common;

	/**
	 * bindingType
	 *
	 * KnockoutTextareaField needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute
	 * Default set to textInput for live updates
	 * 
	 * @var string data-bind attribute key
	 * @example  data-bind="textInput: name" - the binding type is: textInput
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
	 * Creates a new field
	 *
	 * @param string $name The internal field name, passed to forms.
	 * @param string $title The human-readable field label.
	 * @param mixed $value The value of the field.
	 */
	public function __construct($name, $title = null, $value = null) {
		parent::__construct($name, $title, $value);
		$this->addExtraClass('textarea');
	}


}