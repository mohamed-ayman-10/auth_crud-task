@extends('layout.app')
@section('title', 'CRUD')
@section('Header', 'CRUD')
@section('content')
    <table class="table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th colspan="2">Update & Delete</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a class="btn btn-primary" href="{{ url('home/edit/' . $user->id) }}">Update</a></td>
                <td><a class="btn btn-danger" href="{{ url('home/delete/' . $user->id) }}">Delete</a></td>
            </tr>
        @endforeach

    </table>
@endsection
