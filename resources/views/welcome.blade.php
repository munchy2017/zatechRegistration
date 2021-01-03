<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
<div class="flex flex-col">
    @if(Route::has('login'))
        <div class="absolute top-0 right-0 mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
            @auth
                <a href="{{ url('/home') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Home') }}</a>
            @else
                {{-- <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Register') }}</a>
                @endif --}}
            @endauth
        </div>
    @endif

    <div class="min-h-screen flex items-center justify-center">
        <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
            <div class="flex">
                <div class="w-full">
                    <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
        
                        <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                            {{ __('Login') }}
                        </header>
        
                        <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('login') }}">
                            @csrf
        
                            <div class="flex flex-wrap">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('E-Mail Address') }}:
                                </label>
        
                                <input id="email" type="email"
                                    class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                @error('email')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
        
                            <div class="flex flex-wrap">
                                <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Password') }}:
                                </label>
        
                                <input id="password" type="password"
                                    class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                                    required>
        
                                @error('password')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
        
                            <div class="flex items-center">
                                <label class="inline-flex items-center text-sm text-gray-700" for="remember">
                                    <input type="checkbox" name="remember" id="remember" class="form-checkbox"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <span class="ml-2">{{ __('Remember Me') }}</span>
                                </label>
        
                                @if (Route::has('password.request'))
                                <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline ml-auto"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
        
                            <div class="flex flex-wrap">
                                <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                    {{ __('Login') }}
                                </button>
        
                                @if (Route::has('register'))
                                <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                                    {{ __("Don't have an account?") }}
                                    <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </a>
                                </p>
                                @endif
                            </div>
                        </form>
        
                    </section>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
