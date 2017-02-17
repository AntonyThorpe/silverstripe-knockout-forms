<?php
require_once('Common.php');

/**
 * KnockoutDropdownField
 *
 * Creates a dropdown field with an additional data-bind attribute that
 * links to a Knockout obervable
 */
class KnockoutDropdownField extends DropdownField
{
    use \Knockout\Common;

    /**
     * bindingType
     *
     * @var string a data-bind attribute key
     * @example   <select data-bind="value: spaceship, etc. ".  Note: the options elements are supplied by Silverstripe
     */
    protected $bindingType = 'value';

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
     * @param string $value The current value
     * @param Form $form The parent form
     */
    public function __construct($name, $title = null, $source = array(), $value = '', $form = null)
    {
        parent::__construct($name, $title, $source, $value, $form);
        $this->setAttribute('class', 'dropdown');
    }
}
