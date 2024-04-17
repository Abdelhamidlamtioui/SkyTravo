@extends('airlinemanager.dashboard')

@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Add New Flight</h3>
                <form method="POST" action="{{route('airlinemanager.flight.create')}}">
                    @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addAirportModal">
                        Add New Flight
                    </button>
                </form>
            </div>
        </div>
    </div>
  </div>
  <div class="col-lg-12 m-auto">
    <div class="card">
       
      <div class="card-datatable table-responsive">
        <table class="datatables-users table border-top">
          <thead>
            <tr>
              <th>ID</th>
              <th>Airline</th>
              <th>Origin</th>
              <th>Destination</th>
              <th>Departure Time</th>
              <th>Arrival Time</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($flights as $flight )
              <tr>
                <td>{{$flight->id}}</td>
                <td>{{$flight->airline->name}}</td>
                <td>{{$flight->originairport->name}}</td>
                <td>{{$flight->destinationairport->name}}</td>
                <td>{{$flight->departure_at}}</td>
                <td>{{$flight->arrival_at}}</td>
                <td>{{ $flight->status_text }}</td>
                <td>
                    <a href="{{route('airlinemanager.flight.edit' ,  $flight->id)}}"><i class="dripicons-document-edit text-success"></i></a>
                    <form action="{{ route('airlinemanager.flight.destroy', $flight->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Coupon?');">
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
