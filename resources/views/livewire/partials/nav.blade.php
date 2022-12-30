<nav class="bg-gray-100">
    <div class="px-5 mx-auto">
        <div class="flex justify-between">
            <div class="flex space-x-4">
                {{--                Logo--}}
                <a href="{{route('lijst', auth()->user()->name)}}"
                   class="flex items-center py-5 px-3 text-gray-700 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6 text-red-400 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                    </svg>
                    <span class="font-bold">Sinterklaas</span>
                </a>
                {{--                Primary nav--}}
                <div class="hidden md:flex items-center space-x-1">
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown"
                            class="flex items-center py-5 px-3 text-gray-700 hover:text-gray-900" type="button">
                        <span>Lijstjes</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-3 h-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                        </svg>

                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown"
                         class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                            @foreach($users as $user)
                                <li>
                                    <a href="{{route('lijst', $user->id)}}"
                                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$user->name}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <a href="{{route('regels')}}" class="py-5 px-3 text-gray-700 hover:text-gray-900">Regels</a>
                    <a href="{{route('foppers')}}" class="py-5 px-3 text-gray-700 hover:text-gray-900">Mijn foppers</a>
                    <a href="{{route('reserveringen')}}" class="py-5 px-3 text-gray-700 hover:text-gray-900">Mijn
                        reserveringen</a>
                    @if(in_array(auth()->id(), [1, 7]))
                        <a href="{{route('admin.index')}}" class="py-5 px-3 text-gray-700 hover:text-gray-900">Admin</a>
                    @endif
                </div>
            </div>
            {{--            Secondary nav--}}
            <div class="hidden md:flex items-center space-x-1">
                <span class="mr-3 text-sm text-gray-400">Ingelogd als {{auth()->user()->name}}</span>
                @livewire('components.logout-button')
            </div>

            {{--            Mobile menu button--}}
            <div class="mobile-menu-button md:hidden flex items-center">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    {{--    Mobile menu--}}
    <div class="mobile-menu hidden md:hidden">
        <button id="dropdownDefault" data-dropdown-toggle="dropdownMobile"
                class="flex items-center py-5 px-3 text-gray-700 hover:text-gray-900" type="button">
            <span>Lijstjes</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-3 h-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
            </svg>

        </button>
        <!-- Dropdown menu -->
        <div id="dropdownMobile"
             class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200 w-full" aria-labelledby="dropdownDefault">
                @foreach($users as $user)
                    <li>
                        <a href="{{route('lijst', $user->id)}}"
                           class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white block">{{$user->name}}</a>
                    </li>
                @endforeach

            </ul>
        </div>
        <a href="{{route('regels')}}" class="py-5 px-3 text-gray-700 hover:text-gray-900 block">Regels</a>
        <a href="{{route('foppers')}}" class="py-5 px-3 text-gray-700 hover:text-gray-900 block">Mijn foppers</a>
        <a href="{{route('reserveringen')}}" class="py-5 px-3 text-gray-700 hover:text-gray-900 block">Mijn
            reserveringen</a>

        <span class="block py-2 px-3 text-sm text-gray-400">Ingelogd als {{auth()->user()->name}}</span>
        <div class="block py-2 px-3 text-sm text-gray-400">
           @livewire('components.logout-button')
        </div>
    </div>
</nav>
