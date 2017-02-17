<?php
require_once('Common.php');
require_once('CommonComposite.php');

/**
 * KnockoutConfirmedPasswordField
 *
 * Creates a {@link ConfirmedPasswordField} with an additional data-bind attribute that links to a Knockout obervable
 * @uses 'confirmedPassword' as the default observable
 */
class KnockoutConfirmedPasswordField extends ConfirmedPasswordField
{
    use \Knockout\Common;
    use \Knockout\CommonComposite;
    
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
    public function __construct($name, $title = null, $value = "", $form = null, $showOnClick = false,
            $titleConfirmField = null)
    {
        parent::__construct($name, $title, $value, $form, $showOnClick, $titleConfirmField);
        
        // Variables
        
        $fields = $this->children;
        $password_field = $fields->fieldByName('{$name}[_Password]');
        $confirmed_password_field = $fields->fieldByName('{$name}[_ConfirmPassword]');

        // swap fields for the knockout ones
        foreach($fields as $key=>$field) {
            $name = $field->getName();
            $title = $field->Title();
            $value = $field->Value();
            $knockout_field = KnockoutPasswordField::create(
                $name,
                $title,
                $value
            );

            $fields->replaceField(
                $name,
                $knockout_field
            );
            
            if($key == 1) {
                $knockout_field->setObservable('confirmedPassword');
            }
        }

        Requirements::block(FRAMEWORK_DIR . '/thirdparty/jquery/jquery.js');
        Requirements::block(FRAMEWORK_DIR . '/javascript/ConfirmedPasswordField.js');
        Requirements::block(FRAMEWORK_DIR . '/css/ConfirmedPasswordField.css');
    }
}

