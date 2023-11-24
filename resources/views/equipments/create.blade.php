@extends('layouts.base')

@section('content')
  <div class="container">
    <div class="content mt-4">
      <h3 class="h3">Create New Equipment</h3>
      <form action="{{ route('equipments.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
          <div class="col-6">
            <label for="asset_number" class="label">Asset Number:</label>
            <input type="text" id="asset_number" class="form-control {{ $errors->has('asset_number') ? 'is-invalid' : '' }}" name="asset_number" value="{{ old("asset_number") }}">
            <div class="invalid-feedback">
              {{ $errors->first('asset_number') }}
            </div>
          </div>
          <div class="col-6">
            <label for="serial_number" class="label">Serial Number:</label>
            <input type="text" id="serial_number" class="form-control {{ $errors->has('serial_number') ? 'is-invalid' : '' }}" name="serial_number" value="{{ old("serial_number", $equipment->serial_number ?? null ) }}">
            <div class="invalid-feedback">
              {{ $errors->first('serial_number') }}
            </div>
          </div>
        </div>
        
        <div class="row mb-3">
          <div class="col-6">
            <label for="type" class="label">Type:</label>
            <select name="type" id="type" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}">
              <option value="">-- Select Type --</option>
              @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ old('type', null) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">
              {{ $errors->first('type') }}
            </div>
          </div>
          <div class="col-6">
            <label for="manufacturer" class="label">Manufacturer:</label>
            <input type="text" id="manufacturer" class="form-control {{ $errors->has('manufacturer') ? 'is-invalid' : '' }}" name="manufacturer" value="{{ old("manufacturer") }}">
            <div class="invalid-feedback">
              {{ $errors->first('manufacturer') }}
            </div>
          </div> 
        </div>

        <div class="row mb-3">
          <div class="col-6">
            <label for="year_model" class="label">Year Model:</label>
            <input type="text" id="year_model" class="form-control {{ $errors->has('year_model') ? 'is-invalid' : '' }}" name="year_model" value="{{ old("year_model") }}">
            <div class="invalid-feedback">
              {{ $errors->first('year_model') }}
            </div>
          </div>
          <div class="col-6">
            <label for="department" class="label">Department:</label>
            <select name="department" id="department" class="form-control {{ $errors->has('department') ? 'is-invalid' : '' }}">
              <option value="">-- Select Department --</option>
              @foreach ($departments as $department)
                <option value="{{ $department->id }}" {{ old('department', null) == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">
              {{ $errors->first('department') }}
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-12">
            <label for="description" class="label">Description:</label>
            <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{ old('description') }}</textarea>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-12">
            <button class="btn btn-primary">
              <i class="fa fa-save"></i>
              Save Equipment Details
            </button>
            <a href="{{ route('equipments.index') }}" class="btn btn-secondary">
              <i class="fa fa-times"></i>
              Discard Details
            </a>
          </div>
        </div>

      </form>
    </div>
  </div>
@endsection