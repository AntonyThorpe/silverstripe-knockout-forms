<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout;

use AntonyThorpe\Knockout\KnockoutCheckboxField;
use SilverStripe\Model\ModelData;

class KnockoutSwitchField extends KnockoutCheckboxField
{
    public function __construct(string $name, null|string|ModelData $title = null, mixed $value = '')
    {
        parent::__construct($name, $title, $value);
        $this->removeExtraClass('form-check-input'); // remove css from holder template
        $this->setTemplate('AntonyThorpe/Knockout/CheckboxField');
    }
}
