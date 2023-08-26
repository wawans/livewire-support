<?php

namespace Wawans\LivewireSupport\Concerns;

trait WithTimestamp
{
    /**
     * Unix timestamp.
     *
     * @var int
     */
    public $timestamp;

    public function mountWithTimestamp()
    {
        $this->refreshTimestamp();
    }

    public function refreshTimestamp()
    {
        $this->timestamp = now()->unix();
    }
}
