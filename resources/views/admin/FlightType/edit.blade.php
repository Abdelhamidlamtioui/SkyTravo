@extends('admin.dashboard')

@section('content')
    
<!-- Users List Table -->

<div class="row">
  <div class="col-lg-6 m-auto">
    <div class="card">
      <div class="card-header">
        <h3>Edit Flight Type</h3>
      </div>
      <div class="card-body"> 
        @if (session('success')) 
        <div class="alert alert-success">
          <strong>{{session('success')}}</strong>
        </div> 
        @endif 
        <form action="{{route('admin.flight_type.update' , $flight_type->id)}}" method="POST"> 
          @csrf 
          <div class="mt-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name" value="{{$flight_type->name}}" class="form-control"> 
            @error('name')
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>
          
          <div class="mt-3">
            <button type="submit" class="btn btn-info">Update Flight Type</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>


@endsection