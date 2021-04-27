<?php
namespace AntonyThorpe\Knockout;

require_once('Common.php');
require_once('CommonComposite.php');
use SilverStripe\Forms\ToggleCompositeField;

/**
 * Creates a switch field with a visible data-bind on its children
 * @uses 'confirmedPassword' as the default observable
 */
class KnockoutToggleCompositeButtonField extends ToggleCompositeField
{
    use \AntonyThorpe\Knockout\Common;
    use \AntonyThorpe\Knockout\CommonComposite;

    /**
     * bindingType
     *
     * KnockoutConfirmedPasswordField needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute
     *
     * @var string data-bind attribute key
     * @example  data-bind="input: name, valueUpdate: 'input'" - the binding type is: input.
     */
    protected $bindingType = "visible";

    /**
     * casting of variables for security purposes
     */
    protected $casting = array(
        "Observable" => "Varchar",
        "BindingType" => "Varchar",
        "OtherBindings" => "Varchar",
        "HasFocus" => "Boolean",
        "labelAlignment" => "Varchar"
    );
}
