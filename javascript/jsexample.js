(function(ko, $) {
	"use strict";

	/**
	 * Knockout Validation
	 *
	 * global settings plus a custom rule that two fields (e.g. passwords) are the same
	 */
	// 
	ko.validation.init({
		insertMessages: false,
		decorateElement: true
	});


	/**
	 * areSame 
	 *
	 * Knockout Validation custom rule.  Used to check that passwords match
	 */
	// 
	ko.validation.rules["areSame"] = {
		getValue: function(o) {
			return (typeof o === 'function' ? o() : o);
		},
		validator: function(val, otherField) {
			return val === this.getValue(otherField);
		},
		message: 'The fields must have the same value'
	};


	ko.validation.registerExtenders();
	ko.applyBindings(new viewModel());

})(ko, $);