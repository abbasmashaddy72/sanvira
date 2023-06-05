<div class="pin-t pin-x fixed z-40">
    <div class="bg-gradient-primary h-1 text-white"></div>

    <nav class="bg-navbar shadow-xs flex h-16 items-center justify-between text-black">
        <div class="flex-no-shrink flex items-center">
            <a href="{{ url('/') }}" class="flex-no-shrink mx-4 flex items-center text-black">
                @include('larecipe::partials.logo')

                <p class="text-grey-dark mx-1 inline-block font-semibold">
                    {{ config('app.name') }}
                </p>
            </a>

            <div class="switch">
                <input type="checkbox" name="1" id="1" v-model="sidebar" class="switch-checkbox" />
                <label class="switch-label" for="1"></label>
            </div>
        </div>

        <div class="mx-4 block flex items-center">
            @if (config('larecipe.search.enabled'))
                <larecipe-button id="search-button" :type="searchBox ? 'primary' : 'link'"
                    @click="searchBox = ! searchBox" class="px-4">
                    <i class="fas fa-search" id="search-button-icon"></i>
                </larecipe-button>
            @endif

            <larecipe-button tag="a" href="https://github.com/saleem-hadad/larecipe" target="__blank"
                type="black" class="mx-2 px-4">
                <i class="fab fa-github"></i>
            </larecipe-button>

            {{-- versions dropdown --}}
            <larecipe-dropdown>
                <larecipe-button type="primary" class="flex">
                    {{ $currentVersion }} <i class="fa fa-angle-down mx-1"></i>
                </larecipe-button>

                <template slot="list">
                    <ul class="list-reset">
                        @foreach ($versions as $version)
                            <li class="hover:bg-grey-lightest py-2">
                                <a class="text-grey-darkest px-6"
                                    href="{{ route('larecipe.show', ['version' => $version, 'page' => $currentSection]) }}">{{ $version }}</a>
                            </li>
                        @endforeach
                    </ul>
                </template>
            </larecipe-dropdown>
            {{-- /versions dropdown --}}

            @auth
                {{-- account --}}
                <larecipe-dropdown>
                    <larecipe-button type="white" class="ml-2">
                        {{ auth()->user()->name ?? 'Account' }} <i class="fa fa-angle-down"></i>
                    </larecipe-button>

                    <template slot="list">
                        <form action="/logout" method="POST">
                            {{ csrf_field() }}

                            <button type="submit" class="bg-danger inline-flex px-4 py-2 text-white"><i
                                    class="fa fa-power-off mr-2"></i> Logout</button>
                        </form>
                    </template>
                </larecipe-dropdown>
                {{-- /account --}}
            @endauth
        </div>
    </nav>
</div>
