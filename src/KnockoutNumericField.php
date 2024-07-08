<?php

namespace AntonyThorpe\Knockout;

require_once __DIR__ . '/Common.php';
require_once __DIR__ . '/CommonBindingType.php';
use SilverStripe\Forms\Form;
use SilverStripe\Forms\NumericField;


/**
 * KnockoutNumericField
 *
 * Creates a {@link NumericField} with an additional data-bind attribute that links to a Knockout observable
 */
class KnockoutNumericField extends NumericField
{
    use Common;
    use CommonBindingType;

    public function __construct(string $name, string|null $title = null, string $value = '', int|null $maxLength = null, Form|null $form = null)
    {
        parent::__construct($name, $title, $value, $maxLength, $form);
        $this->setBindingType('textInput');
    }
}
