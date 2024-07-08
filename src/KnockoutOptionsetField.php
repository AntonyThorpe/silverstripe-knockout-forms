<?php

namespace AntonyThorpe\Knockout;

require_once __DIR__ . '/Common.php';
require_once __DIR__ . '/CommonBindingType.php';
use SilverStripe\Forms\OptionsetField;
use ArrayAccess;

/**
 * KnockoutOptionsetField
 *
 * Creates a {@link OptionsetField} with an additional data-bind attribute that
 * links to a Knockout observable
 */
class KnockoutOptionsetField extends OptionsetField
{
    use Common;
    use CommonBindingType;

    /**
     * @example   <ul data-bind="checked: accessories, etc.
     */
    public function __construct(string $name, string|null $title = null, array|ArrayAccess $source = [], mixed $value = '')
    {
        parent::__construct($name, $title, $source, $value);
        $this->addExtraClass('optionset');
        $this->setBindingType('checked');
    }
}
