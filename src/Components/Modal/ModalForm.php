<?php

namespace Wawans\LivewireSupport\Components\Modal;

use Wawans\LivewireSupport\Concerns\WithForm;
use Wawans\LivewireSupport\Concerns\WithModalForm;
use Wawans\LivewireSupport\Contracts\FormComponent;

abstract class ModalForm extends Modal implements FormComponent
{
    use WithForm;
    use WithModalForm;
}
