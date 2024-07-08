<?php

namespace AntonyThorpe\Knockout;

require_once __DIR__ . '/Common.php';
require_once __DIR__ . '/CommonBindingType.php';
use ArrayAccess;
use SilverStripe\Forms\DropdownField;


/**
 * KnockoutDropdownField
 *
 * Creates a dropdown field with an additional data-bind attribute that
 * links to a Knockout observable
 */
class KnockoutDropdownField extends DropdownField
{
    use Common;
    use CommonBindingType;

    /**
     * @example   <select data-bind="value: spaceship, etc. ".  Note: the options elements are supplied by Silverstripe
     */
    public function __construct(string $name, string|null $title = null, array|ArrayAccess $source = [], mixed $value = '')
    {
        parent::__construct($name, $title, $source, $value);
        $this->setAttribute('class', 'form-control');
        $this->setBindingType('value');
    }
}
