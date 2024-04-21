@extends('airlinemanager.dashboard')

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
              <th>Price</th>
              <th>Status</th>
              <th>Created At</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bookings as $booking )
              <tr>
                <td>{{$booking->id ?? ''}}</td>
                <td>{{$booking->total_price ?? '' }}</td>
                <td>{{$booking->status ?? '' }}</td>
                <td>{{$booking->created_at->format('Y-m-d H:m A') ?? '' }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection
