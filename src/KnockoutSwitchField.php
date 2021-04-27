<?php
namespace AntonyThorpe\Knockout;

use SilverStripe\Forms\FieldList;
use AntonyThorpe\Knockout\KnockoutCheckboxField;

/**
 * Creates a {@link ConfirmedPasswordField} with an additional data-bind attribute that links to a Knockout observable
 * @uses 'confirmedPassword' as the default observable
 */
class KnockoutSwitchField extends KnockoutCheckboxField
{
    /**
     * Constructor
     *
     * @param string $name
     * @param string $title
     * @param mixed $value The current value
     */
    public function __construct($name, $title = null, $value = '')
    {
        parent::__construct($name, $title, $value);
        $this->removeExtraClass('form-check-input'); // remove css from holder template
        $this->setTemplate('AntonyThorpe/Knockout/CheckboxField');
    }
}
