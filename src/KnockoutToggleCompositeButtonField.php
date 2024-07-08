<?php
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

    /**
     * Set the observables of the child fields
     */
    public function setObservables(array $names): static
    {
        foreach ($this->children as $key => $field) {
            $field->setObservable($names[$key]);
        }
        return $this;
    }

    /**
     * Return the observables used by the children
     */
    public function getObservables(): array
    {
        return $this->children->column('observable');
    }
}
