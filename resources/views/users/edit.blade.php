@extends('layouts.base')

@section('content')
  <div class="container">
    <div class="col-6 offset-3 pt-5">
      <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf

        <input type="hidden" name="_method" value="patch">

        <div class="card">
          <h5 class="card-header">Edit User</h5>
          <div class="card-body">
            <div class="mb-3">
              <a href="{{ route('users.index') }}">
                <i class="fa fa-arrow-left"></i> View All Users
              </a>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fa fa-user"></i>
              </span>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username', $user->username) }}" required>
            </div>
    
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fa fa-user"></i>
              </span>
              <input type="text" class="form-control" id="name" name="name" placeholder="Fullname" value="{{ old('name', $user->name) }}" required>
            </div>
    
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fa fa-envelope"></i>
              </span>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
              <select class="form-select" name="user_type" required>
                <option selected>-- Select User Type --</option>
                <option value="user" {{ $user->usertype === 'user' ? 'selected' : '' }}>User</option>
                <option value="administrator" {{ $user->usertype === 'administrator' ? 'selected' : '' }}>Administrator</option>
              </select>
            </div>

            <div class="mb-3">
              <select class="form-select" name="status" required>
                <option selected>-- Select User Status --</option>
                <option value="active" {{ $user->status == "active" ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $user->status == "inactive" ? 'selected' : '' }}>Inactive</option>
              </select>
            </div>
            
            <div class="alert alert-warning" role="alert">
              <i class="fa fa-exclamation-triangle"></i>
              Enter and confirm password to reset password
            </div>
    
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fa fa-key"></i>
              </span>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
            </div>
    
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fa fa-key"></i>
              </span>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
            </div>

            <div class="mb-3">
              <button class="btn btn-primary w-100">
                <i class="fa fa-save"></i>
                Create
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection