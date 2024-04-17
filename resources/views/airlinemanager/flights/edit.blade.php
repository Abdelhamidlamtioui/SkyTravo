@extends('airlinemanager.dashboard')

@section('content')
 
<div class="row">
  <div class="col-lg-10 m-auto">
    <div class="card">
      <div class="card-header">
        <h3>Add Update Flight</h3>
      </div>
      <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
            <strong>{{session('success')}}</strong>
            </div>
         @endif
            <form action="{{route('airlinemanager.flight.update' , $flight->id)}}" method="post">
                @csrf 
                @method('PATCH')
                <div class="row">

                    <div class="col-md-6">
                        <div class="mt-3">
                            <label for="" class="form-label">Origin Airport</label>
                            <select name="origin_airport_id" class="form-control">
                                    <option value="">-- Select --</option>
                                @foreach ($airports as $airport)
                                    <option value="{{$airport->id}}">{{$airport->name}}</option>
                                @endforeach
                            </select>
                            @error('origin_airport_id')
                                <strong class="text-danger mt-2">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mt-3">
                            <label for="" class="form-label">Destination Airport</label>
                            <select name="destination_airport_id" class="form-control">
                                    <option value="">-- Select --</option>
                                @foreach ($airports as $airport)
                                    <option value="{{$airport->id}}">{{$airport->name}}</option>
                                @endforeach
                            </select>
                            @error('destination_airport_id')
                                <strong class="text-danger mt-2">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mt-3">
                            <label for="" class="form-label">Departure Time</label>
                            <input type="datetime-local" name="departure_at" value="{{$flight->departure_at}}" class="form-control"> 
                                @error('departure_at')
                                <strong class="text-danger">{{$message}}</strong> 
                                @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mt-3">
                            <label for="" class="form-label">Arrival Time</label>
                            <input type="datetime-local" name="arrival_at" value="{{$flight->arrival_at}}" class="form-control"> 
                                @error('arrival_at')
                                <strong class="text-danger">{{$message}}</strong> 
                                @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mt-3">
                            <label for="" class="form-label">Economy Price</label>
                            <input type="number" name="economy_price" value="{{$flight->economy_price}}" class="form-control"> 
                                @error('economy_price')
                                <strong class="text-danger">{{$message}}</strong> 
                                @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mt-3">
                            <label for="" class="form-label">Premium Economy Price</label>
                            <input type="number" name="premium_economy_price" value="{{$flight->premium_economy_price}}" class="form-control"> 
                                @error('premium_economy_price')
                                <strong class="text-danger">{{$message}}</strong> 
                                @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mt-3">
                            <label for="" class="form-label">Business Class Price</label>
                            <input type="number" name="business_class_price" value="{{$flight->business_class_price}}" class="form-control"> 
                                @error('business_class_price')
                                <strong class="text-danger">{{$message}}</strong> 
                                @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mt-3">
                            <label for="" class="form-label">First Class Price</label>
                            <input type="number" name="first_class_price" value="{{$flight->first_class_price}}" class="form-control"> 
                                @error('first_class_price')
                                <strong class="text-danger">{{$message}}</strong> 
                                @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mt-3">
                            <label for="" class="form-label">Economy Seats</label>
                            <input type="number" name="economy_seats" value="{{$flight->economy_seats}}" class="form-control"> 
                                @error('economy_seats')
                                <strong class="text-danger">{{$message}}</strong> 
                                @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mt-3">
                            <label for="" class="form-label">Premium Economy Seats</label>
                            <input type="number" name="premium_economy_seats" value="{{$flight->premium_economy_seats}}" class="form-control"> 
                                @error('premium_economy_seats')
                                <strong class="text-danger">{{$message}}</strong> 
                                @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mt-3">
                            <label for="" class="form-label">Business Class Seats</label>
                            <input type="number" name="business_class_seats" value="{{$flight->business_class_seats}}" class="form-control"> 
                                @error('business_class_seats')
                                <strong class="text-danger">{{$message}}</strong> 
                                @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mt-3">
                            <label for="" class="form-label">First Class Seats</label>
                            <input type="number" name="first_class_seats" value="{{$flight->first_class_seats}}" class="form-control"> 
                                @error('first_class_seats')
                                <strong class="text-danger">{{$message}}</strong> 
                                @enderror
                        </div>
                    </div>
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