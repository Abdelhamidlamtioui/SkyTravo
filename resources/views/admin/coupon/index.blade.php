@extends('admin.dashboard')

@section('content')
    
<!-- Users List Table -->

<div class="row">
  <!-- Users List Table -->
<div class="row">
  <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Add New Coupon</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCouponModal">
                    Add New Coupon
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add New Coupon Modal -->
<div class="modal fade" id="addCouponModal" tabindex="-1" role="dialog" aria-labelledby="addCouponModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCouponModalLabel">Add New Flight type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="{{route('admin.coupon.store')}}" method="POST" > 
                @csrf 
                <div class="mt-3">
                  <label for="" class="form-label">Code</label>
                  <input type="text" name="code" class="form-control"> 
                  @error('code')
                   <strong class="text-danger">{{$message}}</strong> 
                  @enderror
                </div>
                <div class="mt-3">
                  <label for="" class="form-label">Discount</label>
                  <input type="number" name="discount" class="form-control"> 
                  @error('answer')
                   <strong class="text-danger">{{$message}}</strong> 
                  @enderror
                </div>
      
                <div class="mt-3">
                  <label for="" class="form-label">Valid From</label>
                  <input type="date" name="valid_from" class="form-control"> 
                  @error('valid_from')
                   <strong class="text-danger">{{$message}}</strong> 
                  @enderror
                </div>
                <div class="mt-3">
                  <label for="" class="form-label">Valid Until</label>
                  <input type="date" name="valid_until" class="form-control"> 
                  @error('valid_until')
                   <strong class="text-danger">{{$message}}</strong> 
                  @enderror
                </div>
      
                <div class="mt-3">
                  <label for="" class="form-label">Discount Type</label>
                  <select name="discount_type" id="" class="form-control">
                    <option value="fixed">-- Fixed -- </option>
                    <option value="percentage">-- Percentage(%) -- </option>
                  </select>
                  @error('discount_type') 
                   <strong class="text-danger">{{$message}}</strong> 
                  @enderror
                </div>
                
                <div class="mt-3">
                  <button type="submit" class="btn btn-info">Add Coupon</button>
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



  <div class="col-lg-12">
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-users table border-top">
          <thead>
            <tr>
            <td>ID</td>
              <th>Code</th>
              <th>Discount</th>
              <th>Discount Type</th>
              <th>Valid From</th>
              <th>Valid Until</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody> 
            @foreach ($coupons as $coupon ) 
              <tr>
                <td>{{$coupon->id}}</td>
                <td>{{$coupon->code}}</td>
                <td>{{$coupon->discount}}</td>
                <td>{{$coupon->discount_type}}</td>
                <td>{{$coupon->valid_from}}</td>
                <td>{{$coupon->valid_until}}</td>
                <td>
                <a href="{{route('admin.coupon.edit' , $coupon->id)}}"  ><i class="dripicons-document-edit text-success"></i></a>
                <form action="{{ route('admin.coupon.destroy', $coupon->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Coupon?');">
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