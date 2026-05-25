@extends('layouts.app')

@section('title', 'Data Penduduk')

@section('content')
    <h1>Penduduk</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Head 1</th>
                <th>Head 2</th>
                <th>Head 3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $id }}</td>
                <td>{{ $id2 }}</td>
                <td>{{ $id3 }}</td>
            </tr>
        </tbody>
    </table>
@endsection