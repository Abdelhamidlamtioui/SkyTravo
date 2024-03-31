@extends('admin.dashboard')

@section('content')
 
<div class="row">
  <div class="col-lg-6 m-auto">
    <div class="card">
      <div class="card-header">
        <h3>Add new User</h3>
      </div>
      <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
            <strong>{{session('success')}}</strong>
            </div>
         @endif
            <form action="{{route('admin.flights.insert')}}" method="POST">
                @csrf 
                <div class="mt-3">
                    <label for="" class="form-label">Airline name</label>
                    <input type="text" name="airline" class="form-control">
                    @error('airline')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="" class="form-label">Origin name</label>
                    <input type="text" name="origin" class="form-control">
                    @error('origin') 
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="" class="form-label">Destination</label>
                    <input type="text" name="destination" class="form-control">
                    @error('destination') 
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="" class="form-label">Departure Time</label>
                    <input type="datetime-local" name="departure_at" class="form-control">
                    @error('departure_at') 
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="" class="form-label">Arrival Time</label>
                    <input type="datetime-local" name="arrival_at" class="form-control">
                    @error('arrival_at') 
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control">
                    @error('price') 
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-info">Add Flight</button>
            </div>
            
            </form>
      </div>
    </div>
  </div>
</div>

@endsection