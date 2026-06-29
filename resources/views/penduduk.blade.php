@extends('layouts.app')

@section('title', 'Data Penduduk')

@section('content')
<div class="space-y-6">
    <!-- Demographic Statistics Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
        <!-- Card 1: Total Penduduk -->
        <div class="bg-white border border-slate-200 p-5 rounded-2xl shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.109A11.386 11.386 0 0110.089 21m-5.34-2.736A7.22 7.22 0 018 18c2.124 0 4.13.917 5.5 2.512M18 10.5a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm-8.25 4.5a5.25 5.25 0 10-10.5 0 5.25 5.25 0 0010.5 0zM8 7.5a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Total Penduduk</p>
                <p class="text-xl font-extrabold text-slate-900 mt-0.5">{{ count($warga) }}</p>
            </div>
        </div>

        <!-- Card 2: Laki-laki -->
        <div class="bg-white border border-slate-200 p-5 rounded-2xl shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Laki-Laki</p>
                <p class="text-xl font-extrabold text-slate-900 mt-0.5">
                    {{ $warga->filter(fn($w) => in_array(strtolower($w->jk), ['laki-laki', 'l', 'pria']))->count() }}
                </p>
            </div>
        </div>

        <!-- Card 3: Perempuan -->
        <div class="bg-white border border-slate-200 p-5 rounded-2xl shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Perempuan</p>
                <p class="text-xl font-extrabold text-slate-900 mt-0.5">
                    {{ $warga->filter(fn($w) => in_array(strtolower($w->jk), ['perempuan', 'p', 'wanita']))->count() }}
                </p>
            </div>
        </div>

        <!-- Card 4: RT -->
        <div class="bg-white border border-slate-200 p-5 rounded-2xl shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 21V9.75A2.25 2.25 0 0017.25 7.5h-10.5A2.25 2.25 0 004.5 9.75V21m3.75-3h.008v.008H8.25V18zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM12 18h.008v.008H12V18zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm1.125-3h.008v.008h-.008V15zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-3.75 0h.008v.008H12V15zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-3.75 0h.008v.008H8.25V15zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5-3h.008v.008h-.008v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-3.75 0h.008v.008H12v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-3.75 0h.008v.008H8.25v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5-3h.008v.008h-.008V9zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-3.75 0h.008v.008H12V9zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-3.75 0h.008v.008H8.25V9zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">RT</p>
                <p class="text-xl font-extrabold text-slate-900 mt-0.5">08</p>
            </div>
        </div>

        <!-- Card 5: RW -->
        <div class="bg-white border border-slate-200 p-5 rounded-2xl shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m16.5-18v18m-12-9h3m-3 3h3m0 0h3m-3-3h3m-9-6h15M2.25 5.25h19.5M12 9h.008v.008H12V9zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">RW</p>
                <p class="text-xl font-extrabold text-slate-900 mt-0.5">02</p>
            </div>
        </div>
    </div>

    <!-- Table Container Card -->
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
        <!-- Search and Filter -->
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50/50 flex flex-col sm:flex-row justify-between items-center gap-3">
            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Daftar Warga Terdaftar</span>
            
            <div class="relative w-full sm:w-60">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="text" placeholder="Cari NIK atau Nama..." class="w-full pl-9 pr-4 py-1.5 bg-white border border-slate-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 transition-all text-slate-800" />
            </div>
        </div>

        <!-- Table Content -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-700">
                <thead class="text-xs font-bold text-slate-500 uppercase tracking-wider bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th scope="col" class="px-6 py-3.5 w-16 text-center">No</th>
                        <th scope="col" class="px-6 py-3.5">NIK</th>
                        <th scope="col" class="px-6 py-3.5">Nama Lengkap</th>
                        <th scope="col" class="px-6 py-3.5 text-center w-40">Jenis Kelamin</th>
                        <th scope="col" class="px-6 py-3.5">Alamat Domisili</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($warga as $index => $item)
                    <tr class="hover:bg-slate-50/70 transition-colors">
                        <td class="px-6 py-4 text-center font-medium text-slate-500">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 font-mono text-slate-900 font-semibold tracking-wider">{{ $item->nik }}</td>
                        <td class="px-6 py-4 font-semibold text-slate-800">{{ $item->nama }}</td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium {{ in_array(strtolower($item->jk), ['laki-laki', 'l', 'pria']) ? 'bg-indigo-50 text-indigo-700 border border-indigo-100' : 'bg-rose-50 text-rose-700 border border-rose-100' }}">
                                {{ $item->jk }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-slate-600">{{ $item->alamat }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                            Belum ada data warga terdaftar.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50">
            <span class="text-xs font-semibold text-slate-500">Total data warga: {{ count($warga) }} orang</span>
        </div>
    </div>
</div>
@endsection
