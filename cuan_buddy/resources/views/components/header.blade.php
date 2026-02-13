<header class="bg-white border-b border-gray-100 py-4 px-6 flex justify-between items-center sticky top-0 z-40">
    
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = true" class="lg:hidden text-gray-500 hover:text-emerald-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>

        <h2 class="text-xl font-bold text-gray-800">
            {{ $title ?? 'Dashboard' }}
        </h2>
    </div>

    <div class="flex items-center gap-3 sm:gap-6">

        <button 
            x-data="{ darkMode: false }" 
            @click="darkMode = !darkMode; document.documentElement.classList.toggle('dark')" 
            class="text-gray-400 hover:text-emerald-500 transition-colors p-2 rounded-full hover:bg-gray-50"
            title="Toggle Dark Mode">
            <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
        </button>

        <button class="relative text-gray-400 hover:text-emerald-500 transition-colors p-2 rounded-full hover:bg-gray-50">
            <span class="absolute top-2 right-2.5 h-2 w-2 rounded-full bg-red-500 border border-white"></span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
        </button>

        <div class="h-6 w-px bg-gray-200 mx-1"></div>

        <div class="flex items-center gap-3">
            <div class="hidden md:block text-right">
                <div class="text-sm font-bold text-gray-700">Adaline Lively</div>
                <div class="text-xs text-gray-400">Free Plan</div>
            </div>
            
            <img 
                class="h-9 w-9 rounded-full object-cover border border-gray-200" 
                src="https://ui-avatars.com/api/?name=Adaline+Lively&background=10b981&color=fff" 
                alt="Profile"
            >
        </div>

        <form method="POST" action="#" class="ml-1"> @csrf
            <button type="submit" class="text-gray-400 hover:text-red-500 p-2 rounded-lg hover:bg-red-50 transition-colors" title="Logout">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </button>
        </form>

    </div>
</header>