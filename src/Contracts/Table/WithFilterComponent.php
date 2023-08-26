<?php

namespace Wawans\LivewireSupport\Contracts\Table;

/**
 * @property-read string $filter
 */
interface WithFilterComponent
{
    /**
     * Component for filter.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function getFilterProperty();
}
