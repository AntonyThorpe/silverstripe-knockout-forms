<?php

namespace AntonyThorpe\Knockout;

require_once __DIR__ . '/Common.php';
require_once __DIR__ . '/CommonBindingType.php';
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\Form;

/**
 * KnockoutTextField
 *
 * Creates a {@link TextField} with an additional data-bind attribute that links to a Knockout observable
 */
class KnockoutTextField extends TextField
{
    use Common;
    use CommonBindingType;

    /**
     * also sets the KnockoutTextField needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute
     * @example  data-bind="input: name, valueUpdate: 'input'" - the binding type is: input.
     */
    public function __construct(string $name, string|null $title = null, string $value = '', int|null $maxLength = null, Form|null $form = null)
    {
        parent::__construct($name, $title, $value, $maxLength, $form);
        $this->addExtraClass('text');
        $this->setBindingType('textInput');
    }
}
