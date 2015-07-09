<?php

require_once('Common.php');

/**
 * KnockoutDropdownField
 * 
 * Creates a {@link DropdownField} and an additional data-bind attribute that 
 * links to a Knockout obervable
 *
 * @package Silverstripe Knockout Forms
 */
class KnockoutDropdownField extends DropdownField {

	use \Knockout\Common;

	/**
	 * bindingType
	 *
	 * @var string a data-bind attribute key
	 * @example   <select data-bind="value: spaceship, etc. ".  Note: the options elements are supplied by Silverstripe
	 */
	protected $bindingType = 'value';

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
	 * @param string $name The field name
	 * @param string $title The field title
	 * @param array $source An map of the dropdown items
	 * @param string $value The current value
	 * @param Form $form The parent form
	 */
	public function __construct($name, $title=null, $source=array(), $value='', $form=null) {
		parent::__construct($name, ($title===null) ? $name : $title, $value, $form);
		$this->setAttribute('class','dropdown');
	}
	
	
	/**
	 * getDataBindAttributeValue
	 *
	 * Provides the value part of the data-bind HTML attribute
	 * @return string
	 */
	public function getDataBindAttributeValue() {
		if(!$this->observable){
			user_error("Observable needs to be set on KnockoutDropdownField.  is setObservable('nameofobservable')",E_USER_WARNING);
		}

		$result = "value: " . $this->observable;

		if($this->value){
			$result = $result . ", setKnockout:{value:'" . Convert::raw2att($this->value) . "'}";
		}

		if($this->otherBindings){
			$result  = $result . ", " . $this->otherBindings;
		}

		if($this->getHasFocus()){
			$result = $result . ", hasFocus: true";
		}

		return $result;
	}	


}