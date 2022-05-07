<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight self-center" id="education_header">
            {{ __('Calendar') }}
            </h2>
            <p class="font-extralight text-gray-100 text-sm leading-6">
                The event release time is colored according to its importance.
                <br>
                <span class="border rounded-md border-gray-500 px-2 py-0.5 text-gray-500 text-sm">Low</span>
                <span class="border rounded-md border-gray-500 px-2 py-0.5 font-extrabold text-gray-300 text-sm">Medium</span>
                <span class="px-2 py-0.5 text-sm bg-red-800 font-extrabold text-gray-300">High</span>
            </p>    
        </div>
    </x-slot>

    <div class="overflow-auto" >
        <div class="max-w-7xl mx-auto ">
            <livewire:calendar/>
        </div>
    </div>
</x-app-layout>
