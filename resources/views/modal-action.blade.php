<x-modal-confirm :modal="$modal"
                 :title="$this->title"
                 :description="$this->description"
                 :type="$type" livewire>
    <div class="flex justify-between gap-6 mt-6">
        <x-modal-close color="secondary" :value="$no" class="min-w-[81px]"/>

        <x-livewire.button :action="$action" :value="$yes" type="button" class="min-w-[81px]"/>
    </div>
</x-modal-confirm>
