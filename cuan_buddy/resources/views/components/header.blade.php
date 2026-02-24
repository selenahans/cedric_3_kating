@vite(['resources/css/components/header.css'])

<header class="main-header">

    <div class="header-left">
        {{-- Tombol Hamburger (Mobile Only) --}}
        <button class="mobile-menu-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>

        {{-- Logo Text (Mobile Only) --}}
        <span class="mobile-logo-text">Cuan Buddy</span>

        {{-- Judul Halaman (Desktop Only) --}}
        <h1 class="page-title">
            @yield('header_title', 'Dashboard')
        </h1>
    </div>

    <div class="header-center">
        <div class="search-wrapper">
            <span class="search-icon-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </span>
            {{-- Search Bar --}}
            <input type="text" name="search_query" id="global-search" readonly
                onfocus="this.removeAttribute('readonly');" class="search-input"
                placeholder="Cari transaksi, kategori, atau laporan...">
        </div>
    </div>

    <div class="header-right">

        {{-- Theme Toggle --}}
        <button class="action-btn theme-toggle" title="Ganti Tema">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="5"></circle>
                <line x1="12" y1="1" x2="12" y2="3"></line>
                <line x1="12" y1="21" x2="12" y2="23"></line>
                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                <line x1="1" y1="12" x2="3" y2="12"></line>
                <line x1="21" y1="12" x2="23" y2="12"></line>
                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
            </svg>
        </button>

        {{-- Notifikasi --}}
        <button class="action-btn notification-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="bell-icon">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>
            <span class="notification-badge-wrapper">
                <span class="ping-animation"></span>
                <span class="badge-dot"></span>
            </span>
        </button>

        {{-- Separator --}}
        <div class="separator"></div>

        {{-- Profile Dropdown --}}
        <div class="profile-dropdown-wrapper">
            <button class="profile-trigger">
                <div class="avatar-container">
                    @if(Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="w-full h-full object-cover">
                    @else
                        <img
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=308156&color=fff">
                    @endif
                </div>
                <div class="user-info">
                    <p class="user-name">{{ Auth::user()->name }}</p>
                    <p class="user-role">Member</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="chevron-icon">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>

            {{-- Dropdown Menu --}}
            <div class="dropdown-menu">
                <div class="dropdown-header">
                    <p class="signed-in-label">Signed in as</p>
                    <p class="signed-in-email">{{ Auth::user()->email }}</p>
                </div>
                <div class="dropdown-links">
                    <a href="pengaturan/index" class="dropdown-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Profile Saya
                    </a>
                </div>
                <div class="dropdown-footer">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit"
                            class="dropdown-item flex items-center font-bold !text-red-600 hover:!text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            Keluar
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</header>