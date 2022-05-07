@section('style')
<style>
    body{
       overflow:hidden !important;
   }
</style>

@endsection

<x-guest-layout style="overflow:hidden!important">
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="https://sigiandco.com/">
              <img src="{{asset('storage/logo_white.png')}}" class="block h-14 w-auto" />
            </a>
        </x-slot>


        <h1 class="auth-header py-2">Login</h1>

        <div class="mb-4 p-2 text-sm text-gray-600 text-center">
            By logging in, you agree to the <a target="_blank" href="https://sigiandco.com/?page_id=76" class="underline text-sm text-gray-600 hover:text-gray-900">Risk Warning</a> <a target="_blank" href="https://sigiandco.com/?page_id=86" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of use</a> <a target="_blank" href="https://sigiandco.com/?page_id=89" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy policy</a> and <a target="_blank" href="https://sigiandco.com/?page_id=1531" class="underline text-sm text-gray-600 hover:text-gray-900">General business terms</a>
        </div>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" placeholder="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"  placeholder="password" required autocomplete="current-password" />
            </div>

            <div class="grid grid-flow-col grid-cols-2 mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 text-right" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="block mt-4">

            </div>

            <div class="flex items-center justify-end mt-8">

                <a class="secondary--button duration-300 ease-in-out" href="{{ route('register') }}">
                    {{ __('Open new account') }}
                </a>
                <x-jet-button class="primary--button inline-flex ml-4 auth-button duration-300 ease-in-out">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
