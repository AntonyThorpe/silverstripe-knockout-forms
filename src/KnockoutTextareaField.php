<?php

namespace AntonyThorpe\Knockout;

require_once('Common.php');
use SilverStripe\Forms\TextareaField;

/**
 * KnockoutTextareaField
 *
 * Creates a {@link TextareaField} with an additional data-bind attribute that links to a Knockout observable
 */
class KnockoutTextareaField extends TextareaField
{
    use \AntonyThorpe\Knockout\Common;

    /**
     * bindingType
     *
     * KnockoutTextareaField needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute
     * Default set to textInput for live updates
     * @var string data-bind attribute key
     * @example  data-bind="textInput: name" - the binding type is: textInput
     */
    protected $bindingType = "textInput";

    /**
     * casting of variables for security purposes
     *
     * @see http://docs.silverstripe.org/en/3.1/developer_guides/security/secure_coding/
     */
    protected $casting = array(
        "Observable" => "Varchar",
        "BindingType" => "Varchar",
        "OtherBindings" => "Varchar",
        "HasFocus" => "Boolean"
    );

    /**
     * Constructor
     *
     * @param string $name The internal field name, passed to forms.
     * @param string $title The human-readable field label.
     * @param mixed $value The value of the field.
     */
    public function __construct($name, $title = null, $value = null)
    {
        parent::__construct($name, $title, $value);
        $this->addExtraClass('textarea');
    }
}
