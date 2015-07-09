<?php

namespace Knockout;

trait Common {
	/**
	 * $observable
	 *
	 * @var string a Knockout observable
	 */
	protected $observable;

	/**
	 * $otherBindings
	 *
	 * @var string for additional items in the data-bind attribute
	 */
	protected $otherBindings;

	/**
	 * $focus
	 *
	 * @var boolean for applying focus to a field
	 */
	protected $hasFocus = false;

	/**
	 * setObservable
	 *
	 * @param string $name The name of the knockout observable
	 * @return $this
	 */
	public function setObservable($name) {
		$this->observable = trim($name);
		return $this;
	}

	/**
	 * getObservable
	 *
	 * @return string
	 */
	public function getObservable() {
		return $this->observable;
	}

	/**
	 * setbindingType
	 *
	 * @param string $key As per http://knockoutjs.com/documentation/introduction.htmlentities (e.g 'value', 'textInput', 'checked', 'options', 'selectedOptions')
	 * @return $this
	 */
	public function setBindingType($key) {
		$this->bindingType = $key;
		return $this;
	}

	/**
	 * getBindingType
	 *
	 * @return string
	 */
	public function getBindingType() {
		return $this->bindingType;
	}


	/**
	 * getOtherBindings
	 *
	 * @return string
	 */
	public function getOtherBindings() {
		return $this->otherBindings;
	}

	/**
	 * setOtherBindings
	 *
	 * @param string $otherbindings Additional value for the data-bind attribute
	 * @return $this
	 */
	public function setOtherBindings($otherbindings) {
		$this->otherBindings = trim($otherbindings);
		return $this;
	}

	/**
	 * setHasFocus
	 *
	 * @return $this
	 */
	public function setHasFocus($input) {
		$this->hasFocus = (boolean)$input;
		return $this;
	}

	/**
	 * getHasFocus
	 *
	 * @return boolean
	 */
	public function getHasFocus() {
		return $this->hasFocus;
	}


}