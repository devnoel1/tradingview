<x-jet-form-section submit="save()">
    <x-slot name="title">
        {{ __('Identification') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Send your identification information.') }}
    </x-slot>

    <x-slot name="form">
        @if($profile->id_front_path != null && $profile->id_back_path != null)
            <div class="col-span-6 sm:col-span-4">
                <span class="text-gray-700">Identification in progress</span>
                <div class="mt-2">
                    Please wait till your agent approves your identification
                    </label>
                </div>
            </div>
        @else

            <div class="col-span-6 sm:col-span-4">
                <span class="text-gray-700">{{ __('Type of identification') }}</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" wire:model="type_of_id" class="form-radio" name="type_of_id" value="passport">
                        <span class="ml-2">Passport</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" wire:model="type_of_id" class="form-radio" name="type_of_id" value="id">
                        <span class="ml-2">ID Card</span>
                    </label>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="id_front" value="{{ __('Front of identification') }}" />
                @error('front') <span class="error mt-2">{{ $message }}</span> @enderror

            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="id_front" value="{{ __('Back of identification') }}" />
                <input type="file" wire:model="back" class="mt-1 block w-full">

                @error('back') <span class="error mt-2">{{ $message }}</span> @enderror

            </div>


        @endif

    </x-slot>

    <x-slot name="actions">
        @if($profile->id_front_path != null && $profile->id_back_path != null)
        @else
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                {{ __('Save') }}
            </x-jet-button>
        @endif
    </x-slot>
</x-jet-form-section>
