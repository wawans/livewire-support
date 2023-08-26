<?php

namespace Wawans\LivewireSupport\Concerns;

/**
 * @mixin \Livewire\Component;
 */
trait WithModal
{
    /**
     * Modal component key.
     *
     * @var string
     */
    public $modal;

    /**
     * Mount modal component.
     *
     * @param string|null $modal
     */
    public function mountWithModal($modal = null)
    {
        $this->modal = $modal ?: self::getName();
    }

    /**
     * Dispatch modal using browser event.
     *
     * @param string|null $modal
     * @param string $action
     * @return void
     */
    public function dispatchModal(string $modal = null, string $action = 'show'): void
    {
        $this->dispatchBrowserEvent('x-modal', [
            'action' => $action == 'show' ? $action : 'hide',
            'name' => $modal ?: $this->modal
        ]);
    }

    /**
     * Close/Hide the modal.
     *
     * @param string|null $modal
     * @return void
     */
    public function close(string $modal = null): void
    {
        $this->dispatchModal($modal ?: $this->modal, 'hide');
    }

    /**
     * Open/Show the modal.
     *
     * @param string|null $modal
     * @return void
     */
    public function open(string $modal = null): void
    {
        $this->dispatchModal($modal ?: $this->modal, 'show');
    }
}
