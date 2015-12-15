<?php

/**
 * KnockoutForm
 * 
 * Adds a submit binding handlier to the form element to capture click/enter events
 * Delivers the form element to the javascript function
 * @package Silverstripe Knockout Forms
 */
class KnockoutForm extends Form {

	/**
	 * $submit
	 *
	 * @var string the javascript function to run upon a click/enter event
	 */
	protected $submit;

	/**
	 * casting of variables for security purposes
	 *
	 * Reference: http://docs.silverstripe.org/en/3.1/developer_guides/security/secure_coding/
	 */
	protected $casting = array(
        "Submit" => "Varchar"
    );

	/**
	 * setSubmit
	 *
	 * @return $this
	 */
	public function setSubmit($input) {
		$this->submit = (string)$input;
		return $this;
	}

	/**
	 * getSubmit
	 *
	 * @return boolean
	 */
	public function getSubmit() {
		return $this->submit;
	}
	

}
