@section('style')
    <style>
        @media (min-width: 900px) {
            body{
              overflow:hidden !important;
            }
        }
        #test {
            /* bottom: 0;
                top:0;
                left:0; */
            height: 85vh !important;
            overflow-y: auto !important;
            padding-bottom:10px !important; 

        }

        #test::-webkit-scrollbar {
            bottom: 0;
            top: 0;
            width: 5px;
            /* background: #ffc62d !important; */
        }

        #test::-webkit-scrollbar-track {
            border-radius: 10px;
            /* background: #ffc62d; */
            background: grey;
        }
        #test::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background: #ffc62d;
        }
        @media screen and (max-width: 1279px) {
            #test{
                height: auto !important;
            }
        }
    </style>
@endsection
<x-app-layout >
    <div id="test">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-md">
                <x-jet-welcome />
            </div>
        </div>
    </div>
    </div>
    
</x-app-layout>
