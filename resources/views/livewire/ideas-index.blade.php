
<div class="">

<header x-data="{ mobileMenuOpen : false }" class=" fixed w-full lg:hidden bg-green bg-opacity-25    py-6 px-6 ">
    <div class="justify-between flex-row flex-wrap flex ">
        <a href="/" class="block flex flex-row">
            <span class="sr-only">Island Homes</span>
            <img class="h-6 md:h-8" src="{{ asset('img/logo.png') }}" alt="Island Homes" title="Island Homes"/>
            <span class="font-medium text-xl font-ram text-green1  tracking-tight">ISLAND HOMES</span>
        </a>

        <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-block  w-8 h-8 bg-green1 text-green p-1">
            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>

    </div>
    <div class="absolute  top-20 left-0  z-20  flex-col  font-semibold w-full
         h-screen bg-green bg-opacity-25  shadow-md rounded-lg  p-6 pt-0 "
         :class="{ 'flex' : mobileMenuOpen , 'hidden' : !mobileMenuOpen}"  @click.away="mobileMenuOpen = false"
    >
        <div class="bg-white bg-opacity-5 md:sticky md:top-8 border-2 border-green rounded-xl mt-5" style="
                          border-image-source: linear-gradient(to bottom, rgba(28, 81, 85, 0.22), rgba(53, 176, 186, 0.11));
                            border-image-slice: 1;
                            background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                            background-origin: border-box;
                            background-clip: content-box, border-box;
                    "
        >
            @auth

                <div class="flex items-center flex-col px-4 py-2 pt-6">
                    <div class="">
                        <img src="{{ Auth::user()->getAvatar() }}" alt="avatar"
                             class="w-10 h-10 rounded-full"/>
                    </div>
                    <div class=" justify-center flex flex-row text-xs text-gray-400 font-semibold space-x-2 ">
                        <a>My Profile</a>
                        <div>&bull;</div>
                        <a>My Properties</a>
                        <div>&bull;</div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                    <div class="my-2">
                        <h3 class="font-semibold text-green1  text-base">Find Your Next Home</h3>
                    </div>
                    <div class="my-1 ">
                        <livewire:status-filters />
                    </div>
                </div>
                <div class="filters px-4">
                    <div class="">
                        <select wire:model="location" name="location"
                                id="location" class="w-full bg-green bg-opacity-5 rounded-xl border-none  my-1">
                            <option value="All Locations">All Locations</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->name }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <select wire:model="category" name="category" id="category" class="w-full bg-green bg-opacity-5 rounded-xl border-none  my-1">
                            <option value="All Categories">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <select wire:model="no_of_bedrooms" name="no_of_bedrooms" id="no_of_bedrooms" class="w-full bg-green bg-opacity-5 rounded-xl border-none  my-1">
                            <option value="No of Bedrooms">No of Bedrooms</option>
                            @foreach ($no_of_beds as $key=>$value)
                                <option value="{{ $key}}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" ">
                        <select wire:model="no_of_bathrooms" name="no_of_bathrooms" id="no_of_bathrooms" class="w-full bg-green bg-opacity-5 rounded-xl border-none my-1">
                            <option value="No of Bathrooms">No of Bathrooms</option>
                            @foreach ($no_of_baths as $key=>$value)
                                <option value="{{ $key}}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <select wire:model="filter" name="other_filters" id="other_filters" class="w-full border-green1 rounded-xl bg-green bg-opacity-5 border-none select-none my-1">
                            <option value="No Filter">Sort By</option>
                            <option value="Top Voted">Top Homes</option>
                            <option value="Low Budget">Low Budget Homes</option>
                            <option value="High Budget">High Budget Homes</option>
                            <option value="My Ideas">My Homes</option>
                        </select>
                    </div>
                    <div class="items-center mb-5 flex ">
                        <div class="absolute top-15 flex items-center h-full ml-2">
                            <svg class="w-4 text-green" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input wire:model="search" type="search" placeholder="search by a keyword"
                               class="w-full rounded-xl bg-green bg-opacity-5 border-green1 placeholder-gray-200
                                text-xs-center  py-2 pl-8">

                    </div>

                </div>
            @else
                <div class="my-6 text-center">
                    <div class="text-center px-6 py-2 pt-6">
                        <h3 class="font-semibold text-green1  text-base">Your Next Home is Here</h3>

                    </div>
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

            @endauth



        </div>
    </div>

