# Documentation of Silverstripe Knockout Forms

## The ViewModel and the Observable Validation Settings
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

this.email = ko.observable().extend({
  email: true
});

this.comments = ko.observable().extend({
  maxLength: 500
});

this.accessories = ko.observable().extend({
  required: true
});
```
Knockout-Validation has a number of built in [rules](https://github.com/Knockout-Contrib/Knockout-Validation/wiki/Native-Rules) or you can add some [custom ones](https://github.com/Knockout-Contrib/Knockout-Validation/wiki/User-Contributed-Rules) (e.g. the `areSame` rule in the `jsexample.js` file).

## Knockout Form Fields
Creating a `KnockoutTextField` is identical to that of `TextField`, and ditto with all the others. 
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
    ->setObservable('seatNumber'),
  KnockoutEmailField::create('Email', 'Email')
    ->setAttribute('placeholder', 'yourname@example.com')
    ->setObservable('email'),
  KnockoutTextareaField::create('Comments', 'Comments')
    ->setObservable('comments'),
  KnockoutOptionsetField::create('Accessories', 'Accessories', array(
    'Flying High DVD' => 'Flying High DVD',
    'Zero Gravity Pillow' => 'Zero Gravity Pillow',
    'Rocket Replica' => 'Rocket Replica'
  ))
    ->setObservable('accessories')
    ->setValue('Zero Gravity Pillow')
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
...
<input data-bind="textInput: email" type="email" name="Email" class="email text" id="Form_Form_Email" placeholder="yourname@example.com">
...
<textarea data-bind="textInput: comments" name="Comments" class="knockouttextarea textarea" id="Form_Form_Comments" rows="5" cols="20"></textarea>
...
<input data-bind="checked: accessories, setKnockout:{value:'Zero Gravity Pillow'}" id="Form_Form_Accessories_ZeroGravityPillow" class="radio" name="Accessories" type="radio" value="Zero Gravity Pillow" checked="">
```
From the above examples you will note some additional methods on the form fields.  They help create the `data-bind` attribute value that you see in the HTML.  These additional methods are common to all Knockout Fields with exception of the disabled methods in `KnockoutFormAction`.  All setters return $this so that they can be chained.  All the getters are accessible through the templates.

## Knockout Form Action
Create a Knockout computed variable that responses with true when all the fields are valid:
```javascript
this.canSave = ko.pureComputed(function() {
    // returns true if all the below observables are valid
    return this.spaceship.isValid() && this.flightMenu.isValid() && this.seatNumber.isValid();
}, this);

// Or if your ViewModel is relatively simple
this.canSave = ko.validation.group(this);
```
Link this to the Submit button via the `KnockoutActionField`:
```php
$actions = new FieldList(
    KnockoutFormAction::create("doForm")
        ->setObservable('canSave')
        ->setDisabledClass('has-warning')
);
```
The button has the disabled attribute when its observable returns false.  In addition, this field has the method of `setDisabledClass` to dynamically add a class to the input/select element when invalid.  The default class is `FormAction_Disabled`. 

## Knockout Form
To capture form submission in a javascript function following enter/click, add a submit binding handler to the form.  This can be pretty nifty for arranging ajax calls.  In the below example `addToCart` is the javascript function that is called upon form submission.
```php
$form = KnockoutForm::create(
    $this,
    'Form',
    FieldList::create( 
    ...
$form->setSubmit('addToCart');
```
This produces HTML:
```html
<form data-bind="submit: addToCart" ...>
```
The form element is provided to the javascript function.
```javascript
this.addToCart = function(formElement){
  $.ajax({
    url: $(formElement).attr('action'),
    type: $(formElement).attr('method'),
    data: {
      // various
      SecurityID: $(ko.utils.getFormFields(formElement, 'SecurityID')).val()
    }
  }).done(function(data) {
    console.log(data);
  });  
}
```

## Debugging an Observable
To see the values of an observable create a subscription:
```javascript
this.flightMenu.subscribe(function(value) {
    console.log(value);
});
```

## Methods
### Binding Type
* `setBindingType(string)` used to set the binding type as created in [Knockoutjs](http://knockoutjs.com/documentation/introduction.html).
* `getbindingType()` provides the current Binding Type

### Observable
* `setObservable(string)` required on all Knockout forms that need validation.  Set the observable that is defined within the ViewModel of your javascript file.
* `getObservable()` provides the name of the observable defined on the field.

### Has Focus
* `setHasFocus(boolean)` set true on a field to provide focus upon page load.  Set one per form.
* `getHasFocus()` returns a boolean.

### Other Bindings
* `setOtherBindings` provides the ability to add additional bindings to a field, like a tooltip.  e.g. `->setOtherBindings("bsTooltip: {placement: 'right'}")`.  See below for a link to a Bootstrap extension.
* `getOtherBindings()` returns the additional binding handlers added to a field.

### Disabled Class (`KnockoutFormAction` only)
* `setDisabledClass(string)` set the class for the submit button when validation checks return false.  Defaults to `FormAction_Disabled`.
* `getDisabledClass()` returns the disabled class on the KnockoutFormAction field.

### Submit Binding (`KnockoutForm` only)
* `setSubmit(string)` set the javascript function to be called upon form submission.  
* `getSubmit()` returns the javascript function used on the KnockoutForm.

## Extensions
- Add a [Bootstrap Tooltip Binding Handler](https://github.com/AntonyThorpe/knockout-validation-bootstrap-tooltip.git) to present errors via a tooltip.

## Form Fields from other Silverstripe Modules
Replace fields in another Silverstripe Module through extension points with Knockout ones.  For example use the replaceField method:
```php
function updateForm(&$form){
  $fields = $form->Fields();
  
  // form field
  $fields->replaceField('FirstName', KnockoutTextField::create('FirstName', 'FirstName')
    ->setObservable('firstName')
    ->setHasFocus(true)
    ->setValue($fields->fieldByName('FirstName')->Value())
  );

  // action field
  $form->actions->replaceField('action_addtocart', KnockoutFormAction::create('addtocart', 'Add to Cart')
    ->setObservable('numeric')
  );  // note that the replaced field name is prefixed with 'action_'.  Remove this when creating the new KnockoutFormAction.
}
```