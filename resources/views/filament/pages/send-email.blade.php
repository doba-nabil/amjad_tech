<x-filament-panels::page>
    <x-filament-panels::form wire:submit="sendEmail">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedHeaderActions()"
            :full-width="false"
        />
    </x-filament-panels::form>
</x-filament-panels::page>
