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

		var self = this;

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

		self.password = ko.observable().extend({
			required: true
		});

		self.confirmedPassword = ko.observable().extend({
			required: true,
			areSame: {
				params: self.password.bind(self),
				message: "Passwords must match"
			}
		});

		this.canSave = ko.pureComputed(function() {
			return this.spaceship.isValid() && this.flightMenu.isValid() && this.seatNumber.isValid() && this.email.isValid() && this.comments.isValid() && this.accessories.isValid() && self.password.isValid() && self.confirmedPassword.isValid();
		}, this);

		self.password.subscribe(function(value) {
			console.log(value);
		});

        self.addToCart = function(){
            return null;
        }
	}

	ko.validation.registerExtenders(); // for Knockout Validation
	ko.applyBindings(new viewModel(), document.getElementById("body"));

})(ko);
