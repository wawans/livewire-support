<?php

namespace Wawans\LivewireSupport\Concerns;

trait WithModalForm
{
    /**
     * Action name.
     *
     * @var string
     */
    public $action = 'submit';

    public function render()
    {
        return view('livewire-support::modal-form');
    }
}
