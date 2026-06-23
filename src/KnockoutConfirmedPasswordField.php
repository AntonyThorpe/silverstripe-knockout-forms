<?php

declare(strict_types=1);

namespace AntonyThorpe\Knockout;

require_once __DIR__ . '/Common.php';
require_once __DIR__ . '/CommonLabelClass.php';
require_once __DIR__ . '/CommonBindingType.php';
use SilverStripe\Forms\ConfirmedPasswordField;
use SilverStripe\Forms\Form;

/**
 * Creates ConfirmedPasswordField with an additional data-bind attribute
 * that links to a Knockout observable.
 * Uses 'confirmedPassword' as the default observable on the second field
 */
class KnockoutConfirmedPasswordField extends ConfirmedPasswordField
{
    use Common;
    use CommonLabelClass;
    use CommonBindingType;

    /**
     * KnockoutConfirmedPasswordField needs either 'value' or 'textInput' as a key
     *  for the data-bind HTML attribute
     * @example field data-bind="textInput:confirmedPassword"
     */
    public function __construct(
        string $name,
        ?string $title = null,
        mixed $value = "",
        ?Form $form = null,
        bool $showOnClick = false,
        ?string $titleConfirmField = null
    ) {
        parent::__construct($name, $title, $value, $form, $showOnClick, $titleConfirmField);

        // swap fields for the knockout ones
        foreach ($this->children as $child) {
            if (str_contains($child->getName(), '[_Password]') ||
                str_contains($child->getName(), '[_ConfirmPassword]')
            ) {
                $knockout_field = KnockoutPasswordField::create(
                    $child->getName(),
                    $child->Title(),
                    $child->getValue()
                );
                $this->children->replaceField(
                    $child->getName(),
                    $knockout_field
                );
                if (str_contains($child->getName(), '[_ConfirmPassword]')) {
                    $knockout_field->setObservable('confirmedPassword');
                }
            }
        }

        $this->setFieldHolderTemplate('AntonyThorpe/Knockout/KnockoutFormField_holder');
    }

    /**
     * Set the observables of the child fields
     */
    public function setObservables(array $names): static
    {
        foreach ($this->children as $child) {
            if (str_contains($child->getName(), '[_Password]')) {
                $child->setObservable($names[0]);
            }

            if (str_contains($child->getName(), '[_ConfirmPassword]')) {
                $child->setObservable($names[1]);
            }
        }

        return $this;
    }

    /**
     * Return the observables used by the children
     */
    public function getObservables(): array
    {
        $toReturn = [];
        foreach ($this->children as $child) {
            if (str_contains($child->getName(), '[_Password]') ||
                str_contains($child->getName(), '[_ConfirmPassword]')
            ) {
                $toReturn[] = $child->getObservable();
            }
        }

        return $toReturn;
    }
}
