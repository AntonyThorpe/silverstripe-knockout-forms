<?php

namespace AntonyThorpe\Knockout;

require_once('Common.php');
use SilverStripe\Forms\OptionsetField;

/**
 * KnockoutOptionsetField
 *
 * Creates a {@link OptionsetField} with an additional data-bind attribute that
 * links to a Knockout obervable
 */
class KnockoutOptionsetField extends OptionsetField
{
    use \AntonyThorpe\Knockout\Common;

    /**
     * bindingType
     *
     * @var string a data-bind attribute key
     * @example   <ul data-bind="checked: accessories, etc. "
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
     * @param array $source An map of the dropdown items
     * @param mixed $value The current value
     */
    public function __construct($name, $title = null, $source = array(), $value = '')
    {
        parent::__construct($name, $title, $source, $value);
        $this->addExtraClass('optionset');
    }
}
