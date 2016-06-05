<?php
require_once('Common.php');

/**
 * KnockoutFormAction
 *
 * Wrap HTML in an Knockout if statement to disable the submit key when invalid (as per Knockout Validation)
 * @package Silverstripe Knockout Forms
 * @subpackage actions
 */
class KnockoutFormAction extends FormAction
{

    use \Knockout\Common;

    /**
     * $disabledClass
     *
     * @var string a disabledClass
     */
    protected $disabledClass = "FormAction_Disabled";

    /**
     * casting of variables for security purposes
     *
     * @see http://docs.silverstripe.org/en/3.1/developer_guides/security/secure_coding/
     */
    protected $casting = array(
        "DisabledClass" => "Varchar",
        "Observable" => "Varchar",
        "BindingType" => "Varchar",
        "OtherBindings" => "Varchar",
        "HasFocus" => "Boolean"
    );

    /**
     * setDisabledClass
     *
     * @param string $input The CSS class appied to the element upon a falsy observable result
     * @return $this
     */
    public function setDisabledClass($input)
    {
        $this->disabledClass = (string)$input;
        return $this;
    }

    /**
     * getDisabledClass
     *
     * @return boolean
     */
    public function getDisabledClass()
    {
        return $this->disabledClass;
    }
}