</header>


   <!-- end filters -->
    <div class="container max-w-custom mx-auto pt-18 flex flex-col lg:flex-row  justify-between px-8 py-1">
        <div class="hidden lg:block  px-2  lg:mr-5">
                    <div
                        class="bg-white lg:sticky lg:fixed md:top-10 border-2 border-blue rounded-xl lg:w-70"
                        style="
                          border-image-source: linear-gradient(to bottom, rgba(28, 81, 85, 0.22), rgba(53, 176, 186, 0.11));
                            border-image-slice: 1;
                            background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                            background-origin: border-box;
                            background-clip: content-box, border-box;
                    "
    >
        @auth

            <div class="flex items-center flex-col px-4 py-2 ">
{{--                <div class="">--}}
{{--                    <img src="{{ Auth::user()->getAvatar() }}" alt="avatar"--}}
{{--                         class="w-10 h-10 rounded-full"/>--}}
{{--                </div>--}}
{{--                <div class=" justify-center flex flex-row text-xs text-gray-400 font-semibold space-x-2 ">--}}
{{--                    <a>My Profile</a>--}}
{{--                    <div>&bull;</div>--}}
{{--                    <a>My Homes</a>--}}
{{--                    <div>&bull;</div>--}}
{{--                    <form method="POST" action="{{ route('logout') }}">--}}
{{--                        @csrf--}}

{{--                        <a href="{{ route('logout') }}"--}}
{{--                           onclick="event.preventDefault();--}}
{{--                                                    this.closest('form').submit();">--}}
{{--                            {{ __('Log Out') }}--}}
{{--                        </a>--}}
{{--                    </form>--}}
{{--                </div>--}}
                <div class="my-1">
                    <h3 class="font-semibold text-green1  text-base">Find Your Next Home</h3>
                </div>
                <div class="my-1 ">
                    <livewire:status-filters />
                </div>
            </div>
            <div class="filters px-4">
                <div class="">
                    <select wire:model="location" name="location"
                            id="location" class="w-full bg-green bg-opacity-5 rounded-xl border-none  my-1">
                        <option value="All Locations">All Locations</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->name }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <select wire:model="category" name="category" id="category" class="w-full bg-green bg-opacity-5 rounded-xl border-none  my-1">
                        <option value="All Categories">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <select wire:model="no_of_bedrooms" name="no_of_bedrooms" id="no_of_bedrooms" class="w-full bg-green bg-opacity-5 rounded-xl border-none  my-1">
                        <option value="No of Bedrooms">No of Bedrooms</option>
                        @foreach ($no_of_beds as $key=>$value)
                            <option value="{{ $key}}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" ">
                    <select wire:model="no_of_bathrooms" name="no_of_bathrooms" id="no_of_bathrooms" class="w-full bg-green bg-opacity-5 rounded-xl border-none my-1">
                        <option value="No of Bathrooms">No of Bathrooms</option>
                        @foreach ($no_of_baths as $key=>$value)
                            <option value="{{ $key}}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <select wire:model="filter" name="other_filters" id="other_filters" class="w-full border-green1 rounded-xl bg-green bg-opacity-5 border-none select-none my-1">
                        <option value="No Filter">Sort By</option>
                        <option value="Top Voted">Top Homes</option>
                        <option value="Low Budget">Low Budget Homes</option>
                        <option value="High Budget">High Budget Homes</option>
                        <option value="My Ideas">My Homes</option>
                    </select>
                </div>
                <div class="items-center mb-5 flex ">
                    <div class="absolute top-15 flex items-center h-full ml-2">
                        <svg class="w-4 text-green" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input wire:model="search" type="search" placeholder="search by a keyword"
                           class="w-full rounded-xl bg-green bg-opacity-5 border-green1 placeholder-gray-200
                                text-xs-center  py-2 pl-8">

                </div>

            </div>
        @else
            <div class="my-6 text-center">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-green1  text-base">Your Next Home is Here</h3>

                </div>
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

        @endauth


                    </div>

    </div>

    <div class="w-full ideas-container  ">

        @forelse ($ideas as $idea)
            <livewire:idea-index
                :key="$idea->id"
                :idea="$idea"
                :votesCount="$idea->votes_count"
            />
        @empty
            <div class="mx-auto  mt-12">
                <img src="{{ asset('img/no-ideas.svg') }}" alt="No Ideas" class="mx-auto" style="mix-blend-mode: luminosity">
                <div class="text-gray-400 text-center font-bold mt-6"> No properties were found ... </div>
            </div>
        @endforelse

            <div class="my-8">
                {{-- {{ $ideas->links() }} --}}
                {{ $ideas->appends(request()->query())->links() }}
            </div>
    </div> <!-- end ideas-container -->
</div>
</div>

