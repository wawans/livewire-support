<?php

namespace Wawans\LivewireSupport\Components\Modal;

use Wawans\LivewireSupport\Concerns\WithModalAction;
use Wawans\LivewireSupport\Contracts\ModalActionComponent;

abstract class ModalAction extends Modal implements ModalActionComponent
{
    use WithModalAction;
}
