<x-jet-form-section submit="save()">
    <x-slot name="title">
        {{ __('KYC/AML') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Upload verification documents') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4 text-sm text-gray-600">
            <x-jet-label for="passport" value="{{ __('ID/PASSPORT') }}" />
            <div class="grid grid-cols-2 items-center mt-1">
                <input type="file" wire:model="passport" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs block">
                @if($profile->id_front_path != null)
                    <span class="invalid ml-2 text-yellow" style="font-size:10px;">Pending</span>
                @else
                    <span class="invalid ml-2 text-red" style="font-size:10px;">Required</span>
                @endif
            </div>
            @error('passport') <span class="error mt-2">{{ $message }}</span> @enderror
            <p class="opacity-70 pt-2">A Colour copy of passport/ID. Driver’s license (first page which includes photo and date of birth).</p>
        </div>
        <div class="col-span-6 sm:col-span-4 text-sm text-gray-600">

            <x-jet-label for="proof_of_address" value="{{ __('Proof of address') }}" />
            <div class="grid grid-cols-2 items-center mt-1">
                <input type="file" wire:model="proof_of_address" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs block">
                @if($profile->proof_of_address_path != null)
                    <span class="invalid ml-2 text-yellow" style="font-size:10px;">Pending</span>
                @else
                    <span class="invalid ml-2 text-red" style="font-size:10px;">Required</span>
                @endif
            </div>
            @error('proof_of_address') <span class="error mt-2">{{ $message }}</span> @enderror
            <p class="opacity-70 pt-2">Proof of address in colour (utility bill under your name showing your address this could also be a bank statement) clearly dated and no more than three months old.</p>
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
