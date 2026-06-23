<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout;

require_once __DIR__ . '/Common.php';
require_once __DIR__ . '/CommonBindingType.php';
use SilverStripe\Model\ModelData;
use SilverStripe\Forms\CheckboxField;

/**
 * KnockoutCheckboxField
 *
 * Creates a {@link CheckboxField} with an additional data-bind attribute that
 * links to a Knockout observable
 */
class KnockoutCheckboxField extends CheckboxField
{
    use Common;
    use CommonBindingType;

    /**
     * Set the CSS Class and binding type
     * @param string $name The internal field name, passed to forms.
     * @param null|string|ModelData $title The human-readable field label.
     * @param mixed $value The value of the field.
     */
    public function __construct($name, $title = null, $value = null)
    {
        parent::__construct($name, $title, $value);
        $this->addExtraClass('form-check-input');
        $this->setBindingType('checked');
    }
}
