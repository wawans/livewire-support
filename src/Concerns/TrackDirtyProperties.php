<?php

namespace Wawans\LivewireSupport\Concerns;

trait TrackDirtyProperties
{
    /**
     * @var bool
     */
    public $isDirty = false;

    /**
     * @return void
     */
    public function updatedTrackDirtyProperties()
    {
        $this->isDirty = true;
    }

    /**
     * @return void
     */
    public function cleanUp()
    {
        $this->isDirty = false;
    }
}
