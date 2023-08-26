<?php

namespace Wawans\LivewireSupport\Concerns;

trait WithPaginationView
{
    /**
     * Component for pagination.
     *
     * @return string
     */
    public function paginationView()
    {
        return 'livewire-support::pagination';
    }
}
