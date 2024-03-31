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
            <td>ID</td>
              <th>Name</th>
              <th>Location</th>
              <th>Review</th>
              <th>Star</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody> 
            @foreach ($reviews as $review ) 
              <tr>
                <td>{{$review->id}}</td>
                <td>{{$review->name}}</td>
                <td>{{$review->location}}</td>
                <td>{{$review->review}}</td>
                <td>{{$review->star}}</td>
                <td>
                <a href="{{route('review.delete' , $review->id)}}" title="delete" class="delete" onclick="return confirm('Are you sure you want to delete this Review')"><i class="dripicons-tag-delete text-danger"></i></a>
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