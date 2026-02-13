<div 
    x-show="sidebarOpen" 
    @click="sidebarOpen = false" 
    x-transition:enter="transition-opacity ease-linear duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden"
    x-cloak>
</div>

<aside 
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition-duration-300 transform bg-white border-r border-gray-200 lg:translate-x-0 lg:static lg:inset-0 flex flex-col justify-between"
    x-cloak>

    <div>
        <div class="flex items-center justify-center h-20 border-b border-gray-100">
            <h1 class="text-2xl font-extrabold text-emerald-600 tracking-wide flex items-center gap-2">
                <img src="{{ url('images/logo_cuan_buddy.webp') }}" alt="LOGO PIMUS"
                                class="responsive-logo content-logo" style="display:block;">
                Cuan Buddy
            </h1>
        </div>

        <nav class="p-4 space-y-2 mt-2">
            
            {{-- Helper untuk class active/inactive biar kodenya bersih --}}
            @php
                $activeClass = 'bg-emerald-100 text-emerald-700 shadow-sm';
                $inactiveClass = 'text-gray-500 hover:bg-emerald-50 hover:text-emerald-600';
                $baseClass = 'flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group font-medium';
            @endphp

            <a href="{{ route('dashboard') }}" class="{{ $baseClass }} {{ request()->routeIs('dashboard') ? $activeClass : $inactiveClass }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span>Dashboard</span>
            </a>

            <a href="#" class="{{ $baseClass }} {{ $inactiveClass }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span>Transactions</span>
            </a>

            <a href="#" class="{{ $baseClass }} {{ $inactiveClass }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                <span>Goals</span>
            </a>

            <a href="#" class="{{ $baseClass }} {{ $inactiveClass }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Pet</span>
            </a>

            <a href="#" class="{{ $baseClass }} {{ $inactiveClass }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                <span>Achievements</span>
            </a>

            <a href="#" class="{{ $baseClass }} {{ $inactiveClass }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                <span>Reports</span>
            </a>

        </nav>
    </div>

    <div class="p-4 mt-auto">
        <hr class="border-gray-200 mb-4">

        <nav class="space-y-1">
            <a href="#" class="{{ $baseClass }} {{ $inactiveClass }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span>Profile</span>
            </a>

            <a href="#" class="{{ $baseClass }} {{ $inactiveClass }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span>Settings</span>
            </a>

            <form method="POST" action="#"> @csrf
                <button type="button" class="w-full {{ $baseClass }} text-red-500 hover:bg-red-50 hover:text-red-600 mt-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span>Logout</span>
                </button>
            </form>
        </nav>

        <div class="mt-6 flex items-center gap-3 bg-emerald-50 p-3 rounded-xl">
            <div class="w-10 h-10 rounded-full bg-emerald-200 flex items-center justify-center text-emerald-700 font-bold">
                CB
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-700">User Cuan</p>
                <p class="text-xs text-gray-500">Free Plan</p>
            </div>
        </div>
    </div>
</aside>