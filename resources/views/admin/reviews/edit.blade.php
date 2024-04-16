@extends('admin.dashboard')

@section('content')

<div class="row">

<div class="col-lg-6 m-auto">
    <div class="card">
      <div class="card-header">
        <h3>Edit Reviews</h3>
      </div>
      <div class="card-body"> 
        @if (session('success')) 
        <div class="alert alert-success">
          <strong>{{session('success')}}</strong>
        </div> 
        @endif 
        <form action="{{route('admin.review.update' , $reviews->id)}}" method="POST" > 
          @csrf 
          @method("PATCH")
          <div class="mt-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name" value="{{$reviews->name}}" class="form-control"> 
            @error('name')
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>
          <div class="mt-3">
            <label for="" class="form-label">Location</label>
            <input type="text" name="location" value="{{$reviews->location}}" class="form-control"> 
            @error('location')
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>

          <div class="mt-3">
            <label for="" class="form-label">Review</label>
            <input type="text" name="review" value="{{$reviews->review}}" class="form-control"> 
            @error('review')
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>
          <div class="mt-3">
            <label for="" class="form-label">Star</label>
            <input type="number" name="star" value="{{$reviews->star}}" class="form-control"> 
            @error('star')
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>

          <div class="mt-3">
            <label for="" class="form-label">Best Review</label>
            <select name="best_review" id="" class="form-control">
              <option value="1">-- Active -- </option>
              <option value="0">-- Deactive -- </option>
            </select>
            @error('best_review') 
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>
          
          <div class="mt-3">
            <button type="submit" class="btn btn-info">Update Review</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection