<?php

namespace AntonyThorpe\Knockout;

require_once __DIR__ . '/Common.php';
require_once __DIR__ . '/CommonBindingType.php';
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\Form;

/**
 * Creates a {@link EmailField} with an additional data-bind attribute that links to a Knockout observable
 */
class KnockoutEmailField extends EmailField
{
    use Common;
    use CommonBindingType;

    /**
     * KnockoutEmailField needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute.
     * @example data-bind="textInput: email" - the binding type is: textInput.
     */
    public function __construct(string $name, string|null $title = null, string $value = '', int|null $maxLength = null, Form|null $form = null)
    {
        parent::__construct($name, $title, $value, $maxLength, $form);
        $this->setTemplate(KnockoutTextField::class);
        $this->setBindingType('textInput');
    }
}
