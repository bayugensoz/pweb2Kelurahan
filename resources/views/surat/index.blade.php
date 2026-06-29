@extends('layouts.app')

@section('title', 'Data Pengajuan Surat')

@section('content')
<div class="space-y-6">
    <!-- Top Card / Header actions -->
    <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h3 class="text-lg font-bold text-slate-900">Daftar Pengajuan Surat</h3>
            <p class="text-xs text-slate-500 mt-1">Daftar seluruh surat keterangan dan pengantar yang diajukan oleh warga.</p>
        </div>
        
        <!-- Action Button -->
        <a href="{{ route('surat.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm rounded-xl transition-all shadow-sm shadow-blue-600/10 active:scale-[0.98] duration-150 shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
            </svg>
            Tambah Pengajuan
        </a>
    </div>

    <!-- Table Container Card -->
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
        <!-- Search and Filter (Visual decorator) -->
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50/50 flex flex-col sm:flex-row justify-between items-center gap-3">
            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Arsip Surat Kelurahan</span>
            
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <div class="relative flex-1 sm:w-60">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                    <input type="text" placeholder="Cari data surat..." class="w-full pl-9 pr-4 py-1.5 bg-white border border-slate-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 transition-all text-slate-800" />
                </div>
                <button class="p-1.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 rounded-xl transition-all" title="Filter">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.59l-5.342 5.342a2.25 2.25 0 00-.659 1.59v5.333a.75.75 0 01-1.077.671l-3.333-1.667a.75.75 0 01-.423-.671V14.25a2.25 2.25 0 00-.659-1.59L3.74 7.318A2.25 2.25 0 013 5.728V4.674c0-.54.384-1.006.917-1.096A50.065 50.065 0 0112 3z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Table Content -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-700">
                <thead class="text-xs font-bold text-slate-500 uppercase tracking-wider bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th scope="col" class="px-6 py-3.5 text-center w-16">No</th>
                        <th scope="col" class="px-6 py-3.5">No Surat</th>
                        <th scope="col" class="px-6 py-3.5">Jenis Surat</th>
                        <th scope="col" class="px-6 py-3.5">Nama Pemohon</th>
                        <th scope="col" class="px-6 py-3.5">NIK Pemohon</th>
                        <th scope="col" class="px-6 py-3.5">Tanggal Ajuan</th>
                        <th scope="col" class="px-6 py-3.5 text-center w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($semuaSurat as $index => $s)
                    <tr class="hover:bg-slate-50/70 transition-colors">
                        <td class="px-6 py-4 text-center font-medium text-slate-500">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 font-semibold text-slate-900">{{ $s->nomor_surat }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                                {{ $s->jenis_surat }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold text-slate-800">
                            {{ $s->penduduk->nama }}
                        </td>
                        <td class="px-6 py-4 font-mono text-xs text-slate-500">{{ $s->penduduk->nik }}</td>
                        <td class="px-6 py-4 text-xs font-medium text-slate-500">
                            {{ \Carbon\Carbon::parse($s->tanggal_ajuan)->format('d-m-Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <!-- Edit Button -->
                                <a href="{{ route('surat.edit', $s->id) }}" class="inline-flex items-center gap-1 px-2.5 py-1.5 bg-amber-50 hover:bg-amber-100 text-amber-700 text-xs font-bold rounded-xl border border-amber-200 transition-colors" title="Edit Data">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"></path>
                                    </svg>
                                    Edit
                                </a>

                                <!-- Delete Form -->
                                <form action="{{ route('surat.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data surat ini?')" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1 px-2.5 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-bold rounded-xl border border-rose-200 transition-colors" title="Hapus Data">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center max-w-sm mx-auto space-y-3">
                                <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800">Arsip Masih Kosong</p>
                                    <p class="text-xs text-slate-500 mt-1">Belum ada data pengajuan surat terdaftar dalam database kami.</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination footer decoration -->
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex items-center justify-between">
            <span class="text-xs font-semibold text-slate-500">Menampilkan {{ count($semuaSurat) }} data surat</span>
            <div class="flex items-center gap-1.5">
                <!-- Pagination triggers (preserving native layout or styling if exists) -->
                <!-- Since it's dynamic in pagination, we just leave any pagination logic as is if there's any, or provide basic design -->
            </div>
        </div>
    </div>
</div>
@endsection