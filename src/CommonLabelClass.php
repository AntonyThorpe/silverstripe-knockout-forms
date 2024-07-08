<?php
namespace AntonyThorpe\Knockout;

trait CommonLabelClass
{
    /**
     * Place the label on the left or right hand side
     */
    protected string $labelClass = "left";

    /**
     * Set the Label class for the element
     */
    public function setLabelClass(string $name): static
    {
        $this->labelClass = trim($name);
        return $this;
    }

    /**
     * Get the label class
     */
    public function getLabelClass(): string
    {
        return $this->labelClass;
    }
}
