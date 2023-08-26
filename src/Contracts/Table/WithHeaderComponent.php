<?php

namespace Wawans\LivewireSupport\Contracts\Table;

/**
 * @property-read string $header
 */
interface WithHeaderComponent
{
    /**
     * Component for header.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function getHeaderProperty();
}
