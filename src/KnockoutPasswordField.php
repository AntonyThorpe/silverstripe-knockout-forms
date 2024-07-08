<?php

namespace AntonyThorpe\Knockout;

require_once __DIR__ . '/Common.php';
require_once __DIR__ . '/CommonBindingType.php';
use SilverStripe\Forms\PasswordField;

/**
 * KnockoutPasswordField
 *
 * Creates a {@link PasswordField} with an additional data-bind attribute that links to a Knockout observable
 * @uses 'password' as the default observable
 */
class KnockoutPasswordField extends PasswordField
{
    use Common;
    use CommonBindingType;

    /**
     * KnockoutPasswordField needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute
     * @example  data-bind="textInput: password" - the binding type is: textInput.
     */
    public function __construct(string $name, string|null $title = null, string $value = '')
    {
        parent::__construct($name, $title, $value);
        $this->addExtraClass('password');
        $this->setTemplate(KnockoutTextField::class);
        $this->observable = 'password';
        $this->setAttribute('spellcheck', 'false');
        $this->setBindingType('textInput');
    }
}
