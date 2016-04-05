# Installation and Configuration of Silverstripe Knockout Forms

## Installation
In a terminal
`composer require antonythorpe/silverstripe-knockout-forms`

## Configuration
### Javascript Files
Load the following javascript libraries in the following order: 
* [`Knockoutjs`](http://knockoutjs.com/downloads/index.html)
* [`Knockout-Validation`](https://github.com/Knockout-Contrib/Knockout-Validation)
* `/javascript/silverstripeknockoutforms.js`
* your file with a Knockout ViewModel (similar to `/javascript/jsexample.js`)

### Global Knockout Validation Settings
Set the javascript object in `ko.validation.init` as per Knockout-Validation's [instructions](https://github.com/Knockout-Contrib/Knockout-Validation/wiki/Configuration).  See jsexample.js to get started with an inserted span.
