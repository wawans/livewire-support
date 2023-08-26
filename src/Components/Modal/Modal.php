<?php

namespace Wawans\LivewireSupport\Components\Modal;

use Livewire\Component;
use Wawans\LivewireSupport\Concerns\WithModal;
use Wawans\LivewireSupport\Contracts\ModalComponent;

abstract class Modal extends Component implements ModalComponent
{
    use WithModal;
}
