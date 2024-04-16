@extends('admin.dashboard')

@section('content')

<div class="row">

  <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Add New Review</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addReviewModal">
                    Add New Review
                </button>
            </div>
        </div>
    </div>
  </div>
  
  <!-- Add New Review Modal -->
  <div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="addReviewModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="addReviewModalLabel">Add Review</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form action="{{route('admin.review.store')}}" method="POST" > 
                  @csrf 
                  <div class="mt-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control"> 
                    @error('name')
                     <strong class="text-danger">{{$message}}</strong> 
                    @enderror
                  </div>
                  <div class="mt-3">
                    <label for="" class="form-label">Location</label>
                    <input type="text" name="location" class="form-control"> 
                    @error('location')
                     <strong class="text-danger">{{$message}}</strong> 
                    @enderror
                  </div>
        
                  <div class="mt-3">
                    <label for="" class="form-label">Review</label>
                    <input type="text" name="review" class="form-control"> 
                    @error('review')
                     <strong class="text-danger">{{$message}}</strong> 
                    @enderror
                  </div>
                  <div class="mt-3">
                    <label for="" class="form-label">Star</label>
                    <input type="number" name="star" class="form-control"> 
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
                    <button type="submit" class="btn btn-info">Add Review</button>
                  </div>
                </form>
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-12">
    @if (session('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('danger'))
      <div class="alert alert-warning">
      <strong>{{session('danger')}}</strong>
      </div>
    @endif
  </div>
<div class="col-lg-12 m-auto">
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-users table border-top">
          <thead>
            <tr>
            <td>ID</td>
              <th>Name</th>
              <th>Location</th>
              <th>Review</th>
              <th>Star</th>
              <th>Best Review</th>
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
                <td>
                  <span>
                    @for ($i=1; $i<=$review->star; $i++)
                      <i class="dripicons-star text-warning"></i>
                    @endfor
                  </span>
                </td>
                @if($review->best_review == 0)
                <td>Deactive</td>
                @elseif($review->best_review == 1)
                <td>Active</td>
                @endif
                <td>
                <a href="{{route('admin.review.edit' , $review->id)}}"  ><i class="dripicons-document-edit text-success"></i></a>
                <form action="{{ route('admin.review.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Airport?');">
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