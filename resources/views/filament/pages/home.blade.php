{{-- <x-filament-panels::page>

    <x-filament-panels::form wire:submit="save">

    {{ $this->form }}

    <x-filament-panels::form.actions
    :actions="$this->getFormActions()"
    />


    </x-filament-panels::form>

</x-filament-panels::page> --}}

{{-- <x-filament-panels::page>
    <x-filament-panels::form>
        {!! $this->form !!}
    </x-filament-panels::form>
</x-filament-panels::page> --}}

{{-- <x-filament::page>
    <form wire:submit.prevent="submit">
        {{ $this->form }}

        <x-filament-support::button type="submit" class="mt-4">
            Save
        </x-filament-support::button>
    </form>
    Winners form will be here
</x-filament::page> --}}

<x-filament-panels::page>
    <x-filament-panels::form wire:submit="saveee">
        {{ $this->form }}

        <x-filament-panels::form.actions
                :actions="$this->getFormActions()"
        />
    </x-filament-panels::form>
</x-filament-panels::page>
