@extends('layouts.base')

@section('content')
  <div class="container mt-4">
    <div class="content">
      <div class="mb-3">
        <h3 class="h3 float-start">Users</h3>
        <a href="{{ route('users.create') }}" class="btn btn-primary float-end mt-3">
          <i class="fa fa-plus"></i>  Create User
        </a>
        <div class="clearfix"></div>
      </div>
      <table id="users-table" class="table table-striped mt-5">
        <thead>
          <tr>
            <th scope="col">Username</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">User Type</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->username }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ strtoupper($user->usertype) }}</td>
              <td>
                @if ($user->status == 'active')
                  <span class="badge bg-primary">active</span>
                @else 
                <span class="badge bg-secondary">inactive</span>
                @endif
              </td>
              <td>
                <a href="" class="text-danger delete-user-btn" data-userid="{{ $user->id }}" data-deleteform="delete-form-{{ $user->id }}">
                  <i class="fa fa-trash"></i> 
                </a>

                <form class="d-none" action="{{ route('users.destroy', $user) }}" method="POST" id="delete-form-{{ $user->id }}">
                  @csrf
                </form>

                &nbsp;

                <a href="{{ route('users.edit', $user) }}" class="text-primary">
                  <i class="fa fa-edit"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

@section('custom-script')
  <script>
    const deleteBtns = document.querySelectorAll('.delete-user-btn')
    let userTable = new DataTable('#users-table')

    deleteBtns.forEach(function(button) {
      button.addEventListener('click', function(e) {
        e.preventDefault()

        let userid = button.getAttribute('data-userid')
        let formid = button.getAttribute('data-deleteform')
        let form = document.getElementById(formid)

        Swal.fire({
          title: "Are you sure?",
          text: "This action will remove the user details permanently in our database",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit()
          }
        });

        // if (confirm("Are you sure you want to delete this user? This will permanently remove the users record in our database.")) {
        //   form.submit()
        // }
      });
    });
  </script>
@endsection