<?php

namespace Wawans\LivewireSupport\Concerns;

/**
 * @mixin \Livewire\Component;
 */
trait WithNotify
{
    /**
     * Dispatch notify event.
     *
     * @param string $text
     * @param string $title
     * @param string $type
     * @param int $duration
     * @param string $position
     * @return void
     */
    public function notify($text, $title = '', $type = 'info', $duration = 5000, $position = 'right-top')
    {
        $this->dispatchBrowserEvent('x-notify', [
            'text' => $text,
            'title' => $title,
            'variant' => $type,
            'position' => $position,
            'duration' => $duration,
        ]);
    }
}
