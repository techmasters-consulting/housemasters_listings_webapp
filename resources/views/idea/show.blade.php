<x-app-layout >

    <div class="container max-w-custom mx-auto pt-18 flex flex-col lg:flex-row  justify-between px-8 py-1">
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
                            <div class=" justify-center  flex flex-row text-xs text-green font-semibold space-x-2 ">
                                <a>My Profile</a>
                                <div>&bull;</div>
                                <a>My Homes</a>
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
                            <div class="justify-center  flex flex-row text-xs text-green font-semibold space-x-2 ">

                                    <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:bg-green">
                                        <svg class="w-5 h-5 font-bold text-green1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                        <h3 class="font-semibold text-green1  text-base">Back to Lists</h3>
                                    </a>


                            </div>
                            <div class="text-center px-6 py-2 pt-6">
                                <h3 class="font-semibold text-base">Similar Homes</h3>
                                <p class="text-xs mt-4">

                                    We think you might like!

                                </p>
                                <div class="comment-container relative bg-white rounded-xl flex mt-4">
                                    <div class="flex flex-col flex-1 px-4 py-6">
                                        <div class="flex-none">
                                            <a href="#">
                                                <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-45 h-45 rounded-xl">
                                            </a>
                                        </div>
                                        <div class="w-full md:mx-4">
                                            {{--                                <h4 class="text-xs">--}}
                                            {{--                                    <a href="#" class="hover:underline">A random title can go here</a>--}}
                                            {{--                                </h4>--}}
                                            <div class="text-gray-600 text-xs mt-3 line-clamp-3">
                                                Lorem ipsum dolor sit amet consectetur.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-container relative bg-white rounded-xl flex mt-4">
                                    <div class="flex flex-col flex-1 px-4 py-6">
                                        <div class="flex-none">
                                            <a href="#">
                                                <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-45 h-45 rounded-xl">
                                            </a>
                                        </div>
                                        <div class="w-full md:mx-4">
                                            {{--                                <h4 class="text-xs">--}}
                                            {{--                                    <a href="#" class="hover:underline">A random title can go here</a>--}}
                                            {{--                                </h4>--}}
                                            <div class="text-gray-600 text-xs mt-3 line-clamp-3">
                                                Lorem ipsum dolor sit amet consectetur.
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
        <div class="hidden lg:block lg:w px-2  lg:mr-5">
            <div

                class="bg-white lg:sticky lg:fixed md:top-10 border-2 border-green1 rounded-xl lg:w-70"
                style="
                          border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                            border-image-slice: 1;
                            background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                            background-origin: border-box;
                            background-clip: content-box, border-box;
                    "
            >


                <div class="flex items-center flex-col px-4 py-2 ">
                        <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            <span class="ml-2">Back to Lists</span>
                        </a>
                    </div>

                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">Similar Homes</h3>
                    <p class="text-xs mt-4">

                        We think you might like!

                    </p>
                    <div class="comment-container relative bg-white rounded-xl flex mt-4">
                        <div class="flex flex-col flex-1 px-4 py-6">
                            <div class="flex-none">
                                <a href="#">
                                    <img src="https://source.unsplash.com/200x200/?house&crop=house&v=2" alt="avatar" class="w-45 h-45 rounded-xl">
                                </a>
                            </div>
                            <div class="w-full md:mx-4">
{{--                                <h4 class="text-xs">--}}
{{--                                    <a href="#" class="hover:underline">A random title can go here</a>--}}
{{--                                </h4>--}}
                                <div class="text-gray-600 text-xs mt-3 line-clamp-3">
                                    Lorem ipsum dolor sit amet consectetur.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-container relative bg-white rounded-xl flex mt-4">
                        <div class="flex flex-col flex-1 px-4 py-6">
                            <div class="flex-none">
                                <a href="#">
                                    <img src="https://source.unsplash.com/200x200/?home&crop=home&v=2" alt="avatar" class="w-45 h-45 rounded-xl">
                                </a>
                            </div>
                            <div class="w-full md:mx-4">
                                {{--                                <h4 class="text-xs">--}}
                                {{--                                    <a href="#" class="hover:underline">A random title can go here</a>--}}
                                {{--                                </h4>--}}
                                <div class="text-gray-600 text-xs mt-3 line-clamp-3">
                                    Lorem ipsum dolor sit amet consectetur.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>





            </div>
        </div>
