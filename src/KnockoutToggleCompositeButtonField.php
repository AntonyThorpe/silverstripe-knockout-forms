<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout;

require_once __DIR__ . '/Common.php';
require_once __DIR__ . '/CommonLabelClass.php';
require_once __DIR__ . '/CommonBindingType.php';
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\ToggleCompositeField;

/**
 * Creates a switch field with a visible data-bind on its children
 */
class KnockoutToggleCompositeButtonField extends ToggleCompositeField
{
    use Common;
    use CommonLabelClass;
    use CommonBindingType;

    public function __construct(string $name, string $title, array|FieldList $children)
    {
        parent::__construct($name, $title, $children);
        $this->setBindingType('visible');
    }
}
