@extends('admin.dashboard')

@section('content')
 
<div class="row">
  <div class="col-lg-12 m-auto">
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
              <th>ID</th>
              <th>Airline</th>
              <th>Origin</th>
              <th>Destination</th>
              <th>Departure Time</th>
              <th>Arrival Time</th>
              <th>Price</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody> 
            @foreach ($flights as $flight ) 
              <tr>
                <td>{{$flight->id}}</td>
                <td>{{$flight->airline}}</td>
                <td>{{$flight->origin}}</td>
                <td>{{$flight->destination}}</td>
                <td>{{$flight->departure_at}}</td>
                <td>{{$flight->arrival_at}}</td>
                <td>{{$flight->price}}</td>
                <td>{{$flight->status}}</td>
                <td>{{$flight->created_at->format('Y-m-d H:m A')}}</td>
                <td>

                    @if ($userRole == 'admin')

                        @if($flight->status == 'rejected')
                            <a href="{{route('admin.flights.approve', $flight->id)}}"><i class="dripicons-checkmark text-success"></i></a>
                        @elseif($flight->status == 'approved')
                            <a href="{{route('admin.flights.reject' , $flight->id)}}"><i class="dripicons-cross text-success"></i></a>
                        @else
                            <a href="{{route('admin.flights.approve', $flight->id)}}"><i class="dripicons-checkmark text-success"></i></a>
                            <a href="{{route('admin.flights.reject' , $flight->id)}}"><i class="dripicons-cross text-success"></i></a>
                        @endif
                        
                    @endif

                    <a href="{{route('admin.flights.edit' ,  $flight->id)}}"><i class="dripicons-document-edit text-success"></i></a>

                    <a href="{{route('flight.delete' , $flight->id)}}" title="delete" class="delete" onclick="return confirm('Are you sure you want to delete this Flight')"><i class="dripicons-tag-delete text-danger"></i></a>


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