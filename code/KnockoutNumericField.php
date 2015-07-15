<?php

require_once('Common.php');
	
/**
 * KnockoutNumericField
 * 
 * Creates a {@link NumericField} with an additional data-bind attribute that links to a Knockout obervable
 *
 * @package Silverstripe Knockout Forms
 */
class KnockoutNumericField extends NumericField {

	use \Knockout\Common;

	/**
	 * bindingType
	 *
	 * KnockoutNumericField needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute
	 *
	 * @var string data-bind attribute key
	 * @example  data-bind="input: name, valueUpdate: 'input'" - the binding type is: input.
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


}