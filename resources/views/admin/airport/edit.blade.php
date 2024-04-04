@extends('admin.dashboard')

@section('content')
    
<!-- Users List Table -->

<div class="row">
  <div class="col-lg-6 m-auto">
    <div class="card">
      <div class="card-header">
        <h3>Edit Airport</h3>
      </div>
      <div class="card-body"> 
        @if (session('success')) 
        <div class="alert alert-success">
          <strong>{{session('success')}}</strong>
        </div> 
        @endif 
        <form action="{{route('admin.airport.update' , $airport->id)}}" method="POST" enctype="multipart/form-data"> 
          @csrf 
          <div class="mt-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name" value="{{$airport->name}}" class="form-control"> 
            @error('name')
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>
          <div class="mt-3">
            <label for="" class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            <br>
            <img src="{{asset('image')}}/{{$airport->image}}" width="100px">
            @error('image') 
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>

          <div class="mt-3">
            <label for="" class="form-label">Best Destination</label>
            <select name="best_destination" id="" class="form-control">
              <option value="0" >-- Select -- </option>
              <option value="1">-- Mark As Best Destination -- </option>
            </select>
            @error('best_destination') 
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>
          
          <div class="mt-3">
            <button type="submit" class="btn btn-info">Update Airport</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>


@endsection