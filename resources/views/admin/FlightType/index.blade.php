@extends('admin.dashboard')

@section('content')
    
<!-- Users List Table -->

<div class="row">
  <div class="col-lg-6 m-auto">
    <div class="card">
      <div class="card-header">
        <h3>Add New Flight Type</h3>
      </div>
      <div class="card-body"> 
        @if (session('success')) 
        <div class="alert alert-success">
          <strong>{{session('success')}}</strong>
        </div> 
        @endif 
        <form action="{{route('admin.flighttype.store')}}" method="POST" > 
          @csrf 
          <div class="mt-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name" class="form-control"> 
            @error('name')
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>

          
          
          <div class="mt-3">
            <button type="submit" class="btn btn-info">Add  Flight Type</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-lg-12">
    <div class="card">
        @if (session('danger'))
            <div class="alert alert-warning">
            <strong>{{session('danger')}}</strong>
            </div>
         @endif
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