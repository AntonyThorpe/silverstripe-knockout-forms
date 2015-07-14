(function(ko) {
	"use strict";

	/**
	 * Knockout Validation
	 *
	 * global settings plus a custom rule that two fields (e.g. passwords) are the same
	 */
	// 
	ko.validation.init({
		insertMessages: true, // set to false for tooltip
		messagesOnModified: true
	});


	/**
	 * areSame 
	 *
	 * Knockout Validation custom rule.  Used to check that passwords match
	 */
	ko.validation.rules["areSame"] = {
		getValue: function(o) {
			return (typeof o === 'function' ? o() : o);
		},
		validator: function(val, otherField) {
			return val === this.getValue(otherField);
		},
		message: 'The fields must have the same value'
	};

	/**
	 * ViewModel 
	 */
	function viewModel() {

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

		this.canSave = ko.pureComputed(function() {
			return this.spaceship.isValid() && this.flightMenu.isValid() && this.seatNumber.isValid();
		}, this);


		this.flightMenu.subscribe(function(value) {
			//console.log(value);
		});


	}



	ko.validation.registerExtenders();
	ko.applyBindings(new viewModel(), document.getElementById("body"));

})(ko);