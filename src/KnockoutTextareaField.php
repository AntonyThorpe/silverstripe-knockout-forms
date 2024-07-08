<?php

namespace AntonyThorpe\Knockout;

require_once __DIR__ . '/Common.php';
require_once __DIR__ . '/CommonBindingType.php';
use SilverStripe\Forms\TextareaField;
use SilverStripe\View\ViewableData;

/**
 * KnockoutTextareaField
 *
 * Creates a {@link TextareaField} with an additional data-bind attribute that links to a Knockout observable
 */
class KnockoutTextareaField extends TextareaField
{
    use Common;
    use CommonBindingType;

    /**
     * KnockoutTextareaField needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute
     * @example  data-bind="textInput: name" - the binding type is: textInput
     */
    public function __construct(string $name, null|string|ViewableData $title = null, mixed $value = null)
    {
        parent::__construct($name, $title, $value);
        $this->addExtraClass('textarea');
        $this->setBindingType('textInput');
    }
}
