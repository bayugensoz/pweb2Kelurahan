@extends('layouts.app')

@section('title', 'Tambah Pengajuan Surat')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Breadcrumb back link -->
    <div class="flex items-center">
        <a href="{{ route('surat.index') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-slate-800 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
            </svg>
            Kembali ke Daftar Surat
        </a>
    </div>

    <!-- Form Container Card -->
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-200 bg-slate-50/50">
            <h3 class="text-base font-bold text-slate-900">Form Pengajuan Surat Baru</h3>
            <p class="text-xs text-slate-500 mt-1">Isi formulir pengajuan dengan nomor surat resmi, tipe surat, dan pemohon terkait.</p>
        </div>

        <!-- Global Errors display -->
        @if ($errors->any())
            <div class="p-4 mx-6 mt-6 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-sm">
                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-4.5 h-4.5 text-rose-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <span class="font-bold text-xs uppercase tracking-wide">Periksa kesalahan input:</span>
                </div>
                <ul class="list-disc pl-5 space-y-1 text-xs text-rose-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('surat.store') }}" method="POST">
            @csrf

            <div class="p-6 space-y-5">
                <!-- Nomor Surat -->
                <div>
                    <label for="nomor_surat" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Nomor Surat <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           name="nomor_surat" 
                           id="nomor_surat" 
                           value="{{ old('nomor_surat') }}" 
                           placeholder="Contoh: 005/SKTM/2026"
                           required
                           class="appearance-none block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 focus:bg-white transition-all text-sm text-slate-800" />
                </div>

                <!-- Jenis Surat -->
                <div>
                    <label for="jenis_surat" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Jenis Surat <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="jenis_surat" 
                                id="jenis_surat" 
                                required
                                class="appearance-none block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 focus:bg-white transition-all text-sm text-slate-800">
                            <option value="">-- Pilih Jenis Surat --</option>
                            <option value="Surat Keterangan Tidak Mampu (SKTM)">Surat Keterangan Tidak Mampu (SKTM)</option>
                            <option value="Surat Keterangan Usaha (SKU)">Surat Keterangan Usaha (SKU)</option>
                            <option value="Surat Pengantar SKCK">Surat Pengantar SKCK</option>
                        </select>
                    </div>
                </div>

                <!-- Warga Pemohon -->
                <div>
                    <label for="penduduk_id" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Warga Pemohon <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="penduduk_id" 
                                id="penduduk_id" 
                                required
                                class="appearance-none block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 focus:bg-white transition-all text-sm text-slate-800">
                            <option value="">-- Pilih Warga --</option>
                            @foreach($penduduk as $p)
                                <option value="{{ $p->id }}">{{ $p->nik }} - {{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Tanggal Pengajuan -->
                <div>
                    <label for="tanggal_ajuan" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Tanggal Pengajuan <span class="text-rose-500">*</span>
                    </label>
                    <input type="date" 
                           name="tanggal_ajuan" 
                           id="tanggal_ajuan" 
                           value="{{ date('Y-m-d') }}"
                           required
                           class="appearance-none block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 focus:bg-white transition-all text-sm text-slate-800" />
                </div>
            </div>

            <!-- Footer Buttons -->
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex items-center justify-end gap-3">
                <a href="{{ route('surat.index') }}" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-semibold text-xs rounded-xl transition-all shadow-2xs">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl transition-all shadow-sm shadow-blue-600/10 active:scale-[0.98] duration-150">
                    Simpan Pengajuan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection