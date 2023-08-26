<?php

namespace Wawans\LivewireSupport;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Wawans\LivewireSupport\Skeleton\SkeletonClass
 */
class LivewireSupportFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'livewire-support';
    }
}
