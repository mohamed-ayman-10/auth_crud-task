@extends('layout.app')
@section('title', 'Update')
@section('Header', 'Update')
@section('content')
    <form action="" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="mb-3 flex-wrap w-50 mx-auto d-flex align-items-center justify-content-between">
            <label for="name" class="form-label fs-5">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control ms-3 w-75">
            @if ($errors->get('name'))
                <div class="w-100 mt-2">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="mb-3 flex-wrap w-50 mx-auto d-flex align-items-center justify-content-between">
            <label for="email" class="form-label fs-5">Email:</label>
            <input type="text" id="email" name="email" value="{{ $user->email }}" class="form-control ms-3 w-75">
            @if ($errors->get('email'))
                <div class="w-100 mt-2">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="mb-3 w-50 mx-auto d-flex align-items-center justify-content-between">
            <label for="admin" class="form-label fs-5">Admin:</label>
            <select name="admin" id="admin" class="form-select ms-3 w-75">
                <option @if ($user->admin == 1) {{ 'selected' }} @endif value="1">Yes</option>
                <option @if ($user->admin == 0) {{ 'selected' }} @endif value="0">No</option>
            </select>
        </div>
        <input type="submit" value="Update" class="btn btn-success w-25">
    </form>
@endsection
