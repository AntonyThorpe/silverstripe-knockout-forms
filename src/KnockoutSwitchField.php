<?php
namespace AntonyThorpe\Knockout;

use AntonyThorpe\Knockout\KnockoutCheckboxField;
use SilverStripe\View\ViewableData;

class KnockoutSwitchField extends KnockoutCheckboxField
{
    public function __construct(string $name, null|string|ViewableData $title = null, mixed $value = '')
    {
        parent::__construct($name, $title, $value);
        $this->removeExtraClass('form-check-input'); // remove css from holder template
        $this->setTemplate('AntonyThorpe/Knockout/CheckboxField');
    }
}
