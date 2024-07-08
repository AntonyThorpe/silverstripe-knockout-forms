# silverstripe-knockout-forms
Provides an enhanced UX for Silverstripe forms using the Knockout MVVM JavaScript library plus an associated validation plugin

[![CI](https://github.com/AntonyThorpe/silverstripe-knockout-forms/actions/workflows/ci.yml/badge.svg)](https://github.com/AntonyThorpe/silverstripe-knockout-forms/actions/workflows/ci.yml)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/AntonyThorpe/silverstripe-knockout-forms/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/AntonyThorpe/silverstripe-knockout-forms/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/antonythorpe/silverstripe-knockout-forms/v/stable)](https://packagist.org/packages/antonythorpe/silverstripe-knockout-forms)
[![Total Downloads](https://poser.pugx.org/antonythorpe/silverstripe-knockout-forms/downloads)](https://packagist.org/packages/antonythorpe/silverstripe-knockout-forms)
[![Latest Unstable Version](https://poser.pugx.org/antonythorpe/silverstripe-knockout-forms/v/unstable)](https://packagist.org/packages/antonythorpe/silverstripe-knockout-forms)
[![License](https://poser.pugx.org/antonythorpe/silverstripe-knockout-forms/license)](https://packagist.org/packages/antonythorpe/silverstripe-knockout-forms)

## Why use this Silverstripe module?
* Prevent incorrect form submission
* Live validation responses
* Present messages via span element or tooltip
* Browser support back to ie6

## How it works
Add validation needs to the observables in a Knockoutjs viewModel.  Next, utilising the Knockout Form Fields, use Silverstripe to create the form.  Upon bind, the field values are passed into the observables via a custom binding handler.  The rules placed upon the observable will control the field validation.

## The Approach of this Module
- Extend Silverstripe form fields to place a Knockout observable and the value on the element
- Use Knockout-Validation to validate the fields
- Option to disable the submit button until all rules are satisfied

## Requirements
* [Silverstripe](http://www.silverstripe.org)
* [Knockoutjs](http://knockoutjs.com/documentation/introduction.html)
* [Knockout-Validation](https://github.com/Knockout-Contrib/Knockout-Validation)

## Documentation
[Index](/docs/en/index.md)

## Future Development Ideas
- Add additional fields
- Explore the use of [knockout-pre-render](https://github.com/ErikSchierboom/knockout-pre-rendered) for the display of data in a grid (would replace the setKnockout binding handler and restructure the templates/tests).  This library is currently only one dimensional.

## Pull Requests are Welcome
The recommended approach is to extend an existing Silverstripe field.  Ensure that the appropriate Binding Type is specified and cast getters from trait class `Common.php` and add any needed methods.
```php

namespace AntonyThorpe\Knockout;

require_once('Common.php');
use SilverStripe\Forms\????Field;

/**
 * Knockout NameOfNewField
 *
 * Creates a {@link NameOfNewField} with an additional data-bind attribute that links to a Knockout observable
 */
class KnockoutNameOfField extends ????Field
{
    use \Knockout\Common;

    /**
     * bindingType
     */
    protected $bindingType = "theKnockoutBindingHandler";
```
If needed add the `__construct` function to overriding the field's class.

Adapt the Frameworks form templates to incorporate Knockout's binding handlers and save into `templates/AntonyThorpe/Knockout`.

### Tests
* Create a model test for the new form field
* Update `KnockoutFormTest.php` and `KnockoutFormTestController.php` to test the creation of the binding handler in HTML.
 * Add the new Knockout field to the form function within the KnockoutFormTestController class
 * Add a new assertion to the testKnockoutForm function within the KnockoutFormTest class
 * Add to `docs/en/documentation.md`

## Support
None sorry.

## Change Log
[Link](changelog.md)

## Contributions
[Link](contributing.md)

## License
[MIT](LICENSE)
