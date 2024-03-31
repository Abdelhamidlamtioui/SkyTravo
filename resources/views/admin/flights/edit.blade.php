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
        @if (session('warning'))
            <div class="alert alert-warning">
            <strong>{{session('warning')}}</strong>
            </div>
        @endif
            <form action="{{route('admin.flights.update' , $flight->id)}}" method="POST">
                @csrf 
                <div class="mt-3">
                    <label for="" class="form-label">Airline name</label>
                    <input type="text" name="airline" value="{{$flight->airline}}" class="form-control">
                    @error('airline')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="" class="form-label">Origin name</label>
                    <input type="text" name="origin" value="{{$flight->origin}}" class="form-control">
                    @error('origin') 
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="" class="form-label">Destination</label>
                    <input type="text" name="destination" value="{{$flight->destination}}" class="form-control">
                    @error('destination') 
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="" class="form-label">Departure Time</label>
                    <input type="datetime-local" name="departure_at" value="{{$flight->departure_at}}" class="form-control">
                    @error('departure_at') 
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="" class="form-label">Arrival Time</label>
                    <input type="datetime-local" name="arrival_at" value="{{$flight->arrival_at}}" class="form-control">
                    @error('arrival_at') 
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="" class="form-label">Price</label>
                    <input type="text" name="price" value="{{$flight->price}}" class="form-control">
                    @error('price') 
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-info">Update Flight</button>
            </div>
            
            </form>
      </div>
    </div>
  </div>
</div>

@endsection