@extends('layout.app')
@section('title', 'login')
@section('Header', 'login')
@section('content')
    {{-- {{ dd(bcrypt(1234)) }} --}}
    <form action="" method="post">
        @csrf
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
        <input type="submit" value="Login" class="btn btn-success w-25">
    </form>
@endsection
