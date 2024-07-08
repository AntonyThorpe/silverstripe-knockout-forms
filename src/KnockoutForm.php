<?php

namespace AntonyThorpe\Knockout;

use SilverStripe\Forms\Form;
/**
 * Adds a submit binding handlier to the form element to capture click/enter events
 * Delivers the form element to the javascript function
 */
class KnockoutForm extends Form
{
    protected string $submit = '';

    /**
     * Set the javascript function called upon to run upon a click/enter event
     */
    public function setSubmit(string $input): static
    {
        $this->submit = $input;
        return $this;
    }

    public function getSubmit(): string
    {
        return $this->submit;
    }
}
