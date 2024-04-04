@extends('admin.dashboard')

@section('content')
    
<!-- Users List Table -->

<div class="row">
  <div class="col-lg-6 m-auto">
    <div class="card">
      <div class="card-header">
        <h3>Add FAQs</h3>
      </div>
      <div class="card-body"> 
        @if (session('success')) 
        <div class="alert alert-success">
          <strong>{{session('success')}}</strong>
        </div> 
        @endif 
        <form action="{{route('admin.faq.store')}}" method="POST" > 
          @csrf 
          <div class="mt-3">
            <label for="" class="form-label">Question</label>
            <input type="text" name="question" class="form-control"> 
            @error('question')
             <strong class="text-danger">{{$message}}</strong> 
            @enderror
          </div>
          <div class="mt-3">
            <label for="" class="form-label">Answer</label>
            <input type="text" name="answer" class="form-control"> 
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
            <button type="submit" class="btn btn-info">Add FAQs</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-lg-12">
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
              <th>Question</th>
              <th>Answer</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody> 
            @foreach ($faqs as $faq ) 
              <tr>
                <td>{{$faq->id}}</td>
                <td>{{$faq->question}}</td>
                <td>{{$faq->answer}}</td>
                @if($faq->active == 0)
                <td>Deactive</td>
                @elseif($faq->active == 1)
                <td>Active</td>
                @endif
                <td>
                <a href="{{route('admin.faq.edit' , $faq->id)}}"  ><i class="dripicons-document-edit text-success"></i></a>
                <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Airport?');">
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