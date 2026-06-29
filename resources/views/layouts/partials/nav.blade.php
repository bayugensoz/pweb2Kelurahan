<header class="sticky top-0 z-20 bg-white border-b border-slate-200 h-16 flex items-center justify-between px-6 shrink-0">
  <div class="flex items-center gap-4">
    <!-- Hamburger button for mobile -->
    <button @click="sidebarOpen = !sidebarOpen" 
            class="p-2 -ml-2 rounded-xl text-slate-500 hover:bg-slate-100 hover:text-slate-900 transition-colors lg:hidden"
            aria-label="Toggle Sidebar">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
    
    <!-- Title Page Indicator -->
    <span class="hidden md:inline text-sm font-semibold text-slate-700 uppercase tracking-wider">
      @yield('title', 'Layanan Kelurahan')
    </span>
  </div>

  <div class="flex items-center gap-4">
    <!-- Search bar -->
    <div class="relative w-48 sm:w-64 hidden sm:block">
      <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
      </span>
      <input type="text" 
             placeholder="Cari layanan warga..." 
             class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 focus:bg-white transition-all placeholder-slate-400 text-slate-800" />
    </div>

    <!-- Notification trigger -->
    <button class="relative p-2 text-slate-500 hover:bg-slate-50 hover:text-slate-700 rounded-xl transition-all">
      <span class="absolute top-2 right-2 w-2 h-2 bg-rose-500 rounded-full"></span>
      <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
      </svg>
    </button>

    <!-- Profile dropdown -->
    @auth
    <div x-data="{ open: false }" @click.away="open = false" class="relative">
      <button @click="open = !open" class="flex items-center gap-2 p-1.5 hover:bg-slate-50 rounded-xl transition-all">
        <div class="w-8 h-8 rounded-full bg-slate-200 text-slate-700 font-bold flex items-center justify-center text-sm uppercase">
          {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
        </div>
        <span class="hidden md:inline text-xs font-semibold text-slate-700 select-none">{{ Auth::user()->name }}</span>
        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>

      <!-- Dropdown menu -->
      <div x-show="open" 
           x-transition:enter="transition ease-out duration-100"
           x-transition:enter-start="transform opacity-0 scale-95"
           x-transition:enter-end="transform opacity-100 scale-100"
           x-transition:leave="transition ease-in duration-75"
           x-transition:leave-start="transform opacity-100 scale-100"
           x-transition:leave-end="transform opacity-0 scale-95"
           class="absolute right-0 mt-2 w-48 bg-white border border-slate-200 rounded-xl shadow-lg py-1 z-30"
           style="display: none;">
        <div class="px-4 py-2 border-b border-slate-100">
          <p class="text-xs font-semibold text-slate-900 truncate">{{ Auth::user()->name }}</p>
          <p class="text-[10px] text-slate-400 truncate">{{ Auth::user()->email }}</p>
        </div>
        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-slate-50 transition-colors">Profil Saya</a>
        <a href="#" class="block px-4 py-2 text-xs text-slate-700 hover:bg-slate-50 transition-colors">Bantuan</a>
        <div class="border-t border-slate-100 my-1"></div>
        <form action="{{ route('logout') }}" method="POST" class="block w-full">
          @csrf
          <button type="submit" class="w-full text-left px-4 py-2 text-xs text-rose-600 hover:bg-rose-50 font-semibold transition-colors">
            Keluar Aplikasi
          </button>
        </form>
      </div>
    </div>
    @else
    <div class="flex items-center gap-2">
      <a href="{{ route('login') }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900 transition-colors">Masuk</a>
      <a href="{{ route('register') }}" class="text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 px-3.5 py-1.5 rounded-xl transition-all">Daftar</a>
    </div>
    @endauth
  </div>
</header>