/**
 * Knockout components for Silverstripe forms
 *
 */

;
(function(factory) {
	//CommonJS
	if (typeof require === "function" && typeof exports === "object" && typeof module === "object") {
		factory(require("knockout"), exports);
		//AMD
	} else if (typeof define === "function" && define.amd) {
		define(["knockout", "exports"], factory);
		//normal script tag
	} else {
		factory(ko);
	}
}(function(ko) {

	"use strict";
	/**
	 * KnockoutTextField component
	 *
	 * @params 
	 */
	ko.components.register('knockouttextfield', {
		viewModel: function(params) {
			params.templateName = "knockouttextfield-template";

			// if a value then set observable
			if (params.value) {
				params.observable(params.value);
			}
		},
		template: '<!-- -->'
	});

	/**
	 * setKnockout Binding Handler
	 *
	 * for passing PHP variables 
	 *
	 * @valueAccessor object 	the value key passes a PHP variable into a Knockout observable  
	 *  						the observable key passes in the observable to be accessed directly 
	 * 
	 */
	ko.bindingHandlers.setKnockout = {
		init: function(element, valueAccessor, allBindings) {
			// Definitions
			var unwrapValueAccessor = ko.unwrap(valueAccessor());
			var observable;

			// obtain the observable from either this binding (needed with a custom binding) or the Knockouts
			if (unwrapValueAccessor.observable) {
				observable = unwrapValueAccessor.observable;
			} else {
				// obtain the observable key for the allBindingsAccessor
				var key = ko.utils.arrayFirst(["textInput", "value", "click", "event", "submit", "enable", "disable", "checked", "options", "selectedOptions"], function(item) {
					return allBindings()[item];
				});
				observable = allBindings()[key];
			}

			if (unwrapValueAccessor.value) {
				observable(unwrapValueAccessor.value);
			}

		}
	};
})); // close module loader