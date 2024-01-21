@extends('layouts.base')

@section('content')
  <div class="container">
    <div class="content mt-4">
      <div class="d-flex justify-content-between mb-4">
        <h3>Tickets</h3>
        <a href="{{ route('tickets.create') }}" class="btn btn-primary">
          <i class="fa fa-plus"></i> &nbsp;
          Create New Ticket
        </a>
      </div>
      <table id="tickets-table" class="table">
        <thead>
          <tr>
            <th>Ticket Number</th>
            <th>Problem</th>
            <th>Status</th>
            <th>Created By</th>
            <th>Date Created</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tickets as $ticket)
            <tr>
              <td>{{ $ticket->ticket_number }}</td>
              <td>{{ ucwords($ticket->problem_type) }}</td>
              <td>{{ $ticket->status }}</td>
              <td>{{ $ticket->createdBy->name }} </td>
              <td>{{ $ticket->created_at->format('F d, Y h:i A') }}</td>
              <td>
                <a href="#">
                  <i class="fa fa-eye"></i> &nbsp;
                </a>
                <a href="{{ route('tickets.edit', $ticket) }}">
                  <i class="fa fa-edit"></i> &nbsp;
                </a>
                @if (strtolower($ticket->status) === 'closed')
                  <a href="#" class="text-danger delete-btn" data-formid="delete-form-{{ $ticket->id }}">
                    <i class="fa fa-trash"></i> 
                  </a>
                  <form id="delete-form-{{ $ticket->id }}" action="{{ route('tickets.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                  </form>
                @endif
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
    $('#tickets-table').dataTable();

    $('.delete-btn').click(function (e) {
      e.preventDefault();

      let formid = $(this).data('formid')
      console.log(formid)
      let form = $(`#${formid}`);
      
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
    })
  </script>
@endsection