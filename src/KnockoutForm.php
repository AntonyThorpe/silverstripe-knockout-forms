<?php

namespace AntonyThorpe\Knockout;

/**
 * Adds a submit binding handlier to the form element to capture click/enter events
 * Delivers the form element to the javascript function
 */
class KnockoutForm extends \SilverStripe\Forms\Form
{

    /**
     * $submit
     *
     * @var string the javascript function to run upon a click/enter event
     */
    protected $submit;

    /**
     * casting of variables for security purposes
     *
     * @see http://docs.silverstripe.org/en/3.1/developer_guides/security/secure_coding/
     */
    protected $casting = array(
        "Submit" => "Varchar"
    );

    /**
     * setSubmit
     *
     * @param string $input The javascript function called upon form submit
     * @return $this
     */
    public function setSubmit($input)
    {
        $this->submit = (string)$input;
        return $this;
    }

    /**
     * getSubmit
     *
     * @return string
     */
    public function getSubmit()
    {
        return $this->submit;
    }
}
