<?php

namespace AntonyThorpe\Knockout;

use SilverStripe\Forms\FormAction;
require_once __DIR__ . '/Common.php';

/**
 * KnockoutFormAction
 *
 * Wrap HTML in an Knockout if statement to disable the submit key when invalid (as per Knockout Validation)
 */
class KnockoutFormAction extends FormAction
{
    use Common;

    protected string $disabledClass = "FormAction_Disabled";

    /**
     * The CSS class appied to the element upon a falsy observable result
     */
    public function setDisabledClass(string $input): static
    {
        $this->disabledClass = $input;
        return $this;
    }

    public function getDisabledClass(): string
    {
        return $this->disabledClass;
    }
}
