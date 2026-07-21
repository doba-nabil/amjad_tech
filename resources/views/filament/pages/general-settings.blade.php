<x-filament-panels::page>
    <x-filament-panels::form wire:submit="submit">
        {{ $this->form }}
        
        <div class="flex justify-start">
            <x-filament::button type="submit">
                {{ __('dashboard.save_settings') }}
            </x-filament::button>
        </div>
    </x-filament-panels::form>
</x-filament-panels::page>
