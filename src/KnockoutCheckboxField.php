<?php

namespace AntonyThorpe\Knockout;

require_once('Common.php');
use SilverStripe\Forms\CheckboxField;

/**
 * KnockoutCheckboxField
 *
 * Creates a {@link CheckboxField} with an additional data-bind attribute that
 * links to a Knockout obervable
 */
class KnockoutCheckboxField extends CheckboxField
{
    use \AntonyThorpe\Knockout\Common;

    /**
     * bindingType
     *
     * @var string a data-bind attribute key
     * @example   <input data-bind="checked: wantSpam" />
     */
    protected $bindingType = 'checked';

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
     * @param string $name The field name
     * @param string $title The field title
     * @param mixed $value The current value
     */
    public function __construct($name, $title = null, $value = '')
    {
        parent::__construct($name, $title, $value);
        $this->addExtraClass('form-check-input');
    }
}
