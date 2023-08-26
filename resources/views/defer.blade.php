@props(['action' => 'init', 'loading' => null])
<div wire:init="{{ $action }}">
    @if($this->isReady())
        {{ $slot }}
    @else
        {{ $loading }}
    @endif
</div>
