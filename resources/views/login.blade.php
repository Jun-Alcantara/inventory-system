@extends('layouts.base')

@section('custom-css')
  <style>
    .main-container > div {
      flex-basis: 50%;
    }

    #login-background {
      background: url('/images/login-bg.jpg');
      background-size: cover;
      background-position: right;
    }

    form#login-form {
      width: 700px;
      margin: 0 auto;
    }
  </style>
@endsection

@section('content')
  <div class="d-flex main-container">
    <div class="px-5 d-flex flex-column justify-content-center vh-100">
      <form id="login-form" action="{{ route('login.attempt') }}" method="POST" autocomplete="false">
        @csrf

        <div class="mb-5">
          <h1 class="h1 text-center">Inventory System</h1>
        </div>
        
        @if(session()->has('login.notification'))
          <div class="mb-3">
            <div class="alert alert-danger" role="alert">
              <i class="fa fa-times-circle"></i>
              {{ session()->get('login.notification') }}
            </div>
          </div>
        @endif

        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">
            <i class="fa fa-user"></i>
          </span>
          <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">
            <i class="fa fa-key"></i>
          </span>
          <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
          <button class="btn btn-primary w-100">
            <i class="fa fa-unlock"></i>
            Login
          </button>
        </div>
      </form>
    </div>
    <div id="login-background" class="vh-100">

    </div>
  </div>
@endsection