<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layanan Digital Kantor Kelurahan</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-50 font-sans antialiased text-slate-800 flex flex-col justify-between">
    <!-- Navbar -->
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold">
                    K
                </div>
                <div class="flex flex-col">
                    <span class="font-bold text-sm tracking-wide uppercase text-slate-900">Kantor Kelurahan</span>
                    <span class="text-[10px] text-slate-500 uppercase tracking-wider font-semibold">Portal Pelayanan Publik</span>
                </div>
            </div>

            <!-- Navigation Links & Auth Buttons -->
            <div class="flex items-center gap-6">
                <nav class="hidden md:flex items-center gap-6 text-sm font-semibold text-slate-600">
                    <a href="#fitur" class="hover:text-blue-600 transition-colors">Fitur</a>
                    <a href="#statistik" class="hover:text-blue-600 transition-colors">Statistik</a>
                    <a href="#layanan" class="hover:text-blue-600 transition-colors">Panduan Layanan</a>
                </nav>

                @if (Route::has('login'))
                    <div class="flex items-center gap-3">
                        @auth
                            <a href="{{ url('/kelurahan') }}" class="text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-xl transition-all shadow-sm">
                                Dashboard Saya
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900 transition-colors">
                                Masuk
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-xl transition-all shadow-sm">
                                    Daftar Warga
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1">
        <!-- Hero Section -->
        <section class="relative bg-slate-900 text-white overflow-hidden py-20 lg:py-32">
            <!-- Grid overlay background -->
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="hero-grid" width="60" height="60" patternUnits="userSpaceOnUse">
                            <path d="M 60 0 L 0 0 0 60" fill="none" stroke="white" stroke-width="1"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#hero-grid)" />
                </svg>
            </div>

            <!-- Soft background gradient glows -->
            <div class="absolute top-1/2 left-1/4 -translate-y-1/2 w-[500px] h-[500px] bg-blue-600/20 rounded-full blur-[120px] pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 grid lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 space-y-6">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-500/10 text-blue-400 border border-blue-500/25">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-400 animate-pulse"></span>
                        Pelayanan Online 24/7 Terbuka
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">
                        Layanan Mandiri & <br><span class="text-blue-500">Administrasi Cepat</span> Warga.
                    </h1>
                    <p class="text-slate-300 text-base sm:text-lg max-w-xl leading-relaxed">
                        Ajukan surat keterangan usaha, surat keterangan tidak mampu, dan surat pengantar lainnya secara mandiri dari mana saja tanpa perlu mengantre di kantor kelurahan.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-4">
                        @auth
                            <a href="{{ url('/kelurahan') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-blue-600/25 hover:scale-[1.01]">
                                Mulai Ajukan Surat
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-blue-600/25 hover:scale-[1.01]">
                                Buat Akun Warga
                            </a>
                            <a href="{{ route('login') }}" class="px-6 py-3 bg-slate-800 hover:bg-slate-700 text-white font-semibold rounded-xl transition-all border border-slate-700 hover:border-slate-600">
                                Masuk Portal
                            </a>
                        @endauth
                    </div>
                </div>

                <div class="lg:col-span-5 flex justify-center">
                    <!-- Premium Government Badge / Digital Portal SVG Graphics -->
                    <div class="relative w-72 h-72 sm:w-80 sm:h-80 lg:w-96 lg:h-96">
                        <div class="absolute inset-0 bg-blue-600/10 rounded-full animate-ping duration-1000 opacity-20"></div>
                        <div class="w-full h-full bg-gradient-to-tr from-blue-900 to-indigo-950 rounded-2xl border border-slate-700 p-8 flex flex-col justify-between shadow-2xl relative">
                            <!-- Emblem logo header -->
                            <div class="flex justify-between items-start">
                                <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253"></path>
                                </svg>
                                <span class="text-[10px] bg-slate-800 text-blue-400 py-1 px-2.5 rounded-full font-bold uppercase border border-slate-700">Verifikator</span>
                            </div>

                            <!-- Abstract dashboard graphic -->
                            <div class="space-y-4">
                                <div class="h-2 bg-slate-800 rounded-full w-2/3"></div>
                                <div class="h-2 bg-slate-800 rounded-full w-full"></div>
                                <div class="h-2 bg-slate-800 rounded-full w-1/2"></div>
                                <div class="grid grid-cols-3 gap-2 pt-2">
                                    <div class="h-8 bg-blue-600/20 border border-blue-600/30 rounded-lg"></div>
                                    <div class="h-8 bg-slate-800 rounded-lg"></div>
                                    <div class="h-8 bg-slate-800 rounded-lg"></div>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-slate-800 border border-slate-700"></div>
                                <div class="flex-1">
                                    <p class="text-[10px] text-slate-400">Terhubung Aman Dengan</p>
                                    <p class="text-xs font-bold text-white">Database Warga Kelurahan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section id="statistik" class="py-12 bg-white border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div class="space-y-1">
                        <p class="text-3xl font-extrabold text-blue-600">1.284</p>
                        <p class="text-xs text-slate-500 uppercase tracking-widest font-semibold">Total Penduduk</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-3xl font-extrabold text-blue-600">4,250+</p>
                        <p class="text-xs text-slate-500 uppercase tracking-widest font-semibold">Surat Diproses</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-3xl font-extrabold text-blue-600">10 Menit</p>
                        <p class="text-xs text-slate-500 uppercase tracking-widest font-semibold">Rata-rata Proses</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-3xl font-extrabold text-blue-600">99.2%</p>
                        <p class="text-xs text-slate-500 uppercase tracking-widest font-semibold">Kepuasan Layanan</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick Access Menu -->
        <section id="layanan" class="py-20 max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900">
                    Akses Cepat Layanan Administrasi
                </h2>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Ajukan dokumen administratif secara online. Kami menyediakan berbagai jenis layanan digital mandiri untuk mempermudah permohonan warga tanpa perlu bertatap muka.
                </p>
            </div>

            <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white border border-slate-200 p-6 rounded-2xl hover:border-blue-500 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-base text-slate-900">Surat Keterangan Usaha (SKU)</h3>
                    <p class="text-slate-500 text-xs mt-2 leading-relaxed">
                        Dibutuhkan bagi warga pelaku UMKM untuk mendapatkan legalitas usaha dalam pengajuan perbankan atau kemitraan.
                    </p>
                    <a href="{{ route('login') }}" class="inline-flex items-center text-xs font-bold text-blue-600 hover:text-blue-700 mt-4 gap-1">
                        Buat Pengajuan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <!-- Card 2 -->
                <div class="bg-white border border-slate-200 p-6 rounded-2xl hover:border-blue-500 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-base text-slate-900">Surat Keterangan Tidak Mampu (SKTM)</h3>
                    <p class="text-slate-500 text-xs mt-2 leading-relaxed">
                        Digunakan untuk mendapatkan akses bantuan sosial pemerintah, keringanan biaya pendidikan, maupun layanan kesehatan gratis.
                    </p>
                    <a href="{{ route('login') }}" class="inline-flex items-center text-xs font-bold text-blue-600 hover:text-blue-700 mt-4 gap-1">
                        Buat Pengajuan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <!-- Card 3 -->
                <div class="bg-white border border-slate-200 p-6 rounded-2xl hover:border-blue-500 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-base text-slate-900">Surat Pengantar SKCK</h3>
                    <p class="text-slate-500 text-xs mt-2 leading-relaxed">
                        Surat pengantar kelurahan sebagai syarat wajib pembuatan Surat Keterangan Catatan Kepolisian di Polsek atau Polres setempat.
                    </p>
                    <a href="{{ route('login') }}" class="inline-flex items-center text-xs font-bold text-blue-600 hover:text-blue-700 mt-4 gap-1">
                        Buat Pengajuan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- Features Grid -->
        <section id="fitur" class="py-20 bg-white border-t border-slate-200">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900">
                        Keuntungan Menggunakan Pelayanan Mandiri Online
                    </h2>
                    <p class="text-slate-500 text-sm">
                        Proses pengajuan dokumen kelurahan kini menjadi jauh lebih transparan, andal, dan dapat dilakukan kapan pun Anda membutuhkannya.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Fitur 1 -->
                    <div class="space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-base text-slate-900">Proses Cepat & Efisien</h4>
                        <p class="text-slate-500 text-xs leading-relaxed">
                            Dokumen yang Anda ajukan dikirimkan langsung ke dashboard Admin kelurahan dan akan diproses secara kilat tanpa harus menunggu di loket antrean fisik.
                        </p>
                    </div>

                    <!-- Fitur 2 -->
                    <div class="space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-base text-slate-900">Validasi & Keamanan Ketat</h4>
                        <p class="text-slate-500 text-xs leading-relaxed">
                            Setiap akun warga dicocokkan dengan data penduduk terdaftar. NIK dan kata sandi Anda terenkripsi aman dalam sistem database kami.
                        </p>
                    </div>

                    <!-- Fitur 3 -->
                    <div class="space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-base text-slate-900">Transparansi Real-Time</h4>
                        <p class="text-slate-500 text-xs leading-relaxed">
                            Pantau sejauh mana surat ajuan Anda telah diproses. Mulai dari status antrean, disetujui, hingga siap diambil di Kantor Kelurahan.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold">
                        K
                    </div>
                    <span class="font-bold text-sm tracking-wide text-white uppercase">Kantor Kelurahan</span>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Sistem informasi pelayanan administrasi warga berbasis online mandiri. Membantu digitalisasi kelurahan menuju birokrasi yang cepat, bersih, dan melayani.
                </p>
            </div>

            <div class="space-y-3">
                <h4 class="text-white text-sm font-semibold">Tautan Berguna</h4>
                <ul class="text-xs space-y-2">
                    <li><a href="#fitur" class="hover:text-blue-500 transition-colors">Fitur Sistem</a></li>
                    <li><a href="#statistik" class="hover:text-blue-500 transition-colors">Statistik Wilayah</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-blue-500 transition-colors">Portal Masuk</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-blue-500 transition-colors">Registrasi Warga</a></li>
                </ul>
            </div>

            <div class="space-y-3">
                <h4 class="text-white text-sm font-semibold">Hubungi Kami</h4>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Gedung Kantor Kelurahan PWEB2<br>
                    Jl. Pemuda No. 456, Kota Administrasi<br>
                    Email: support@kelurahan.go.id<br>
                    Telp: (021) 555-0199
                </p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 border-t border-slate-800 mt-8 pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500 gap-2">
            <div>
                &copy; 2026 Kantor Kelurahan Digital. Hak Cipta Dilindungi.
            </div>
            <div class="flex gap-4">
                <a href="#" class="hover:text-white transition-colors">Ketentuan Layanan</a>
                <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
            </div>
        </div>
    </footer>
</body>
</html>
