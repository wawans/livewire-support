<?php

namespace Wawans\LivewireSupport\Components\Form;

use Livewire\Component;
use Wawans\LivewireSupport\Concerns\WithForm;
use Wawans\LivewireSupport\Contracts\FormComponent;

abstract class Form extends Component implements FormComponent
{
    use WithForm;

    /**
     * Get model value.
     *
     * @return
     */
    abstract protected function getValue();

    /**
     * Get model value property.
     *
     */
    public function getValueProperty()
    {
        return $this->getValue();
    }
}
