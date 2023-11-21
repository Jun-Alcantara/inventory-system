@extends('layouts.base')

@section('content')
  <div class="container">
    <div class="col-6 offset-3 pt-5">
      <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="card">
          <h5 class="card-header">Create New User</h5>
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
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
            </div>
    
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fa fa-user"></i>
              </span>
              <input type="text" class="form-control" id="name" name="name" placeholder="Fullname" value="{{ old('name') }}" required>
            </div>
    
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fa fa-envelope"></i>
              </span>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
              <select class="form-select" name="user_type" required>
                <option selected>-- Select User Type --</option>
                <option value="user">User</option>
                <option value="administrator">Administrator</option>
              </select>
            </div>

            <div class="mb-3">
              <select class="form-select" name="status" required>
                <option selected>-- Select User Status --</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
            </div>
    
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fa fa-key"></i>
              </span>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
            </div>
    
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fa fa-key"></i>
              </span>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}" required>
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