@extends('layout.app')
@section('title', 'Add New User')
@section('Header', 'Add New User')
@section('content')
    <form action="" method="post">
        @csrf
        <div class="mb-3 flex-wrap w-50 mx-auto d-flex align-items-center justify-content-between">
            <label for="name" class="form-label fs-5">Name:</label>
            <input type="text" id="name" name="name" class="form-control ms-3 w-75">
            @if ($errors->get('name'))
                <div class="w-100 mt-2">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="mb-3 flex-wrap w-50 mx-auto d-flex align-items-center justify-content-between">
            <label for="email" class="form-label fs-5">Email:</label>
            <input type="text" id="email" name="email" class="form-control ms-3 w-75">
            @if ($errors->get('email'))
                <div class="w-100 mt-2">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="mb-3 flex-wrap w-50 mx-auto d-flex align-items-center justify-content-between">
            <label for="password" class="form-label fs-5">Password:</label>
            <input type="password" id="password" name="password" class="form-control ms-3 w-75">
            @if ($errors->get('email'))
                <div class="w-100 mt-2">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="mb-3 w-50 mx-auto d-flex align-items-center justify-content-between">
            <label for="admin" class="form-label fs-5">Admin:</label>
            <select name="admin" id="admin" class="form-select ms-3 w-75">
                <option value="1">Yes</option>
                <option selected value="0">No</option>
            </select>
        </div>
        <input type="submit" value="Add" class="btn btn-success w-25">
    </form>
@endsection
