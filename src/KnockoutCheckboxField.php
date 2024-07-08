<?php
namespace AntonyThorpe\Knockout;

require_once __DIR__ . '/Common.php';
require_once __DIR__ . '/CommonBindingType.php';
use SilverStripe\Forms\CheckboxField;
use SilverStripe\View\ViewableData;

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
     */
    public function __construct(
        string $name,
        null|string|ViewableData $title = null,
        mixed $value = ''
    ) {
        parent::__construct($name, $title, $value);
        $this->addExtraClass('form-check-input');
        $this->setBindingType('checked');
    }
}
