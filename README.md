# silverstripe-knockout-forms
Provides an enhanced UX for Silverstripe forms using the Knockout MVVM JavaScript library plus an associated validation plugin

[![Build Status](https://travis-ci.org/AntonyThorpe/silverstripe-knockout-forms.svg?branch=master)](https://travis-ci.org/AntonyThorpe/silverstripe-knockout-forms)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/AntonyThorpe/silverstripe-knockout-forms/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/AntonyThorpe/silverstripe-knockout-forms/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/antonythorpe/silverstripe-knockout-forms/v/stable)](https://packagist.org/packages/antonythorpe/silverstripe-knockout-forms)
[![Total Downloads](https://poser.pugx.org/antonythorpe/silverstripe-knockout-forms/downloads)](https://packagist.org/packages/antonythorpe/silverstripe-knockout-forms)
[![Latest Unstable Version](https://poser.pugx.org/antonythorpe/silverstripe-knockout-forms/v/unstable)](https://packagist.org/packages/antonythorpe/silverstripe-knockout-forms)
[![License](https://poser.pugx.org/antonythorpe/silverstripe-knockout-forms/license)](https://packagist.org/packages/antonythorpe/silverstripe-knockout-forms)

## Why use this Silverstripe module?
* Prevent incorrect form submission
* Live validation responses
* Dynamic if needed
* Present messages via span element or tooltip
* Browser support back to ie6

## How it works 
Add validation needs to the observables in a Knockoutjs viewModel.  Next, utilising the Knockout Form Fields, use Silverstripe to create the form.  Upon bind, the field values are passed into the observables via a custom binding handler.  The rules placed upon the observable will control the field validation.

## The Approach of this Module
- Extend Silverstripe form fields just enough to place a Knockout observable and value on the element
- Use Knockout-Validation to validate the fields
- Disable the submit button until all rules are satisfied

## Requirements
* [Silverstripe](http://www.silverstripe.org)
* [Knockoutjs](http://knockoutjs.com/documentation/introduction.html)
* [Knockout-Validation](https://github.com/Knockout-Contrib/Knockout-Validation)

## Documentation
[Index](/docs/en/index.md)

## Future Development Ideas
- Add additional fields e.g. checkbox field, etc.
- Explore the use of [knockout-pre-render](https://github.com/ErikSchierboom/knockout-pre-rendered) for the display of data in a grid (would replace the setKnockout binding handler and restructure the templates/tests).  This library is currently only one dimensional.
- Can Knockout's components be used to validate forms without the need to set observables and maintain a site-wide viewModel?  Maybe KnockoutFormAction (or the Form) could contain the parent componet and supply observables to the form fields.
- Use in the CMS

## Pull Requests are Welcome
The recommended approach is to extend an existing Silverstripe field.  Ensure that the appropriate Binding Type is specified (see knockoutjs.com for the binding type needed) and cast getters from `Common.php` and any new get methods you create.  
```php
require_once('Common.php');
    
/**
 * Knockout NameOfNewField
 * 
 * Creates a {@link NameOfNewField} with an additional data-bind attribute that links to a Knockout observable
 *
 * @package Silverstripe Knockout Forms
 */
class KnockoutNameOfField extends NameOfNewField {

    use \Knockout\Common;

    /**
     * bindingType
     *
     * Knockout needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute
     * Default textInput for live updates
     *
     * @var string data-bind attribute key
     * @example  data-bind="textInput: name, etc.
     */
    protected $bindingType = "textInput";

    /**
     * casting of variables for security purposes
     *
     * Reference: http://docs.silverstripe.org/en/3.1/developer_guides/security/secure_coding/
     */
    protected $casting = array(
        "Observable" => "Varchar",
        "BindingType" => "Varchar",
        "OtherBindings" => "Varchar",
        "HasFocus" => "Varchar"
    );
```
If needed add the `__construct` function to overriding the field's class.

Adapt the Frameworks form templates to incorporate Knockout's binding handlers and save into `templates/forms`.

### Tests
* Create a model test for the new form field
* Update `KnockoutFormTest.php` to test the creation of the binding handler in HTML.
** Add the new Knockout field to the form function within the KnockoutFormTest_Controller class
** Add a new assertion to the testKnockoutForm function within the KnockoutFormTest class

## Support
None sorry.

## Contributions
Pull requests welcome!  PSR-2 plus test updates please.

## License
[MIT](LICENCE)


