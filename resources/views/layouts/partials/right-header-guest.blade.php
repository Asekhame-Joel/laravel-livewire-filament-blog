   @guest

        <div class="flex space-x-5">
            <div class="top-menu ml-10">
            <div class="flex space-x-4">
             <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>
            </div>
        </div>
              <div class="flex space-x-5">
            <div class="top-menu ml-5">
            <div class="flex space-x-4">
             <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-nav-link>
            </div>
        </div>
        </div>
        </div>

        @endguest
