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
	 * For passing PHP variables and the observable to Knockout 
	 * @param HTML element The element the binding handler is attached to
	 * @param function valueAccessor The value, wrapped in a function, passed from the PHP function into the Knockout observable.
	 * @param function allBindings Other binding handlers on the element
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
				var key = ko.utils.arrayFirst(["visible", "text", "html", "css", "style", "attr", "if", "ifnot", "with", "component", "click", "event", "submit", "enable", "disable", "value", "textInput", "hasFocus", "checked", "options", "selectedOptions"], function(item) {
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