<?php

namespace AntonyThorpe\Knockout;

trait CommonBindingType
{
    /**
     * A Knockout binding type
     */
    protected string $bindingType = '';

    /**
     * @param string $key As per http://knockoutjs.com/documentation/introduction.htmlentities
     * (e.g 'value', 'textInput', 'checked', 'options', 'selectedOptions')
     */
    public function setBindingType($key): static
    {
        $this->bindingType = $key;
        return $this;
    }

    /**
     * @return string Provide the Knockout binding type used on the element
     */
    public function getBindingType(): string
    {
        return $this->bindingType;
    }
}
