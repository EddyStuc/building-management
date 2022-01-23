<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="md:max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="flex h-12 md:14 lg:h-16">
            <div class="flex w-full">
                <!-- Navigation Links -->
                <div class=" md:space-x-8 -my-px md:ml-10 w-full flex justify-between md:justify-start">
                    <x-nav-link :href="route('noticeboard')" :active="request()->routeIs('noticeboard*')">
                        {{ __('Noticeboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('reports')" :active="request()->routeIs('reports*')">
                        {{ __('Building Reports') }}
                    </x-nav-link>

                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                        {{ __('Contact Management') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="flex items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div class="hidden sm:inline-flex">{{ Auth::user()->name }}</div>

                            <div class="ml-1 hidden md:inline-flex">
                                <x-icon name="down-arrow"/>
                            </div>
                            <div class="ml-1 md:hidden">
                                <x-icon name="hamburger"/>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        @admin
                            <x-dropdown-link :href="route('admin.noticeboard')" :active="request()->routeIs('admin.noticeboard*')">Admin: Noticeboard</x-dropdown-link>
                            <x-dropdown-link :href="route('admin.reports')" :active="request()->routeIs('admin.reports*')">Admin: Reports</x-dropdown-link>
                            <x-dropdown-link :href="route('admin.contactMessages')" :active="request()->routeIs('admin.contactMessages*')">Admin: Contact Messages</x-dropdown-link>
                        @endadmin
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
