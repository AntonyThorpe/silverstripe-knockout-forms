<?php

namespace AntonyThorpe\Knockout;

require_once('Common.php');
use SilverStripe\Forms\PasswordField;

/**
 * KnockoutPasswordField
 *
 * Creates a {@link PasswordField} with an additional data-bind attribute that links to a Knockout observable
 * @uses 'password' as the default observable
 */
class KnockoutPasswordField extends PasswordField
{
    use \AntonyThorpe\Knockout\Common;

    /**
     * bindingType
     *
     * KnockoutPasswordField needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute
     *
     * @var string data-bind attribute key
     * @example  data-bind="input: name, valueUpdate: 'input'" - the binding type is: input.
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
     * @param string $name
     * @param null|string $title
     * @param string $value
     */
    public function __construct($name, $title = null, $value = '')
    {
        parent::__construct($name, $title, $value);
        $this->addExtraClass('password');
        $this->setTemplate('AntonyThorpe\Knockout\KnockoutTextField');
        $this->observable = 'password';
        $this->setAttribute('spellcheck', 'false');
    }
}
