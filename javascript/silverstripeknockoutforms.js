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
	 * setKnockout Binding Handler
	 *
	 * for passing PHP variables and the observable to Knockout 
	 *
	 * @valueAccessor object 	the value key passes a PHP variable into a Knockout observable  
	 *  						the observable key passes in the observable to be accessed directly
	 *  						Note: the observable setting only needs to be supplied 
	 *  						when using Custom Bindings.
	 * @example {value:'The Enterprise', observable:'spaceship'}
	 */
	ko.bindingHandlers.setKnockout = {
		init: function(element, valueAccessor, allBindings) {
			// Definitions
			var unwrapValueAccessor = ko.unwrap(valueAccessor());
			var observable;

			// obtain the observable from either this binding (needed with a custom binding) or one of Knockouts standard bindings
			if (unwrapValueAccessor.observable) { // 
				observable = unwrapValueAccessor.observable;
			} else {
				// obtain the observable key from the allBindings Accessor
				var key = ko.utils.arrayFirst(["textInput", "value", "click", "event", "submit", "enable", "disable", "checked", "options", "selectedOptions"], function(item) {
					return allBindings.has(item);
				});
				observable = allBindings.get(key);
			}

			// Set the Observable value
			if (unwrapValueAccessor.value) {
				observable(unwrapValueAccessor.value);
			}
		}
	};
})); // close module loader