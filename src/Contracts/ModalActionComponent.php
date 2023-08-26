<?php

namespace Wawans\LivewireSupport\Contracts;

interface ModalActionComponent
{
    /**
     * Action title.
     *
     * @return string
     */
    public function getTitleProperty();

    /**
     * Action description.
     *
     * @return string
     */
    public function getDescriptionProperty();

    /**
     * Render component.
     */
    public function render();
}
