# silverstripe-knockout-forms
Provides an enhanced UX for Silverstripe forms using Knockout MVVM JavaScript library plus an associated validation plugin

## Why use this Silverstripe module?
* Prevent incorrect form submission
* Live validation responses
* Dynamic if needed
* Present messages via span element or tooltip
* Browser support back to ie6

## How it works 
Add validation needs to the observables in a Knockoutjs viewModel.  Then, utilising the Knockout Form Fields, use Silverstripe to create the form.  Upon bind, the field values are passed into the observables.  The rules you place upon the observables will control the front-end validation of the form.

## The Approach of this module
- Extend Silverstripe form fields just enough to place a Knockout observable and value on the element
- Use Knockout-Validation to validate the fields
- Disable the submit button until all rules are satisfied

## Installation

To install add the below to your `composer.json` file and `composer update`:
```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/antonythorpe/silverstripe-knockout-forms"
    }
  ],
  "require": {
    "antonythorpe/silverstripe-knockout-forms": "1.0.0"
  }
}
```
See reference: https://getcomposer.org/doc/05-repositories.md#using-private-repositories

## Getting Started
### Javascript Files
Load the following javascript libraries in the following order: 
* [`Knockoutjs`](http://knockoutjs.com/downloads/index.html)
* [`Knockout-Validation`](https://github.com/Knockout-Contrib/Knockout-Validation)
* `/javascript/silverstripeknockoutforms.js`
* your file with a Knockout ViewModel (similar to `/javascript/jsexample.js`)

### Configuration
Set the javascript object in `ko.validation.init` as per Knockout-Validation's [instructions](https://github.com/Knockout-Contrib/Knockout-Validation/wiki/Configuration).  See jsexample.js to get started with an inserted span.

### The ViewModel and the Validation Settings
Add an observable for each of the form fields that you wish validate:
```javascript
this.spaceship = ko.observable().extend({
	required: true,
	maxLength: 100
});

this.flightMenu = ko.observable().extend({
	required: true
});

this.seatNumber = ko.observable().extend({
	required: true,
	number: true,
	min: 1,
	max: 20
});
```
Knockout-Validation has a number of built in [rules](https://github.com/Knockout-Contrib/Knockout-Validation/wiki/Native-Rules) or you can add some [custom ones](https://github.com/Knockout-Contrib/Knockout-Validation/wiki/User-Contributed-Rules) (e.g. the `areSame` rule in the `jsexample.js` file).

### Knockout Form Fields
Creating a `KnockoutTextField` is identical to that of `TextField`, and ditto with `KnockoutDropdownField` and `KnockoutNumericField` with the `DropdownField` and `NumericField`, respectively.  
```php
$fields = new FieldList(
  KnockoutTextField::create('Spaceship', 'Spaceship', "The Enterprise")
  	->setObservable('spaceship')
  	->setHasFocus(true),
  KnockoutDropdownField::create('FlightMenu', 'Takeoff Menu', array(
    'Eatable Astroids' => 'Eatable Astroids',
    'Crunchy Comets' => 'Crunchy Comets',
    'Salty Satellites' => 'Salty Satellites'
  ))
  	->setEmptyString('Select...')
  	->setObservable('flightMenu'),
  KnockoutNumericField::create('SeatNumber', 'Seat Number', 4)
  	->setObservable('seatNumber')
);
```
The above fields create the below HTML within the div.middleColumn.  Note the contents of the `data-bind` attribute.
```html
<input data-bind="textInput: spaceship, setKnockout:{value:'The Enterprise'}, hasFocus: true" type="text" name="Spaceship" value="The Enterprise" class="knockouttext text" id="Form_Form_Spaceship" required="required" aria-required="true">
...
<select data-bind="value: flightMenu" name="FlightMenu" class="dropdown" id="Form_Form_FlightMenu" required="required" aria-required="true">
<option value="" selected="selected">Select...</option>
<option value="Eatable Astroids">Eatable Astroids</option>
<option value="Crunchy Comets">Crunchy Comets</option>
<option value="Salty Satellites">Salty Satellites</option>
</select>
...
<input data-bind="textInput: seatNumber, setKnockout:{value:4}" type="text" name="SeatNumber" value="4" class="numeric text" id="Form_Form_SeatNumber" required="required" aria-required="true">
```
From the above examples you will note some additional methods on the form fields.  They help create the `data-bind` attribute value that you see in the HTML.  These additional methods are common to all Knockout Fields with exception of the disabled methods in `KnockoutFormAction`.  All setters return $this so that they can be chained.  All the getters are accessible through the templates.

### Form Action
Create a Knockout computed variable that responses with true when all the fields are valid:
```javascript
this.canSave = ko.pureComputed(function() {
	// returns true if all the below observables are valid
	return this.spaceship.isValid() && this.flightMenu.isValid() && this.seatNumber.isValid();
}, this);
```
Link this to the Submit button via the `KnockoutActionField`:
```php
$actions = new FieldList(
    KnockoutFormAction::create("doForm")
   		->setObservable('canSave')
   		->setDisabledClass('has-warning')
);
```
The submit button has the disabled attribute when its observable returns false.  In addition, this field has the method of `setDisabledClass` to dynamically add a class to the input/select element when invalid.  The default class is `FormAction_Disabled`.  

### Debugging
To see the values of an observable create a subscription:
```javascript
this.flightMenu.subscribe(function(value) {
	console.log(value);
});
```

## Methods
##### Binding Type
* `setBindingType(string)` used to set the binding type as created in [Knockoutjs](http://knockoutjs.com/documentation/introduction.html).
* `getbindingType()` provides the current Binding Type

##### Observable
* `setObservable(string)` required on all Knockout forms that need validation.  Set the observable that is defined within the ViewModel of your javascript file.
* `getObservable()` provides the name of the observable defined on the field.

##### Has Focus
* `setHasFocus(boolean)` set true on a field to provide focus upon page load.  Set one per form.
* `getHasFocus()` returns a boolean.

##### Other Bindings
* `setOtherBindings` provides the ability to add additional bindings to a field, like a tooltip.  e.g. `->setOtherBindings("bsTooltip: {placement: 'right'}")`.  See below for a link to a Bootstrap extension.
* `getOtherBindings()` returns the additional binding handlers added to a field.

##### Disabled Class (`KnockoutFormAction` only)
* `setDisabledClass(string)` set the class for the submit button when validation checks return false.  Defaults to `FormAction_Disabled`.
* `getDisabledClass()` returns the disabled class on the KnockoutFormAction field.

## Extensions
- Add a [Bootstrap Tooltip Binding Handler](https://github.com/AntonyThorpe/knockout-validation-bootstrap-tooltip.git) to present errors via a tooltip.

## ToDo
- Extend beyond text, numeric and dropdowns to checkboxes and radio buttons, etc.

## Pull Requests are Welcome
The recommended approach is to extend an existing field.  Ensure that the appropriate Binding Type is specified (see knockoutjs.com for the binding type needed) and cast getters from Common.php and any new get methods you create.  
```php
require_once('Common.php');
	
/**
 * Knockout NameOfField
 * 
 * Creates a {@link NameOfField} with an additional data-bind attribute that links to a Knockout observable
 *
 * @package Silverstripe Knockout Forms
 */
class KnockoutNameOfField extends NameOfField {

	use \Knockout\Common;

	/**
	 * bindingType
	 *
	 * Knockout needs either 'value' or 'textInput' as a key for the 'data-bind' HTML attribute
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

Create a model test and update `KnockoutFormTest.php` to test the creation of the binding handler in HTML.




