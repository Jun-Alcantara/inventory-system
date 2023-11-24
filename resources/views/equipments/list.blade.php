@extends('layouts.base')

@section('content')
  <div class="container">
    <div class="content mt-4">
      <div class="d-flex justify-content-between mb-4">
        <div><h1>Equipments List</h1></div>
        <div class="d-flex align-items-center">
          <a href="{{ route('equipments.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add New Equipment
          </a>
        </div>
      </div>
      <table id="equipments-table" class="table table-bordered table-striped mt-5">
        <thead>
          <tr>
            <th>Asset Number</th>
            <th>Serial Number</th>
            <th>Type</th>
            <th>Department</th>
            <th>Status</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse($equipments as $e)
            <tr>
              <td>{{ $e->asset_number }}</td>
              <td>{{ $e->serial_number }}</td>
              <td>{{ $e->type->name }}</td>
              <td>{{ $e->department->name }}</td>
              <td>{{ $e->status->name }}</td>
              <td class="text-center">
                <a href="{{ route('equipments.edit', $e) }}" class="text-primary"><i class="fa fa-edit"></i></a>
                <form action="{{ route('equipments.destroy', $e) }}" method="POST" id="delete-form-{{ $e->id }}">
                  @csrf
                  <input type="hidden" name="_method" value="delete">
                </form>
              </td>
              <td class="text-center">
                <a href="#" class="delete-btn text-danger" data-form="#delete-form-{{ $e->id }}"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="10" class="text-center">
                No equipments found
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection

@section('custom-script')
  <script>
    let table = new DataTable('#equipments-table')

    $('.delete-btn').click(function (e) {
      e.preventDefault();
      let form = $( $(this).attr('data-form') )
      
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
          form.submit()
        }
      });
    })
  </script>
@endsection