<?php

namespace AntonyThorpe\Knockout;

trait Common
{
    /**
     * The Knockout observable
     */
    protected string $observable = '';

    /**
     * For additional items in the data-bind attribute
     */
    protected string $otherBindings = '';

    /**
     * For applying focus to a field
     */
    protected bool $hasFocus = false;

    /**
     * Provide an observable name
     */
    public function setObservable(string $name): static
    {
        $this->observable = trim($name);
        return $this;
    }

    /**
     * Get the observable name used with the binding handler
     */
    public function getObservable(): string
    {
        return $this->observable;
    }

    /**
     * Ge the other bindings used on the element
     */
    public function getOtherBindings(): string
    {
        return $this->otherBindings;
    }

    /**
     * Additional items for the data-bind attribute
     */
    public function setOtherBindings(string $otherbindings): static
    {
        $this->otherBindings = trim($otherbindings);
        return $this;
    }

    /**
     * Set hasFocus attribute
     */
    public function setHasFocus(bool $input): static
    {
        $this->hasFocus = $input;
        return $this;
    }

    /**
     * Get hasFocus attribute
     */
    public function getHasFocus(): bool
    {
        return $this->hasFocus;
    }
}
