<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - Kantor Kelurahan</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="bg-slate-50 font-sans antialiased text-slate-800">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen flex">
      <!-- Backdrop for mobile sidebar -->
      <div x-show="sidebarOpen" 
           x-transition:opacity 
           @click="sidebarOpen = false" 
           class="fixed inset-0 z-30 bg-slate-900/40 lg:hidden"
           style="display: none;"></div>

      <!-- Sidebar -->
      @include('layouts.partials.side')

      <!-- Main Layout -->
      <div class="flex-1 flex flex-col min-w-0 min-h-screen">
        <!-- Top Navbar -->
        @include('layouts.partials.nav')

        <!-- Main Content -->
        <main class="flex-1 p-6 md:p-8 max-w-7xl w-full mx-auto">
          <!-- Page Header / Breadcrumb -->
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
              <h1 class="text-3xl font-bold text-slate-900">@yield('title', 'Layanan Kelurahan')</h1>
              <p class="text-sm text-slate-500 mt-1">Sistem Administrasi Digital Kantor Kelurahan</p>
            </div>
            
            <nav class="flex text-sm text-slate-500" aria-label="Breadcrumb">
              <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                  <a href="{{ url('/') }}" class="inline-flex items-center hover:text-blue-600 transition-colors">
                    <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Home
                  </a>
                </li>
                <li>
                  <div class="flex items-center">
                    <svg class="w-3 h-3 text-slate-400 mx-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-slate-400 font-medium">@yield('title', 'Dashboard')</span>
                  </div>
                </li>
              </ol>
            </nav>
          </div>

          <!-- Alert Flash Session -->
          @if(session('sukses'))
            <div x-data="{ show: true }" x-show="show" x-transition class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex justify-between items-center">
              <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium">{{ session('sukses') }}</span>
              </div>
              <button @click="show = false" class="text-emerald-500 hover:text-emerald-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
              </button>
            </div>
          @endif

          <!-- Yield Content -->
          @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-slate-200 py-4 px-6 md:px-8 text-center text-xs text-slate-500 flex flex-col sm:flex-row justify-between items-center gap-2">
          <div>
            &copy; 2026 <span class="font-medium text-slate-700">Kantor Kelurahan</span>. Hak Cipta Dilindungi.
          </div>
          <div class="flex gap-4">
            <a href="#" class="hover:text-blue-600 transition-colors">Kebijakan Privasi</a>
            <a href="#" class="hover:text-blue-600 transition-colors">Bantuan</a>
          </div>
        </footer>
      </div>
    </div>
  </body>
</html>
