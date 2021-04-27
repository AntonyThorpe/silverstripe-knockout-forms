<?php
namespace AntonyThorpe\Knockout;

require_once('Common.php');
require_once('CommonComposite.php');
use SilverStripe\Forms\ConfirmedPasswordField;

/**
 * Creates a {@link ConfirmedPasswordField} with an additional data-bind attribute that links to a Knockout observable
 * @uses 'confirmedPassword' as the default observable
 */
class KnockoutConfirmedPasswordField extends ConfirmedPasswordField
{
    use \AntonyThorpe\Knockout\Common;
    use \AntonyThorpe\Knockout\CommonComposite;

    /**
     * bindingType
     *
     * KnockoutConfirmedPasswordField needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute
     *
     * @var string data-bind attribute key
     * @example  data-bind="input: name, valueUpdate: 'input'" - the binding type is: input.
     */
    protected $bindingType = "textInput";

    /**
     * casting of variables for security purposes
     *
     * @see http://docs.silverstripe.org/en/3.1/developer_guides/security/secure_coding/
     */
    protected $casting = array(
        "Observable" => "Varchar",
        "Observables" => "Array",
        "BindingType" => "Varchar",
        "OtherBindings" => "Varchar",
        "HasFocus" => "Boolean"
    );

    /**
     * Constructor
     *
     * @param string $name
     * @param null|string $title
     * @param string $value
     */
    public function __construct($name, $title = null, $value = "", $form = null, $showOnClick = false, $titleConfirmField = null)
    {
        parent::__construct($name, $title, $value, $form, $showOnClick, $titleConfirmField);

        // swap fields for the knockout ones
        foreach ($this->children as $key => $field) {
            $knockout_field = KnockoutPasswordField::create(
                $field->getName(),
                $field->Title(),
                $field->Value()
            );
            $this->children->replaceField(
                $field->getName(),
                $knockout_field
            );
            if ($key == 1) {
                $knockout_field->setObservable('confirmedPassword');
            }
        }

        $this->setFieldHolderTemplate('AntonyThorpe/Knockout/KnockoutFormField_holder');
    }
}
