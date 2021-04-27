<?php
namespace AntonyThorpe\Knockout;

trait CommonComposite
{
    /**
     * Place the label on the left or right hand side of the switch
     *
     * @var string left or other
     */
    protected $labelClass = "left";

    /**
     * setObservables
     *
     * @param array $names The names of the knockout observables.
     * @return $this
     */
    public function setObservables($names)
    {
        foreach ($this->children as $key => $field) {
            $field->setObservable($names[$key]);
        }
        return $this;
    }

    /**
     * getObservables
     *
     * @return array The observables used by the children
     */
    public function getObservables()
    {
        return $this->children->column('observable');
    }

    /**
     * set the Label class
     *
     * @param string $name The name of the label class
     * @return $this
     */
    public function setLabelClass($name)
    {
        $this->labelClass = trim($name);
        return $this;
    }

    /**
     * getLabelClass
     *
     * @return string The label class
     */
    public function getLabelClass()
    {
        return $this->labelClass;
    }
}
