@extends('admin.dashboard')

@section('content')
    
<!-- Users List Table -->

<div class="row">
  <div class="col-lg-6 m-auto">
    <div class="card">
      <div class="card-header">
        <h3>Update FAQs</h3>
      </div>
      <div class="card-body"> 
        @if (session('success')) 
        <div class="alert alert-success">
          <strong>{{session('success')}}</strong>
        </div> 
        @endif 
        <form action="{{route('admin.faq.update' , $faqs->id)}}" method="POST" > 
          @csrf 
          <div class="mt-3">
            <label for="" class="form-label">Question</label>
            <input type="text" name="question" value="{{$faqs->question}}" class="form-control"> 
            @error('question')
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>
          <div class="mt-3">
            <label for="" class="form-label">Answer</label>
            <input type="text" name="answer" value="{{$faqs->answer}}" class="form-control"> 
            @error('answer')
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>

          <div class="mt-3">
            <label for="" class="form-label">Status</label>
            <select name="active" id="" class="form-control">
              <option value="1">-- Active -- </option>
              <option value="0">-- Deactive -- </option>
            </select>
            @error('active') 
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>
          
          <div class="mt-3">
            <button type="submit" class="btn btn-info">Update FAQs</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>


@endsection