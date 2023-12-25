<div class="top-bar float-right sm:float-none">
    {{ $breadcrumb }}

    <div class="mr-4" x-data="themeToggle()">
        <button id="theme-toggle" type="button"
            class="rounded-lg p-2.5 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
            x-on:click="toggleTheme()">
            <svg id="theme-toggle-dark-icon" x-bind:class="{ hidden: darkTheme }" class="h-5 w-5" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
            <svg id="theme-toggle-light-icon" x-bind:class="{ hidden: lightTheme }" class="h-5 w-5" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                    fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>

    <div class="mr-4">
        <a href="{{ route('homepage') }}" target="__blank">
            <svg class="h-5 w-5 text-gray-500 hover:bg-gray-100" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link">
                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                <polyline points="15 3 21 3 21 9"></polyline>
                <line x1="10" y1="14" x2="21" y2="3"></line>
            </svg>
        </a>
    </div>

    <div class="dropdown h-10 w-10">
        <div class="bg-primary dropdown-toggle relative flex h-10 w-10 items-center justify-center rounded-full text-xl uppercase text-white shadow-lg"
            role="button" aria-expanded="false" data-tw-toggle="dropdown">
            {{ Auth::user()->initials }}</div>
        <div class="dropdown-menu w-56">
            <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                    <div class="font-medium">{{ Auth::user()->name }}</div>
                    <div class="mt-0.5 text-xs text-white/70 dark:text-slate-500">
                        {{ Auth::user()->roles->first()->name ?? '' }}</div>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <a href="{{ route('admin.profile.update') }}" class="dropdown-item hover:bg-white/5">
                        <i data-feather="user" class="mr-2 h-4 w-4"></i>{{ __('Profile') }}</a>
                </li>
                <li>
                    <a href="" class="dropdown-item hover:bg-white/5">
                        <i data-feather="help-circle" class="mr-2 h-4 w-4"></i>
                        {{ __('Help') }}
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                @impersonating($guard = null)
                    <li>
                        <a href="{{ route('admin.users.leave-impersonate') }}" class="dropdown-item hover:bg-white/5">
                            <i data-feather="toggle-left" class="mr-2 h-4 w-4"></i>
                            {{ __('Leave impersonation') }}
                        </a>
                    @else
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="dropdown-item hover:bg-white/5">
                                <i data-feather="toggle-right" class="mr-2 h-4 w-4"></i>
                                {{ __('Logout') }}
                            </a>
                        </form>
                    </li>
                @endImpersonating
            </ul>
        </div>
    </div>
</div>
