@extends('admin.dashboard')

@section('content')
    
<!-- Users List Table -->

<div class="row">
  <div class="col-lg-6 m-auto">
    <div class="card">
      <div class="card-header">
        <h3>Update Coupon</h3>
      </div>
      <div class="card-body"> 
        @if (session('success')) 
        <div class="alert alert-success">
          <strong>{{session('success')}}</strong>
        </div> 
        @endif 
        <form action="{{route('admin.coupon.update' , $coupons->id)}}" method="POST" > 
          @csrf
          @method("PATCH")
          <div class="mt-3">
            <label for="" class="form-label">Code</label>
            <input type="text" name="code" value="{{$coupons->code}}" class="form-control"> 
            @error('code')
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>
          <div class="mt-3">
            <label for="" class="form-label">Discount</label>
            <input type="number" name="discount" value="{{$coupons->discount}}" class="form-control"> 
            @error('answer')
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>

          <div class="mt-3">
            <label for="" class="form-label">Valid From</label>
            <input type="date" name="valid_from" value="{{ $coupons->valid_from}}" class="form-control"> 
            @error('valid_from')
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>
          <div class="mt-3">
            <label for="" class="form-label">Valid Until</label>
            <input type="date" name="valid_until" value="{{ $coupons->valid_until}}" class="form-control"> 
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
            <button type="submit" class="btn btn-info">Update Coupon</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>


@endsection