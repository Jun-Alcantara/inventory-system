@extends('layouts.base')

@section('content')
  <div class="container">
    <div class="content mt-3">
      <div class="row">
        <h3 class="h3">
          Editing Asset Number: {{ $equipment->asset_number }}
        </h3>
      </div>
      <form action="{{ route('equipments.update', $equipment) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="patch">

        <div class="row mb-3">
          <div class="col-6">
            <label for="serial_number" class="label">Serial Number:</label>
            <input type="text" id="serial_number" class="form-control {{ $errors->has('serial_number') ? 'is-invalid' : '' }}" name="serial_number" value="{{ old("serial_number", $equipment->serial_number) }}">
            <div class="invalid-feedback">
              {{ $errors->first('serial_number') }}
            </div>
          </div>
          <div class="col-6">
            <label for="type" class="label">Type:</label>
            <select name="type" id="type" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}">
              <option value="">-- Select Type --</option>
              @foreach ($types as $type)
                <option value="{{ $type->id }}"  {{ old('type', $equipment->equipment_type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">
              {{ $errors->first('type') }}
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-6">
            <label for="manufacturer" class="label">Manufacturer:</label>
            <input type="text" id="manufacturer" class="form-control {{ $errors->has('manufacturer') ? 'is-invalid' : '' }}" name="manufacturer" value="{{ old("manufacturer", $equipment->manufacturer) }}">
            <div class="invalid-feedback">
              {{ $errors->first('manufacturer') }}
            </div>
          </div>
          <div class="col-6">
            <label for="year_model" class="label">Year Model:</label>
            <input type="text" id="year_model" class="form-control {{ $errors->has('year_model') ? 'is-invalid' : '' }}" name="year_model" value="{{ old("year_model", $equipment->year_model) }}">
            <div class="invalid-feedback">
              {{ $errors->first('year_model') }}
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-6">
            <label for="department" class="label">Department:</label>
            <select name="department" id="department" class="form-control {{ $errors->has('department') ? 'is-invalid' : '' }}">
              <option value="">-- Select Department --</option>
              @foreach ($departments as $department)
                <option value="{{ $department->id }}" {{ old('department', $equipment->equipment_department_id) == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">
              {{ $errors->first('department') }}
            </div>
          </div>
          <div class="col-6">
            <label for="status" class="label">Status:</label>
            <div style="margin-top: 8px; gap: 70px;" class="d-flex ">
              <div>
                <label for="status-working">
                  <input type="radio" id="status-working" name="status" value="1" {{ $equipment->equipment_status_id == 1 ? 'checked' : '' }}> Working
                </label>
              </div>
              <div>
                <label for="status-on-repair">
                  <input type="radio" id="status-on-repair" name="status" value="2" {{ $equipment->equipment_status_id == 2 ? 'checked' : '' }}> On-repair
                </label>
              </div>
              <div>
                <label for="status-retired">
                  <input type="radio" id="status-retired" name="status" value="3" {{ $equipment->equipment_status_id == 3 ? 'checked' : '' }}> Retired
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-12">
            <label for="description" class="label">Description:</label>
            <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{ old('description', $equipment->description) }}</textarea>
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