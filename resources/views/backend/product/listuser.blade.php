@extends('layouts.backend.master')
@section('title')
    Daftar User
@endsection

@section('content')
    <table class="table table-dark">
        <thead>
            <tr>
                <th style="width:50%">Nama</th>
                <th style="width:10%">Role</th>
                <th style="width:50%">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->role }}</td>
                    <td>{{ $item->email }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection
