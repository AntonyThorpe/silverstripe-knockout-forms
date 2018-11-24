<?php
namespace AntonyThorpe\Knockout;

trait CommonComposite
{
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
}
