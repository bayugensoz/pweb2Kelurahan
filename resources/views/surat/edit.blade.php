@extends('layouts.app')

@section('title', 'Perbarui Data Surat')

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
            <h3 class="text-base font-bold text-slate-900">Form Perbarui Data Surat Kelurahan</h3>
            <p class="text-xs text-slate-500 mt-1">Ubah rincian pengajuan surat kependudukan warga di bawah ini.</p>
        </div>

        <form action="{{ route('surat.update', $surat->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Spoofing HTTP Method PUT for Update route -->

            <div class="p-6 space-y-5">
                <!-- Nomor Surat -->
                <div>
                    <label for="nomor_surat" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Nomor Surat <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           name="nomor_surat" 
                           id="nomor_surat" 
                           value="{{ old('nomor_surat', $surat->nomor_surat) }}" 
                           required
                           class="appearance-none block w-full px-4 py-2.5 bg-slate-50 border @error('nomor_surat') border-rose-500 focus:ring-rose-500/20 focus:border-rose-600 @else border-slate-200 focus:ring-blue-500/20 focus:border-blue-600 @enderror rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:bg-white transition-all text-sm text-slate-800" />
                    
                    @error('nomor_surat')
                        <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                    @enderror
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
                            <option value="Surat Pengantar" {{ $surat->jenis_surat == 'Surat Pengantar' ? 'selected' : '' }}>Surat Pengantar</option>
                            <option value="Surat Keterangan Tidak Mampu" {{ $surat->jenis_surat == 'Surat Keterangan Tidak Mampu' ? 'selected' : '' }}>Surat Keterangan Tidak Mampu</option>
                            <option value="Surat Domisili" {{ $surat->jenis_surat == 'Surat Domisili' ? 'selected' : '' }}>Surat Domisili</option>
                        </select>
                    </div>
                </div>

                <!-- Tanggal Ajuan -->
                <div>
                    <label for="tanggal_ajuan" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Tanggal Ajuan <span class="text-rose-500">*</span>
                    </label>
                    <input type="date" 
                           name="tanggal_ajuan" 
                           id="tanggal_ajuan" 
                           value="{{ old('tanggal_ajuan', $surat->tanggal_ajuan) }}" 
                           required
                           class="appearance-none block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 focus:bg-white transition-all text-sm text-slate-800" />
                </div>
            </div>

            <!-- Footer Buttons -->
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex items-center justify-end gap-3">
                <a href="{{ route('surat.index') }}" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-semibold text-xs rounded-xl transition-all shadow-2xs">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl transition-all shadow-sm shadow-emerald-600/10 active:scale-[0.98] duration-150">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
