<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Scripts -->
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
        @livewireStyles
        @livewireScripts
        @wireUiScripts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <x-notifications />
        @include('sweetalert::alert')
        <header>
            <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <a href="https://flowbite.com" class="flex items-center">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                    </a>
                    <div class="flex items-center lg:order-2">

                            
                            <button data-tooltip-target="tooltip-dark" id="theme-toggle" type="button"  class="inline-flex items-center p-2 mr-1 text-sm font-medium text-gray-500 rounded-lg dark:text-gray-400 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                                <svg id="theme-toggle-dark-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                                <svg id="theme-toggle-light-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                            </button>
                            <div id="tooltip-dark" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                Toggle dark mode
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        @auth
                            
                            <button type="button" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                            </button>
                            <!-- Dropdown menu -->
                            <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown">
                                <div class="py-3 px-4">
                                <span class="block text-sm font-semibold text-gray-900 dark:text-white">{{Auth::user()->name}}</span>
                                <span class="block text-sm font-light text-gray-500 truncate dark:text-gray-400">{{Auth::user()->email}}</span>
                                </div>
                                <ul class="py-1 font-light text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                                    <li>
                                        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">My profile</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Account settings</a>
                                    </li>
                                </ul>
                                <ul class="py-1 font-light text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                                    
                                    <li>
                                        <a href="{{route('polla')}}" class="flex justify-between items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <span class="flex items-center">
                                                <?xml version="1.0" encoding="UTF-8"?>
                                                <svg class="mr-2 w-5 h-5 text-primary-600 dark:text-primary-500" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <!-- Generator: Sketch 52.5 (67469) - http://www.bohemiancoding.com/sketch -->
                                                    <title>poll</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g id="Outlined" transform="translate(-273.000000, -4145.000000)">
                                                            <g id="Social" transform="translate(100.000000, 4044.000000)">
                                                                <g id="Outlined-/-Social-/-poll" transform="translate(170.000000, 98.000000)">
                                                                    <g>
                                                                        <polygon id="Path" points="0 0 24 0 24 24 0 24"></polygon>
                                                                        <path d="M19,3 L5,3 C3.9,3 3,3.9 3,5 L3,19 C3,20.1 3.9,21 5,21 L19,21 C20.1,21 21,20.1 21,19 L21,5 C21,3.9 20.1,3 19,3 Z M19,19 L5,19 L5,5 L19,5 L19,19 Z M7,10 L9,10 L9,17 L7,17 L7,10 Z M11,7 L13,7 L13,17 L11,17 L11,7 Z M15,13 L17,13 L17,17 L15,17 L15,13 Z" id="🔹-Icon-Color" fill="currentColor"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                                Add Poll
                                            </span>
                                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                        </a>
                                    </li>
                                    
                                </ul>
                                <ul class="py-1 font-light text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button onclick="event.preventDefault(); this.closest('form').submit();" class="text-primary-600 dark:text-primary-500 ml-1 lg:ml-3 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-3 lg:px-5 py-2 lg:py-2.5 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log out</button>
                            </form>

                        @else

                            <a href="{{ route('login') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Sign Up</a>
                            @endif
                            
                            <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>

                        @endauth

                    </div>
                    <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                        <ul class="flex text-sm flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="{{route('polls')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Polls</a>
                            </li>
                            
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                            </li>
                            <li>
                                <a href="{{route('comments')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Comments</a>
                            </li>
                            
                            <li>
                                <a href="{{route('achievements')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Achievements</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="font-sans text-gray-900 antialiased dark:bg-gray-900">
            {{ $slot }}
            <footer class="bg-gray-50 dark:bg-gray-800">
                <div class="p-4 py-6 mx-auto max-w-screen-xl md:p-8 lg:p-10">
                    <div class="justify-between items-center p-4 mx-auto mt-6 max-w-screen-md bg-gray-50 rounded-lg lg:mt-16 sm:flex dark:bg-gray-700">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Sign up to our newsletter</p>
                        <form action="#" class="flex mt-4 ml-0 w-full sm:mt-0 sm:ml-5">
                            <div class="relative w-full">
                                <label for="email-subscribe" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email address</label>
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </div>
                                <input type="email" id="email-subscribe" class="block p-3 pl-10 w-full text-sm text-gray-900 bg-white rounded-l-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your email" required>
                            </div>
                            <button type="submit" class="py-3 px-5 text-sm text-center text-white rounded-r-lg border cursor-pointer bg-primary-600 border-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Subscribe</button>
                        </form>
                    </div>
                    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
                    <div class="flex flex-col justify-between items-center lg:flex-row">
                        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 lg:mb-0 dark:text-white">
                            <svg class="mr-2 h-8" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25.2696 13.126C25.1955 13.6364 24.8589 14.3299 24.4728 14.9328C23.9856 15.6936 23.2125 16.2264 22.3276 16.4114L18.43 17.2265C17.8035 17.3575 17.2355 17.6853 16.8089 18.1621L14.2533 21.0188C13.773 21.5556 13.4373 21.4276 13.4373 20.7075C13.4315 20.7342 12.1689 23.9903 15.5149 25.9202C16.8005 26.6618 18.6511 26.3953 19.9367 25.6538L26.7486 21.7247C29.2961 20.2553 31.0948 17.7695 31.6926 14.892C31.7163 14.7781 31.7345 14.6639 31.7542 14.5498L25.2696 13.126Z" fill="url(#paint0_linear_11430_22515)"/><path d="M23.5028 9.20133C24.7884 9.94288 25.3137 11.0469 25.3137 12.53C25.3137 12.7313 25.2979 12.9302 25.2694 13.1261L28.0141 14.3051L31.754 14.5499C32.2329 11.7784 31.2944 8.92561 29.612 6.65804C28.3459 4.9516 26.7167 3.47073 24.7581 2.34097C23.167 1.42325 21.5136 0.818599 19.8525 0.486816L17.9861 2.90382L17.3965 5.67918L23.5028 9.20133Z" fill="url(#paint1_linear_11430_22515)"/><path d="M1.5336 11.2352C1.5329 11.2373 1.53483 11.238 1.53556 11.2358C1.67958 10.8038 1.86018 10.3219 2.08564 9.80704C3.26334 7.11765 5.53286 5.32397 8.32492 4.40943C11.117 3.49491 14.1655 3.81547 16.7101 5.28323L17.3965 5.67913L19.8525 0.486761C12.041 -1.07341 4.05728 3.51588 1.54353 11.2051C1.54233 11.2087 1.53796 11.2216 1.5336 11.2352Z" fill="url(#paint2_linear_11430_22515)"/><path d="M19.6699 25.6538C18.3843 26.3953 16.8003 26.3953 15.5147 25.6538C15.3402 25.5531 15.1757 25.4399 15.0201 25.3174L12.7591 26.8719L10.8103 30.0209C12.9733 31.821 15.7821 32.3997 18.589 32.0779C20.7013 31.8357 22.7995 31.1665 24.7582 30.0368C26.3492 29.1191 27.7 27.9909 28.8182 26.7195L27.6563 23.8962L25.7762 22.1316L19.6699 25.6538Z" fill="url(#paint3_linear_11430_22515)"/><path d="M15.0201 25.3175C14.0296 24.5373 13.4371 23.3406 13.4371 22.0588V21.931V11.2558C13.4371 10.6521 13.615 10.5494 14.1384 10.8513C13.3323 10.3864 11.4703 8.79036 9.17118 10.1165C7.88557 10.858 6.8269 12.4949 6.8269 13.978V21.8362C6.8269 24.775 8.34906 27.8406 10.5445 29.7966C10.6313 29.874 10.7212 29.9469 10.8103 30.0211L15.0201 25.3175Z" fill="url(#paint4_linear_11430_22515)"/><path d="M28.6604 5.49565C28.6589 5.49395 28.6573 5.49532 28.6589 5.49703C28.9613 5.83763 29.2888 6.23485 29.6223 6.68734C31.3648 9.05099 32.0158 12.0447 31.4126 14.9176C30.8093 17.7906 29.0071 20.2679 26.4625 21.7357L25.7761 22.1316L28.8181 26.7195C34.0764 20.741 34.09 11.5388 28.6815 5.51929C28.6789 5.51641 28.67 5.50622 28.6604 5.49565Z" fill="url(#paint5_linear_11430_22515)"/><path d="M7.09355 13.978C7.09354 12.4949 7.88551 11.1244 9.17113 10.3829C9.34564 10.2822 9.52601 10.1965 9.71002 10.1231L9.49304 7.38962L7.96861 4.26221C5.32671 5.23364 3.1897 7.24125 2.06528 9.83067C1.2191 11.7793 0.75001 13.9294 0.75 16.1888C0.75 18.0243 1.05255 19.7571 1.59553 21.3603L4.62391 21.7666L7.09355 21.0223V13.978Z" fill="url(#paint6_linear_11430_22515)"/><path d="M9.71016 10.1231C10.8817 9.65623 12.2153 9.74199 13.3264 10.3829L13.4372 10.4468L22.3326 15.5777C22.9566 15.9376 22.8999 16.2918 22.1946 16.4392L22.7078 16.332C23.383 16.1908 23.9999 15.8457 24.4717 15.3428C25.2828 14.4782 25.5806 13.4351 25.5806 12.5299C25.5806 11.0468 24.7886 9.67634 23.503 8.93479L16.6911 5.00568C14.1436 3.53627 11.0895 3.22294 8.29622 4.14442C8.18572 4.18087 8.07756 4.2222 7.96875 4.26221L9.71016 10.1231Z" fill="url(#paint7_linear_11430_22515)"/><path d="M20.0721 31.8357C20.0744 31.8352 20.0739 31.8332 20.0717 31.8337C19.6252 31.925 19.1172 32.0097 18.5581 32.0721C15.638 32.3978 12.7174 31.4643 10.5286 29.5059C8.33986 27.5474 7.09347 24.7495 7.09348 21.814L7.09347 21.0222L1.59546 21.3602C4.1488 28.8989 12.1189 33.5118 20.0411 31.8421C20.0449 31.8413 20.0582 31.8387 20.0721 31.8357Z" fill="url(#paint8_linear_11430_22515)"/>
                                <defs>
                                <linearGradient id="paint0_linear_11430_22515" x1="20.8102" y1="23.9532" x2="23.9577" y2="12.9901" gradientUnits="userSpaceOnUse"><stop stop-color="#1724C9"/><stop offset="1" stop-color="#1C64F2"/></linearGradient>
                                <linearGradient id="paint1_linear_11430_22515" x1="28.0593" y1="10.5837" x2="19.7797" y2="2.33321" gradientUnits="userSpaceOnUse"><stop stop-color="#1C64F2"/><stop offset="1" stop-color="#0092FF"/></linearGradient>
                                <linearGradient id="paint2_linear_11430_22515" x1="16.9145" y1="5.2045" x2="4.42432" y2="5.99375" gradientUnits="userSpaceOnUse"><stop stop-color="#0092FF"/><stop offset="1" stop-color="#45B2FF"/></linearGradient>
                                <linearGradient id="paint3_linear_11430_22515" x1="16.0698" y1="28.846" x2="27.2866" y2="25.8192" gradientUnits="userSpaceOnUse"><stop stop-color="#1C64F2"/><stop offset="1" stop-color="#0092FF"/></linearGradient>
                                <linearGradient id="paint4_linear_11430_22515" x1="8.01881" y1="15.8661" x2="15.9825" y2="24.1181" gradientUnits="userSpaceOnUse"><stop stop-color="#1724C9"/><stop offset="1" stop-color="#1C64F2"/></linearGradient>
                                <linearGradient id="paint5_linear_11430_22515" x1="26.2004" y1="21.8189" x2="31.7569" y2="10.6178" gradientUnits="userSpaceOnUse"><stop stop-color="#0092FF"/><stop offset="1" stop-color="#45B2FF"/></linearGradient>
                                <linearGradient id="paint6_linear_11430_22515" x1="6.11387" y1="9.31427" x2="3.14054" y2="20.4898" gradientUnits="userSpaceOnUse"><stop stop-color="#1C64F2"/><stop offset="1" stop-color="#0092FF"/></linearGradient>
                                <linearGradient id="paint7_linear_11430_22515" x1="21.2932" y1="8.78271" x2="10.4278" y2="11.488" gradientUnits="userSpaceOnUse"><stop stop-color="#1724C9"/><stop offset="1" stop-color="#1C64F2"/></linearGradient>
                                <linearGradient id="paint8_linear_11430_22515" x1="7.15667" y1="21.5399" x2="14.0824" y2="31.9579" gradientUnits="userSpaceOnUse"><stop stop-color="#0092FF"/><stop offset="1" stop-color="#45B2FF"/></linearGradient>
                                </defs>
                            </svg>
                            Flowbite    
                        </a>
                        <span class="block mb-4 text-sm text-gray-500 dark:text-gray-400 lg:mb-0">© 2021-2022 <a href="#" class="hover:underline">Flowbite™</a>. All Rights Reserved.
                        </span>
                        <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="inline-flex items-center mt-3 text-sm font-medium text-center text-gray-500 sm:mt-0 hover:text-gray-900 dark:hover:text-white dark:text-gray-400" type="button">
                        <svg class="mr-1 w-4 h-4" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.75" y="0.466187" width="20" height="13.3137" rx="2" fill="white"/>
                            <mask id="mask0_3422_20233" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="21" height="14">
                            <rect x="0.75" y="0.466187" width="20" height="13.3137" rx="2" fill="white"/>
                            </mask>
                            <g mask="url(#mask0_3422_20233)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.75 0.466187H0.75V1.35377H20.75V0.466187ZM20.75 2.24134H0.75V3.12892H20.75V2.24134ZM0.75 4.0165H20.75V4.90408H0.75V4.0165ZM20.75 5.79166H0.75V6.67924H20.75V5.79166ZM0.75 7.56682H20.75V8.4544H0.75V7.56682ZM20.75 9.34198H0.75V10.2296H20.75V9.34198ZM0.75 11.1171H20.75V12.0047H0.75V11.1171ZM20.75 12.8923H0.75V13.7799H20.75V12.8923Z" fill="#D02F44"/>
                            <rect x="0.75" y="0.466187" width="8.57143" height="6.21305" fill="#46467F"/>
                            <g filter="url(#filter0_d_3422_20233)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.65477 1.79755C2.65477 2.04265 2.44158 2.24134 2.17858 2.24134C1.91559 2.24134 1.70239 2.04265 1.70239 1.79755C1.70239 1.55245 1.91559 1.35376 2.17858 1.35376C2.44158 1.35376 2.65477 1.55245 2.65477 1.79755ZM4.55954 1.79755C4.55954 2.04265 4.34634 2.24134 4.08334 2.24134C3.82035 2.24134 3.60715 2.04265 3.60715 1.79755C3.60715 1.55245 3.82035 1.35376 4.08334 1.35376C4.34634 1.35376 4.55954 1.55245 4.55954 1.79755ZM5.98811 2.24134C6.2511 2.24134 6.4643 2.04265 6.4643 1.79755C6.4643 1.55245 6.2511 1.35376 5.98811 1.35376C5.72511 1.35376 5.51192 1.55245 5.51192 1.79755C5.51192 2.04265 5.72511 2.24134 5.98811 2.24134ZM8.36906 1.79755C8.36906 2.04265 8.15586 2.24134 7.89287 2.24134C7.62988 2.24134 7.41668 2.04265 7.41668 1.79755C7.41668 1.55245 7.62988 1.35376 7.89287 1.35376C8.15586 1.35376 8.36906 1.55245 8.36906 1.79755ZM3.13096 3.12892C3.39396 3.12892 3.60715 2.93023 3.60715 2.68513C3.60715 2.44003 3.39396 2.24134 3.13096 2.24134C2.86797 2.24134 2.65477 2.44003 2.65477 2.68513C2.65477 2.93023 2.86797 3.12892 3.13096 3.12892ZM5.51192 2.68513C5.51192 2.93023 5.29872 3.12892 5.03573 3.12892C4.77273 3.12892 4.55954 2.93023 4.55954 2.68513C4.55954 2.44003 4.77273 2.24134 5.03573 2.24134C5.29872 2.24134 5.51192 2.44003 5.51192 2.68513ZM6.94049 3.12892C7.20348 3.12892 7.41668 2.93023 7.41668 2.68513C7.41668 2.44003 7.20348 2.24134 6.94049 2.24134C6.6775 2.24134 6.4643 2.44003 6.4643 2.68513C6.4643 2.93023 6.6775 3.12892 6.94049 3.12892ZM8.36906 3.57271C8.36906 3.81781 8.15586 4.0165 7.89287 4.0165C7.62988 4.0165 7.41668 3.81781 7.41668 3.57271C7.41668 3.32761 7.62988 3.12892 7.89287 3.12892C8.15586 3.12892 8.36906 3.32761 8.36906 3.57271ZM5.98811 4.0165C6.2511 4.0165 6.4643 3.81781 6.4643 3.57271C6.4643 3.32761 6.2511 3.12892 5.98811 3.12892C5.72511 3.12892 5.51192 3.32761 5.51192 3.57271C5.51192 3.81781 5.72511 4.0165 5.98811 4.0165ZM4.55954 3.57271C4.55954 3.81781 4.34634 4.0165 4.08334 4.0165C3.82035 4.0165 3.60715 3.81781 3.60715 3.57271C3.60715 3.32761 3.82035 3.12892 4.08334 3.12892C4.34634 3.12892 4.55954 3.32761 4.55954 3.57271ZM2.17858 4.0165C2.44158 4.0165 2.65477 3.81781 2.65477 3.57271C2.65477 3.32761 2.44158 3.12892 2.17858 3.12892C1.91559 3.12892 1.70239 3.32761 1.70239 3.57271C1.70239 3.81781 1.91559 4.0165 2.17858 4.0165ZM3.60715 4.46029C3.60715 4.70538 3.39396 4.90408 3.13096 4.90408C2.86797 4.90408 2.65477 4.70538 2.65477 4.46029C2.65477 4.21519 2.86797 4.0165 3.13096 4.0165C3.39396 4.0165 3.60715 4.21519 3.60715 4.46029ZM5.03573 4.90408C5.29872 4.90408 5.51192 4.70538 5.51192 4.46029C5.51192 4.21519 5.29872 4.0165 5.03573 4.0165C4.77273 4.0165 4.55954 4.21519 4.55954 4.46029C4.55954 4.70538 4.77273 4.90408 5.03573 4.90408ZM7.41668 4.46029C7.41668 4.70538 7.20348 4.90408 6.94049 4.90408C6.6775 4.90408 6.4643 4.70538 6.4643 4.46029C6.4643 4.21519 6.6775 4.0165 6.94049 4.0165C7.20348 4.0165 7.41668 4.21519 7.41668 4.46029ZM7.89287 5.79166C8.15586 5.79166 8.36906 5.59296 8.36906 5.34787C8.36906 5.10277 8.15586 4.90408 7.89287 4.90408C7.62988 4.90408 7.41668 5.10277 7.41668 5.34787C7.41668 5.59296 7.62988 5.79166 7.89287 5.79166ZM6.4643 5.34787C6.4643 5.59296 6.2511 5.79166 5.98811 5.79166C5.72511 5.79166 5.51192 5.59296 5.51192 5.34787C5.51192 5.10277 5.72511 4.90408 5.98811 4.90408C6.2511 4.90408 6.4643 5.10277 6.4643 5.34787ZM4.08334 5.79166C4.34634 5.79166 4.55954 5.59296 4.55954 5.34787C4.55954 5.10277 4.34634 4.90408 4.08334 4.90408C3.82035 4.90408 3.60715 5.10277 3.60715 5.34787C3.60715 5.59296 3.82035 5.79166 4.08334 5.79166ZM2.65477 5.34787C2.65477 5.59296 2.44158 5.79166 2.17858 5.79166C1.91559 5.79166 1.70239 5.59296 1.70239 5.34787C1.70239 5.10277 1.91559 4.90408 2.17858 4.90408C2.44158 4.90408 2.65477 5.10277 2.65477 5.34787Z" fill="url(#paint0_linear_3422_20233)"/>
                            </g>
                            </g>
                            <defs>
                            <filter id="filter0_d_3422_20233" x="1.70239" y="1.35376" width="6.66675" height="5.43787" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="1"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_3422_20233"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_3422_20233" result="shape"/>
                            </filter>
                            <linearGradient id="paint0_linear_3422_20233" x1="1.70239" y1="1.35376" x2="1.70239" y2="5.79166" gradientUnits="userSpaceOnUse">
                            <stop stop-color="white"/>
                            <stop offset="1" stop-color="#F0F0F0"/>
                            </linearGradient>
                            </defs>
                        </svg>                    
                            English (US) 
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                        <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(911px, 681.5px, 0px);">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">English</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">German</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Italian</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Spanish</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
              </footer>
        </div>


        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <script src="{{asset('js/script.js')}}"></script>
    </body>
</html>
