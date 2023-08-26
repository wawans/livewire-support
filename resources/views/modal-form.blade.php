<x-modal-dialog :modal="$modal" :title="$this->modal_title" livewire>
    <x-slot name="content">
        <x-form.form wire:submit.prevent="submit" class="space-y-2">
            @isset($this->fields)
                @foreach($this->fields as $f)
                    <div class="mb-2">
                        <x-form.group-input :label="data_get($f, 'label', $this->label(data_get($f, 'name')))" :name="data_get($f, 'name')"
                                      :wire:model.defer="data_get($f, 'name')" :attributes="new \Illuminate\View\ComponentAttributeBag($f)">
                        </x-form.group-input>
                    </div>
                @endforeach
            @elseif($this->content)
                {{ $this->content }}
            @endisset
        </x-form.form>
    </x-slot>
    <x-slot name="footer" class="flex justify-between">
        <x-modal-close color="secondary" value="Batal"/>

        <x-livewire.button :action="$action" :value="__('Submit')" type="button" />
    </x-slot>
</x-modal-dialog>
