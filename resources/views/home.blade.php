@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif


        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Dashboard
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700">
                    @auth
                Hi {{ Auth::user()->name }} Please update your profile below
                @endauth
                    
                </p>
            </div>
            <button>
                @if (\Session::has('success'))
                <div style="color: green" class="alert alert-success">
                 <p>{{ \Session::get('success') }}</p>
                </div><br />
                @endif
            </button>
            <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8"
             method="POST"
             action="{{url('home')}}">
             {{csrf_field()}} 
             
            @foreach ($user as $users)
            <div class="-mx-3 md:flex mb-2">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    {{ __('Name') }}
                </label>

                <input readonly id="name" type="text" class="form-input w-full   "
                    name="name" value="{{$users->name}}"  autocomplete="name" autofocus>
   
            </div>

            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="lastname" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    {{ __('Last Name') }}
                </label>

                <input readonly id="lastname" type="text" class="form-input w-full "
                    name="lastname" value="{{$users->lastname}}"  autocomplete="lastname" autofocus>
  
            </div>

            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="email" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    {{ __('E-Mail Address') }}
                </label>

                <input readonly id="email" type="email"
                    class="form-input w-full " name="email"
                    value="{{$users->email}}"  autocomplete="email">
            </div>
            </div>

            <div class="-mx-3 md:flex mb-2">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="street">
                    {{ __('Street') }}
                  </label>
                  <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" value=" {{$users->street}}" id="street" name="street" type="text" >
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="city">
                        {{ __('City') }}
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" value=" {{$users->city}}" id="city" name="city"  type="text" >
                  </div>
                <div class="md:w-1/2 px-3">
                  <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="country">
                    {{ __('Country') }}
                  </label>
                  <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" value=" {{$users->country}}" id="country" name="country" type="text" >
                </div>
              </div>
            @endforeach

            <div class="flex flex-wrap">
                <button type="submit"
                    class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
        <br>
        <div></div>
        </section>
    </div>
</main>
@endsection
