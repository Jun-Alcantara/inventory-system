@extends('layouts.base')

@section('content')
  <div class="container">
  <div class="content mt-4">
    <div class="row">
    <div class="col-6 offset-3">
      <form action="{{ route('tickets.update', $ticket) }}" method="POST">
        @csrf
  
        <div class="form-group mb-3">
          <label for="ticket_number" class="label">Ticket Number:</label>
          <input type="text" class="form-control" name="ticket_number" value="{{ $ticket->ticket_number }}" disabled>
        </div>
  
        <div class="form-group mb-3">
          <label for="problem" class="label">Problem:</label>
          <select name="problem" id="problem" class="form-control">
            <option value="hardware" {{ $ticket->problem_type === "hardware" ? "selected" : "" }}>Hardware</option> 
            <option value="software" {{ $ticket->problem_type === "software" ? "selected" : "" }}>Software</option>
            <option value="connection" {{ $ticket->problem_type === "connection" ? "selected" : "" }}>Connection</option>
          </select>
        </div>
  
        <div class="form-group mb-3">
          <label for="description" class="label">Description:</label>
          <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $ticket->description }}</textarea>
        </div>
  
        <div class="form-group">
          <button class="btn btn-primary">
            <i class="fa fa-save"></i>     &nbsp;
            Save
          </button>
          <a href="{{ route('tickets.index') }}" class="btn btn-neutral">
            <i class="fa fa-times"></i> &nbsp;
            Discard
          </a>
        </div>
  
      </form>
    </div>
  </div>
  </div>
@endsection

@section('custom-script')
  
@endsection