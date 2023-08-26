<?php

namespace Wawans\LivewireSupport\Contracts;

interface ModalComponent
{
    /**
     * Close the modal.
     */
    public function close();

    /**
     * Render component.
     */
    public function render();
}
