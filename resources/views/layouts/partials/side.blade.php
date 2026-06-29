<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
       class="fixed inset-y-0 left-0 z-40 w-64 bg-slate-900 text-slate-100 flex flex-col transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-auto shrink-0 border-r border-slate-800">
  <!-- Brand logo & header -->
  <div class="h-16 flex items-center px-6 border-b border-slate-800 gap-3">
    <!-- Emblem-like SVG -->
    <svg class="w-8 h-8 text-blue-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253"></path>
    </svg>
    <div class="flex flex-col">
      <span class="font-bold text-sm tracking-wide text-white uppercase">Kantor Kelurahan</span>
      <span class="text-[10px] text-slate-500 uppercase tracking-widest">Digital Service</span>
    </div>
  </div>

  <!-- Navigation menu -->
  <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
    <!-- Dashboard -->
    <a href="{{ url('/kelurahan') }}" 
       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->is('kelurahan*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
      <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
      </svg>
      <span>Dashboard</span>
    </a>

    <!-- Penduduk -->
    <a href="{{ url('/penduduk') }}" 
       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->is('penduduk*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
      <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
      </svg>
      <span>Penduduk</span>
    </a>

    <!-- Surat -->
    <a href="{{ route('surat.index') }}" 
       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->is('surat*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
      <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
      </svg>
      <span>Surat</span>
    </a>

    <!-- Pengaturan (future) -->
    <div class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-600 cursor-not-allowed">
      <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
      </svg>
      <span class="flex-1">Pengaturan</span>
      <span class="text-[9px] bg-slate-800 text-slate-500 py-0.5 px-2 rounded-full font-semibold uppercase">Nanti</span>
    </div>
  </nav>

  <!-- User Profil Indicator bottom -->
  @auth
  <div class="p-4 border-t border-slate-800 flex items-center gap-3">
    <div class="w-9 h-9 rounded-full bg-blue-600 text-white font-bold flex items-center justify-center text-sm uppercase shrink-0">
      {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
    </div>
    <div class="flex-1 min-w-0">
      <p class="text-xs font-semibold text-white truncate">{{ Auth::user()->name }}</p>
      <p class="text-[10px] text-slate-500 truncate">{{ Auth::user()->email }}</p>
    </div>
  </div>
  @endauth
</aside>