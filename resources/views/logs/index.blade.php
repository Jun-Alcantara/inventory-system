@extends('layouts.base')

@section('content')
  <div class="container">
    <div class="content mt-4">
      <div class="d-flex justify-content-between mb-3">
        <h3 class="h3">Logs</h3>
        <a href="#" id="clear-logs-btn" class="btn btn-primary">
          <i class="fa fa-trash"></i> Clear Logs
        </a>
      </div>
      <div>
        <table id="logs-table" class="table">
          <thead>
            <tr>
              <th>Action</th>
              <th>Module</th>
              <th>User</th>
              <th>Date & Time</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($logs as $log)
              <tr>
                <td>{{ $log->action }}</td>
                <td>{{ $log->module }}</td>
                <td>{{ $log->user->username }}</td>
                <td>{{ $log->created_at->format('F d, Y h:i A') }}</td>
                <td></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('custom-script')
  <script>
    let dataTable = new DataTable('#logs-table')

    $('#clear-logs-btn').click(function (e) {
      e.preventDefault()

      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "/logs/clear-all"
        }
      });
    })
  </script>
@endsection