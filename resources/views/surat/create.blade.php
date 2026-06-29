@extends('layouts.app')

@section('title', 'Tambah Pengajuan Surat')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center">
        <a href="{{ route('surat.index') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-slate-800 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
            </svg>
            Kembali ke Daftar Surat
        </a>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-200 bg-slate-50/50">
            <h3 class="text-base font-bold text-slate-900">Form Pengajuan Surat Baru</h3>
            <p class="text-xs text-slate-500 mt-1">Isi formulir pengajuan dengan nomor surat resmi, tipe surat, dan pemohon terkait.</p>
        </div>

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

        {{-- UPDATE: Ditambahkan enctype="multipart/form-data" --}}
        <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="p-6 space-y-5">
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

                <div class="pt-4 border-t border-slate-100 space-y-4">
                    <div>
                        <h4 class="text-sm font-bold text-slate-900">Berkas Pendukung Permohonan</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Upload dokumen pendukung seperti KTP atau KK agar proses verifikasi permohonan surat lebih mudah dilakukan.</p>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 text-xs text-slate-600 space-y-1">
                        <strong class="text-slate-800">Ketentuan file:</strong>
                        <p>Format yang diperbolehkan adalah <span class="font-semibold text-slate-700">JPG, PNG, atau PDF</span> dengan ukuran maksimal <span class="font-semibold text-slate-700">2MB</span>.</p>
                    </div>

                    <div>
                        <label for="berkas_pendukung" class="block text-sm font-medium text-slate-700 mb-1.5">
                            Upload KTP/KK Pendukung
                        </label>

                        <input type="file"
                               name="berkas_pendukung"
                               id="berkas_pendukung"
                               accept=".jpg,.png,.pdf"
                               class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-slate-200 bg-slate-50 rounded-xl focus:outline-none cursor-pointer @error('berkas_pendukung') border-rose-500 bg-rose-50/30 @enderror" />

                        @error('berkas_pendukung')
                            <p class="mt-1 text-xs text-rose-600 font-medium">{{ $message }}</p>
                        @enderror

                        <div class="mt-1.5 text-xs text-slate-400">
                            Pastikan dokumen terlihat jelas dan sesuai dengan data permohonan.
                        </div>

                        <div id="preview-file" class="text-xs text-blue-600 mt-2 font-medium"></div>
                    </div>
                </div>
            </div>

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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const berkasPendukung = document.getElementById('berkas_pendukung');
        const previewFile = document.getElementById('preview-file');

        if (berkasPendukung) {
            berkasPendukung.addEventListener('change', function () {
                if (this.files.length > 0) {
                    previewFile.innerHTML = 'File dipilih: <span class="font-bold text-slate-800">' + this.files[0].name + '</span>';
                } else {
                    previewFile.innerHTML = '';
                }
            });
        }
    });
</script>
@endsection