<div>
        <livewire:idea-show
            :idea="$idea"
            :votesCount="$votesCount"
        />

        <div class="comments-container relative space-y-6 md:ml-22 pt-4 my-8 mt-1">
            <div class="comment-container relative bg-white rounded-xl flex mt-4">
                <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                    <div class="flex-none">
                        <a href="#">
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full md:mx-4">
                        {{-- <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">A random title can go here</a>
                        </h4> --}}
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            Lorem ipsum dolor sit amet consectetur.
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div class="font-bold text-gray-900">John Doe</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>
                            </div>
                            <div
                                class="flex items-center space-x-2"
                                x-data="{ isOpen: false }"
                            >
                                <button
                                    class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3"
                                    @click="isOpen = !isOpen"
                                >
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                    <ul
                                        class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl z-10 py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0"
                                        x-cloak
                                        x-show.transition.origin.top.left="isOpen"
                                        @click.away="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                    >
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end comment-container -->
            <div class="comment-container relative bg-white rounded-xl flex mt-4">
                <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                    <div class="flex-none">
                        <a href="#">
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full md:mx-4">
                        {{-- <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">A random title can go here</a>
                        </h4> --}}
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            Lorem ipsum dolor sit amet consectetur.
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div class="font-bold text-gray-900">John Doe</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>
                            </div>
                            <div
                                class="flex items-center space-x-2"
                                x-data="{ isOpen: false }"
                            >
                                <button
                                    class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3"
                                    @click="isOpen = !isOpen"
                                >
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                    <ul
                                        class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl z-10 py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0"
                                        x-cloak
                                        x-show.transition.origin.top.left="isOpen"
                                        @click.away="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                    >
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end comment-container -->
            <div class="comment-container relative bg-white rounded-xl flex mt-4">
                <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                    <div class="flex-none">
                        <a href="#">
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full md:mx-4">
                        {{-- <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">A random title can go here</a>
                        </h4> --}}
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            Lorem ipsum dolor sit amet consectetur.
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div class="font-bold text-gray-900">John Doe</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>
                            </div>
                            <div
                                class="flex items-center space-x-2"
                                x-data="{ isOpen: false }"
                            >
                                <button
                                    class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3"
                                    @click="isOpen = !isOpen"
                                >
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                    <ul
                                        class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl z-10 py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0"
                                        x-cloak
                                        x-show.transition.origin.top.left="isOpen"
                                        @click.away="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                    >
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end comment-container -->
            {{--         <div class="is-admin comment-container relative bg-white rounded-xl flex mt-4">--}}
            {{--            <div class="flex flex-1 px-4 py-6">--}}
            {{--                <div class="flex-none">--}}
            {{--                    <a href="#">--}}
            {{--                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar" class="w-14 h-14 rounded-xl">--}}
            {{--                    </a>--}}
            {{--                    <div class="text-center uppercase text-blue text-xxs font-bold mt-1">Admin</div>--}}
            {{--                </div>--}}
            {{--                <div class="w-full mx-4">--}}
            {{--                    <h4 class="text-xl font-semibold">--}}
            {{--                        <a href="#" class="hover:underline">Status Changed to "Under Consideration"</a>--}}
            {{--                    </h4>--}}
            {{--                    <div class="text-gray-600 mt-3 line-clamp-3">--}}
            {{--                        Lorem ipsum dolor sit amet consectetur.--}}
            {{--                    </div>--}}

            {{--                    <div class="flex items-center justify-between mt-6">--}}
            {{--                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">--}}
            {{--                            <div class="font-bold text-blue">Andrea</div>--}}
            {{--                            <div>&bull;</div>--}}
            {{--                            <div>10 hours ago</div>--}}
            {{--                        </div>--}}
            {{--                        <div class="flex items-center space-x-2">--}}
            {{--                            <button class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3">--}}
            {{--                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>--}}
            {{--                                <ul class="hidden absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 ml-8">--}}
            {{--                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>--}}
            {{--                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Post</a></li>--}}
            {{--                                </ul>--}}
            {{--                            </button>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div> <!-- end comment-container -->--}}

        </div> <!-- end comments-container -->
    </div>


    </div>







</x-app-layout>
