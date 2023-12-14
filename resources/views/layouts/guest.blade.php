<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HouseMasters</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <livewire:styles />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans bg-gray-background text-gray-900">
<header x-data="{ mobileMenuOpen : false }" class=" fixed w-full lg:hidden   bg-white   py-6 px-6 ">
    <div class="justify-between flex-row flex-wrap flex ">
        <a href="#" class="block flex flex-row">
            <span class="sr-only">Island Homes</span>
            <img class="h-6 md:h-8" src="{{ asset('img/logo.png') }}" alt="Island Homes" title="Island Homes"/>
            <span class="font-medium text-xl font-ram text-green1  tracking-tight">ISLAND HOMES</span>
        </a>

        <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-block  w-8 h-8 bg-green1 text-green p-1">
            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>

    </div>
    <nav class="absolute  top-16 left-0  z-20  flex-col  font-semibold w-full   h-screen bg-green bg-opacity-25  shadow-md rounded-lg  p-6 pt-0 "
         :class="{ 'flex' : mobileMenuOpen , 'hidden' : !mobileMenuOpen}"  @click.away="mobileMenuOpen = false"
    >
    <div :class="{ 'flex' : mobileMenuOpen , 'hidden' : !mobileMenuOpen}"  @click.away="mobileMenuOpen = false"
             class="bg-white flex flex-col md:top-8 border-2 border-green  mt-5"
             style="
                            border-image-source: linear-gradient(to bottom, rgba(28, 81, 85, 0.22), rgba(53, 176, 186, 0.11));
                            border-image-slice: 1;
                            background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(28, 81, 85, 0.50), rgba(53, 176, 186, 0.20));
                            background-origin: border-box;
                            background-clip: content-box, border-box;
                    "
        >
            <div class="text-center px-6 py-2 pt-6">
                <h3 class="font-semibold text-green1  text-base">Your Next Home is Here</h3>

            </div>


                <div class="my-6 text-center">
                    <a
                        href="{{ route('login') }}"
                        class="inline-block justify-center w-1/4 h-11 text-xs bg-green text-green1 font-semibold rounded-xl border border-green hover:border-green1 transition duration-150 ease-in px-6 py-3"
                    >
                        Login
                    </a>
                    <a
                        href="{{ route('register') }}"
                        class="inline-block justify-center w-1/4 h-11 text-xs bg-gray-200 text-green1 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-3 py-3"
                    >
                        Register
                    </a>
                </div>





        </div>

    </nav>
</header>

<main class="container max-w-custom mx-auto flex flex-col lg:flex-row  justify-between px-8 py-4">
    <div class="lg:w-70 hidden lg:block mx-auto px-2 md:mx-0 md:mr-5">
        <div
            class="bg-white md:sticky md:top-8 border-2 border-blue rounded-xl mt-5"
            style="
                          border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                            border-image-slice: 1;
                            background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                            background-origin: border-box;
                            background-clip: content-box, border-box;
                    "
        >
            <div class="text-center px-6 py-2 pt-6">
                <a class="" href="/" title="Home">
                    <img class="h-10  mr-2"  src="{{ asset('img/logo.png') }}" alt="logo">
                    <span class="font-semibold text-xl font-ram tracking-tight">ISLAND HOMES</span>
                </a>
                <h3 class="font-semibold text-base">Find Your next  Home</h3>

            </div>

            @auth

                <img src="{{ Auth::user()->getAvatar() }}" alt="avatar" class="w-10 h-10 rounded-full">


                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        {{ __('Log out') }}
                    </a>
                </form>
                <div class="filters ">
                    <div >
                        <select wire:model="location" name="location" id="location" class="w-full rounded-xl border-none px-4 py-2">
                            <option value="All Locations">All Locations</option>
                            {{--                            @foreach ($locations as $location)--}}
                            {{--                                <option value="{{ $location->name }}">{{ $location->name }}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>
                    <div >
                        <select wire:model="category" name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                            <option value="All Categories">All Categories</option>
                            {{--                            @foreach ($categories as $category)--}}
                            {{--                                <option value="{{ $category->name }}">{{ $category->name }}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>
                    <div class=" ">
                        <select wire:model="no_of_bedrooms" name="no_of_bedrooms" id="no_of_bedrooms" class="w-full rounded-xl border-none px-4 py-2">
                            <option value="No of Bedrooms">No of Bedrooms</option>
                            {{--                            @foreach ($no_of_beds as $key=>$value)--}}
                            {{--                                <option value="{{ $key}}">{{ $value }}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>
                    <div class=" ">
                        <select wire:model="no_of_bathrooms" name="no_of_bathrooms" id="no_of_bathrooms" class="w-full rounded-xl border-none px-4 py-2">
                            <option value="No of Bathrooms">No of Bathrooms</option>
                            {{--                            @foreach ($no_of_baths as $key=>$value)--}}
                            {{--                                <option value="{{ $key}}">{{ $value }}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>
                    <div class=" ">
                        <select wire:model="no_of_bathrooms" name="no_of_bathrooms" id="no_of_bathrooms" class="w-full rounded-xl border-none px-4 py-2">
                            <option value="No of Bathrooms">Price Range</option>
                            {{--                            @foreach ($no_of_baths as $key=>$value)--}}
                            {{--                                <option value="{{ $key}}">{{ $value }}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>
                    <div class=" ">
                        <select wire:model="filter" name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                            <option value="No Filter">Sort By</option>
                            <option value="Top Voted">Top Homes</option>
                            <option value="Low Budget">Low Budget Homes</option>
                            <option value="High Budget">High Budget Homes</option>
                            {{--                        <option value="My Ideas">My Homes</option>--}}
                        </select>
                    </div>

                    {{--                <div class="w-full">--}}
                    {{--                    <input wire:model="search" type="search" placeholder="Find a home" class="w-full rounded-xl bg-white border-none placeholder-gray-900 px-4 py-2 pl-8">--}}
                    {{--                    <div class="absolute top-0 flex itmes-center h-full ml-2">--}}
                    {{--                        <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
                    {{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}

                    {{--                <livewire:status-filters />--}}
                </div>
            @else
                <div class="my-6 text-center">
                    <a
                        href="{{ route('login') }}"
                        class="inline-block justify-center w-1/2 h-11 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                    >
                        Login
                    </a>
                    <a
                        href="{{ route('register') }}"
                        class="inline-block justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-4"
                    >
                        Sign Up
                    </a>
                </div>

            @endauth



        </div>
    </div>
    <div class="w-full px-2 mx-auto md:px-0 md:w-175">
        {{--                <livewire:status-filters />--}}

        <div class="mt-8">
            {{ $slot }}
        </div>
    </div>
</main>
<livewire:scripts />

</body>
</html>
