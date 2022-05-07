<x-jet-form-section submit="save()">
    <x-slot name="title">
        {{ __('Adding Balance') }}
    </x-slot>

    <x-slot name="description">
        {{ __('By using this for you can add Balance to your Account. Fill in the Amount you want to add to your account. The agent will contact you to help you make a payment') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="amount" value="{{ __('Amount') }}" />
            <x-jet-input id="amount" type="number" class="mt-1 block w-full" wire:model.defer="amount" autocomplete="amount" step='1.00' value='0.00' placeholder='0.00' />
            <x-jet-input-error for="amount" class="mt-2" />
        </div>

        <!-- Note -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="note" value="{{ __('Note') }}" />
            <x-jet-input id="note" type="text" class="mt-1 block w-full" wire:model.defer="note" autocomplete="note" />
            <x-jet-input-error for="note" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
