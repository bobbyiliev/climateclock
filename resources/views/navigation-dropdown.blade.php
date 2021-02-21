<nav x-data="{ open: false }" class="fixed top-0 left-0 z-10 flex flex-col items-start justify-between w-64 h-screen bg-white">

    <div class="relative flex flex-col">
        <a class="flex justify-start w-full pt-5 pl-5" href="/">
            <img src="https://climateclock.bobby.sh/images/logo.png">
        </a>

        <div class="flex flex-col items-start w-full pl-5 mt-10 space-y-2">

                <a href="{{ route('dashboard') }}" class="@if(request()->routeIs('dashboard')){{ 'text-gray-800' }}@else{{ 'text-gray-400' }}@endif flex items-center pl-1 text-base font-semibold">
                    🏠 <span class="pl-2 text-sm">Home</span>
                </a>

                <a href="{{ route('tasks') }}" class="@if(request()->routeIs('tasks')){{ 'text-gray-800' }}@else{{ 'text-gray-400' }}@endif flex items-center pl-1 text-base font-semibold">
                    ✅ <span class="pl-2 text-sm">Tasks</span>
                </a>

                <a href="{{ route('badges') }}" class="@if(request()->routeIs('badges')){{ 'text-gray-800' }}@else{{ 'text-gray-400' }}@endif flex items-center pl-1 text-base font-semibold">
                    🥇 <span class="pl-2 text-sm">Badges</span>
                </a>

                <a href="{{ route('shifts') }}" class="@if(request()->routeIs('shifts')){{ 'text-gray-800' }}@else{{ 'text-gray-400' }}@endif flex items-center pl-1 text-base font-semibold">
                    ✔ <span class="pl-2 text-sm">Status</span>
                </a>

                <a href="{{ route('clock') }}" class="@if(request()->routeIs('clock')){{ 'text-gray-800' }}@else{{ 'text-gray-400' }}@endif flex items-center pl-1 text-base font-semibold">
                    ⏰ <span class="pl-2 text-sm">Climate Clock</span>
                </a>

                @if(auth()->user()->hasTeamRole(auth()->user()->currentTeam, 'manager'))
                    <a href="{{ route('news') }}" class="@if(request()->routeIs('news')){{ 'text-gray-800' }}@else{{ 'text-gray-400' }}@endif flex items-center pl-1 text-base font-semibold">
                        📰 <span class="pl-2 text-sm">News</span>
                    </a>
                @endif

        </div>
    </div>


    <!-- Bottom Items -->
    <div class="relative w-full">

        <!-- Shift Start/Stop -->
        <div class="relative w-full p-5">
            @livewire('shifts')
        </div>

        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <button @click="open=!open" class="flex items-center justify-between w-full px-5 py-3 text-sm text-gray-400 transition duration-150 ease-in-out border-t border-gray-100 hover:text-gray-600 focus:outline-none hover:bg-gray-50">
                <div class="relative flex items-center font-semibold">
                    <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    <div class="flex flex-col">
                        <span class="font-semibold leading-none">{{ Auth::user()->name }}</span>
                        <span class="text-xs leading-none">
                            @if(auth()->user()->isOnShift())
                                online
                            @else
                                not online
                            @endif
                        </span>
                    </div>
                </div>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        @else
            <button class="flex items-center w-full px-5 py-3 text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                <div>{{ Auth::user()->name }}</div>

                <div class="ml-1">
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        @endif

        <div x-show="open" class="fixed bottom-0 left-0 w-64 h-auto pl-1 ml-64 overflow-hidden origin-bottom-left"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                style="display: none;"
                @click="open = false">

                <div class="py-1 bg-white rounded-md shadow-xs">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>

                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-jet-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-jet-dropdown-link>
                    @endif

                    <div class="border-t border-gray-100"></div>

                    <!-- Community Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Community') }}
                        </div>

                        <!-- Community Settings -->
                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                            {{ __('Community Settings') }}
                        </x-jet-dropdown-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                {{ __('Create New Community') }}
                            </x-jet-dropdown-link>
                        @endcan

                        <div class="border-t border-gray-100"></div>

                        <!-- Community Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Community') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" />
                        @endforeach

                        <div class="border-t border-gray-100"></div>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-dropdown-link>
                    </form>
            </div>

        </div>

    </div>
    <!-- End Bottom Items -->

</nav>
