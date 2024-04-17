@extends('admin.dashboard')

@section('content')
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Add New Flight</h3>
                    <form method="POST" action="{{route('admin.flight.create')}}">
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
                            @foreach ($flights as $flight)
                                <tr>
                                  <td>{{ $flight->id }}</td>
                                  <td>{{ optional($flight->airline)->name ?? 'N/A' }}</td>
                                  <td>{{ optional($flight->originairport)->name ?? 'N/A' }}</td>
                                  <td>{{ optional($flight->destinationairport)->name ?? 'N/A' }}</td>
                                  <td>{{ $flight->departure_at }}</td>
                                  <td>{{ $flight->arrival_at }}</td>
                                  <td>{{ $flight->status_text }}</td> <!-- Assuming you've implemented the accessor as earlier discussed -->
                                  <td>
                                      @if ($flight->status == 1) <!-- Adjusted to use numeric status -->
                                          <a href="{{ route('admin.flight.approve', $flight->id) }}">
                                              <i class="dripicons-checkmark text-success"></i>
                                          </a>
                                      @elseif($flight->status == 2)
                                          <a href="{{ route('admin.flight.reject', $flight->id) }}"><i class="dripicons-cross text-success"></i></a>
                                      @else
                                          <a href="{{ route('admin.flight.approve', $flight->id) }}"><i class="dripicons-checkmark text-success"></i></a>
                                          <a href="{{ route('admin.flight.reject', $flight->id) }}"><i class="dripicons-cross text-success"></i></a>
                                      @endif
                                      {{-- <a href="{{ route('admin.flight.edit', $flight->id) }}">
                                          <i class="dripicons-document-edit text-success"></i>
                                      </a> --}}
                                      <form action="{{ route('admin.flight.destroy', $flight->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this flight?');">
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
