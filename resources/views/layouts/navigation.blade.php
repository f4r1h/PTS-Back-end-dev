<nav x-data="{ open: false }" class="bg-[#161920] border-b border-dark">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 no-underline">
                        <div class="w-10 h-10 bg-gradient-to-br from-[#F5A623] to-[#C7831A] rounded-xl flex items-center justify-center font-condensed font-extrabold text-xl text-[#0D0F14] shadow-[0_4px_15px_rgba(245,166,35,0.3)]">
                            HI
                        </div>
                        <div class="font-condensed font-bold text-xl text-white hidden sm:block tracking-wide">
                            Halal <span class="text-[#F5A623]">Industries</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-300 hover:text-[#F5A623] focus:text-[#F5A623]">
                        {{ __('Dasbor') }}
                    </x-nav-link>

                    @if(Auth::user()->role === 'admin')
                        <x-nav-link :href="route('Alat_berat.index')" :active="request()->routeIs('Alat_berat.*')" class="text-gray-300 hover:text-[#F5A623] focus:text-[#F5A623]">
                            {{ __('Alat Berat') }}
                        </x-nav-link>
                        <x-nav-link :href="route('Pelanggan.index')" :active="request()->routeIs('Pelanggan.*')" class="text-gray-300 hover:text-[#F5A623] focus:text-[#F5A623]">
                            {{ __('Pelanggan') }}
                        </x-nav-link>
                        <x-nav-link :href="route('Transaksi.index')" :active="request()->routeIs('Transaksi.*')" class="text-gray-300 hover:text-[#F5A623] focus:text-[#F5A623]">
                            {{ __('Transaksi') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.penyewaan.index')" :active="request()->routeIs('admin.penyewaan.*')" class="text-gray-300 hover:text-[#F5A623] focus:text-[#F5A623]">
                            {{ __('Penyewaan') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('user.penyewaan')" :active="request()->routeIs('user.penyewaan*')" class="text-gray-300 hover:text-[#F5A623] focus:text-[#F5A623]">
                            {{ __('Penyewaan Saya') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="mr-4 text-sm font-medium text-gray-400 bg-[#1E222E] px-3 py-1.5 rounded-full border border-gray-700">
                    <span class="w-2 h-2 rounded-full inline-block mr-1 {{ Auth::user()->role === 'admin' ? 'bg-red-500' : 'bg-green-500' }}"></span>
                    {{ ucfirst(Auth::user()->role) }}
                </div>
                
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 bg-[#1E222E] hover:text-white focus:outline-none transition ease-in-out duration-150 border-gray-700">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-[#1E222E]">
                            {{ __('Profil Saya') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    class="text-red-500 hover:bg-[#1E222E]"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Keluar Akun') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-[#1E222E] focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#161920]">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-300">
                {{ __('Dasbor') }}
            </x-responsive-nav-link>
            
            @if(Auth::user()->role === 'admin')
                <x-responsive-nav-link :href="route('Alat_berat.index')" :active="request()->routeIs('Alat_berat.*')" class="text-gray-300">
                    {{ __('Alat Berat') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('Pelanggan.index')" :active="request()->routeIs('Pelanggan.*')" class="text-gray-300">
                    {{ __('Pelanggan') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('Transaksi.index')" :active="request()->routeIs('Transaksi.*')" class="text-gray-300">
                    {{ __('Transaksi') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.penyewaan.index')" :active="request()->routeIs('admin.penyewaan.*')" class="text-gray-300">
                    {{ __('Penyewaan') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('user.penyewaan')" :active="request()->routeIs('user.penyewaan*')" class="text-gray-300">
                    {{ __('Penyewaan Saya') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-[#F5A623]">{{ Auth::user()->email }} ({{ ucfirst(Auth::user()->role) }})</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-300">
                    {{ __('Profil Saya') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            class="text-red-500"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Keluar Akun') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
