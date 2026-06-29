<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Kantor Kelurahan</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-50 font-sans antialiased text-slate-800 flex">
    <div class="w-full min-h-screen flex flex-col md:flex-row">
        <!-- Left Side: Digital Government Illustration & Gradient -->
        <div class="hidden md:flex md:w-1/2 bg-gradient-to-tr from-slate-900 via-blue-950 to-blue-900 text-white flex-col justify-between p-12 relative overflow-hidden">
            <!-- Decorative Background Patterns -->
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid)" />
                </svg>
            </div>

            <!-- Top Header -->
            <div class="flex items-center gap-3 relative z-10">
                <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253"></path>
                </svg>
                <div class="flex flex-col">
                    <span class="font-bold text-base uppercase tracking-wider text-white">Kantor Kelurahan</span>
                    <span class="text-xs text-blue-300">Sistem Pelayanan Digital Mandiri</span>
                </div>
            </div>

            <!-- Central Content / Illustration -->
            <div class="my-auto relative z-10 max-w-lg">
                <!-- Government / Services Emblem SVG -->
                <svg class="w-48 h-48 text-blue-500/20 absolute -top-16 -left-16" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
                
                <h1 class="text-4xl font-extrabold tracking-tight text-white leading-tight">
                    Transparansi & Kemudahan Pelayanan Publik Warga.
                </h1>
                <p class="mt-4 text-slate-300 text-sm leading-relaxed">
                    Masuk untuk mengajukan permohonan surat administrasi, mengecek data kependudukan secara langsung, dan memantau status persetujuan layanan Anda dari rumah.
                </p>

                <!-- Statistics snippet in left panel -->
                <div class="mt-8 grid grid-cols-2 gap-4 border-t border-slate-800 pt-8">
                    <div>
                        <p class="text-2xl font-bold text-white">100%</p>
                        <p class="text-xs text-slate-400">Pelayanan Digital</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-white">Praktis</p>
                        <p class="text-xs text-slate-400">Tanpa Perlu Antre</p>
                    </div>
                </div>
            </div>

            <!-- Footer info -->
            <div class="text-xs text-slate-500 relative z-10">
                &copy; 2026 Kantor Kelurahan Digital. Hak Cipta Dilindungi.
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="flex-1 flex flex-col justify-center py-12 px-6 sm:px-12 lg:flex-none lg:w-1/2 bg-white">
            <div class="mx-auto w-full max-w-md">
                <!-- Branding for mobile only -->
                <div class="flex md:hidden items-center gap-3 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold">
                        K
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-slate-900 uppercase">Kantor Kelurahan</h2>
                        <p class="text-xs text-slate-500">Layanan Digital Warga</p>
                    </div>
                </div>

                <div class="text-left">
                    <h2 class="text-3xl font-extrabold tracking-tight text-slate-900">
                        Selamat Datang
                    </h2>
                    <p class="mt-2 text-sm text-slate-500">
                        Silakan masuk dengan akun warga atau admin yang terdaftar.
                    </p>
                </div>

                <div class="mt-8">
                    <!-- Session & Error Alerts -->
                    @if(session('sukses'))
                        <div class="mb-4 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium">
                            {{ session('sukses') }}
                        </div>
                    @endif

                    @error('login_error')
                        <div class="mb-4 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-sm font-medium">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Form -->
                    <form action="{{ route('login.auth') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700">
                                Alamat Email
                            </label>
                            <div class="mt-1">
                                <input id="email" 
                                       name="email" 
                                       type="email" 
                                       autocomplete="email" 
                                       value="{{ old('email') }}"
                                       required 
                                       autofocus
                                       placeholder="nama@email.com"
                                       class="appearance-none block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 focus:bg-white transition-all text-sm text-slate-800" />
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-slate-700">
                                Kata Sandi
                            </label>
                            <div class="mt-1">
                                <input id="password" 
                                       name="password" 
                                       type="password" 
                                       autocomplete="current-password" 
                                       required
                                       placeholder="••••••••"
                                       class="appearance-none block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 focus:bg-white transition-all text-sm text-slate-800" />
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" 
                                       name="remember" 
                                       type="checkbox" 
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-slate-300 rounded-lg">
                                <label for="remember_me" class="ml-2 block text-xs font-semibold text-slate-600 select-none">
                                    Ingat saya
                                </label>
                            </div>

                            <div class="text-xs">
                                <a href="#" class="font-semibold text-blue-600 hover:text-blue-500 transition-colors" onclick="alert('Silakan hubungi operator kelurahan untuk menyetel ulang kata sandi Anda.'); return false;">
                                    Lupa kata sandi?
                                </a>
                            </div>
                        </div>

                        <div>
                            <button type="submit" 
                                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all hover:scale-[1.01] active:scale-[0.99] duration-150">
                                Masuk ke Sistem
                            </button>
                        </div>
                    </form>

                    <div class="mt-8 border-t border-slate-100 pt-6 text-center">
                        <p class="text-sm text-slate-500">
                            Belum memiliki akun warga? 
                            <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-500 transition-colors">
                                Daftar Sekarang
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
