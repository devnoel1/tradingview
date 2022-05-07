<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight" id="education_header">
            {{ __('Education') }}
        </h2>
    </x-slot>

    <div class="overflow-auto" >
        <div class="max-w-7xl mx-auto ">
            <livewire:education/>
        </div>
    </div>
</x-app-layout>
