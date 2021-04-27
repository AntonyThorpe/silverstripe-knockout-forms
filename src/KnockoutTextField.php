<?php

namespace AntonyThorpe\Knockout;

require_once('Common.php');
use SilverStripe\Forms\TextField;

/**
 * KnockoutTextField
 *
 * Creates a {@link TextField} with an additional data-bind attribute that links to a Knockout observable
 */
class KnockoutTextField extends TextField
{
    use \AntonyThorpe\Knockout\Common;

    /**
     * bindingType
     *
     * KnockoutTextField needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute
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
     * @param null|int $maxLength
     * @param null|object $form
     */
    public function __construct($name, $title = null, $value = '', $maxLength = null, $form = null)
    {
        parent::__construct($name, $title, $value, $maxLength, $form);
        $this->addExtraClass('text');
    }
}
