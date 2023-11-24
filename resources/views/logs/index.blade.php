@extends('layouts.base')

@section('content')
  <div class="container">
    <div class="content mt-3">
      <h3 class="h3">Logs</h3>
      <div>
        <table class="table">
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