@extends('layouts.app')

@section('title', 'Data Penduduk')

@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($warga as $item)
        <tr>
            <td>{{ $item->nik }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->jk }}</td>
            <td>{{ $item->alamat }}</td>
        </tr> 
        @endforeach
    </tbody>
</table>
@endsection
