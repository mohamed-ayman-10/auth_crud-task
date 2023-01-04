@extends('layout.app')
@section('title', 'Register')
@section('Header', 'Register')
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
            @if ($errors->get('password'))
                <div class="w-100 mt-2">{{ $errors->first('password') }}</div>
            @endif
        </div>
        <input type="submit" value="Register" class="btn btn-success w-25">
    </form>
@endsection
