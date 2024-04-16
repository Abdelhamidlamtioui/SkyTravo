@extends('admin.dashboard')

@section('content')
    
<!-- Users List Table -->
<div class="row">
  <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Add New Airport</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAirportModal">
                    Add New Airport
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add New Airport Modal -->
<div class="modal fade" id="addAirportModal" tabindex="-1" role="dialog" aria-labelledby="addAirportModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAirportModalLabel">Add New Flight type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.flighttype.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mt-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-info">Add Flight Type</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
  @if (session('success'))
      <div class="alert alert-success">
          <strong>{{ session('success') }}</strong>
      </div>
  @endif
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  @if (session('danger'))
    <div class="alert alert-warning">
    <strong>{{session('danger')}}</strong>
    </div>
  @endif
</div>

  <div class="col-lg-12">
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-users table border-top">
          <thead>
            <tr>
            <td>ID</td>
              <th>Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody> 
            @foreach ($flight_type as $flight ) 
              <tr>
                <td>{{$flight->id}}</td>
                <td>{{$flight->name}}</td>
                <td>
                <a href="{{route('admin.flighttype.edit' , $flight->id)}}"  ><i class="dripicons-document-edit text-success"></i></a>
                <form action="{{ route('admin.flighttype.destroy', $flight->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Airport?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-link p-0" style="color: red;"><i class="dripicons-trash"></i></button>
                </form>
                </td>

              </tr> 
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection