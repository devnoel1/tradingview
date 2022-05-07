<x-jet-form-section submit="save()">
    <x-slot name="title">
        {{ __('Credit/Insurance') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Upload verification documents') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4 text-sm text-gray-600">
            <x-jet-label for="passport" value="{{ __('Credit') }}" />
            <div class="grid grid-cols-2 items-center mt-1">
                <input type="file" wire:model="credit" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs block">
                @if($profile->credit_path != null)
                    <span class="invalid ml-2 text-yellow" style="font-size:10px;">Pending</span>
                @else
                    <span class="invalid ml-2 text-red" style="font-size:10px;">Required</span>
                @endif
            </div>
            @error('credit') <span class="error mt-2">{{ $message }}</span> @enderror
        </div>
        <div class="col-span-6 sm:col-span-4 text-sm text-gray-600">
            <x-jet-label for="proof_of_address" value="{{ __('Insurance') }}" />
            <div class="grid grid-cols-2 items-center mt-1">
                <input type="file" wire:model="insurance" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs block">
                @if($profile->insurance_path != null)
                    <span class="invalid ml-2 text-yellow" style="font-size:10px;">Pending</span>
                @else
                    <span class="invalid ml-2 text-red" style="font-size:10px;">Required</span>
                @endif
            </div>
            @error('insurance') <span class="error mt-2">{{ $message }}</span> @enderror
        </div>


    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Uploaded.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Upload') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
