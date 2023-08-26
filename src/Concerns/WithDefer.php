<?php

namespace Wawans\LivewireSupport\Concerns;

trait WithDefer
{
    /**
     * @var bool
     */
    public $loading = true;

    /**
     * @return void
     */
    public function init()
    {
        $this->loading = false;

        if (method_exists($this, 'loaded')) {
            $this->loaded();
        }
    }

    /**
     * @return bool
     */
    protected function isReady()
    {
        return !$this->loading;
    }
}
