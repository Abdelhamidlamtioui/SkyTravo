@extends('admin.dashboard')

@section('content')
    
<!-- Users List Table -->

<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        <h3>Add New Air Line Manager</h3>
      </div>
      <div class="card-body"> 
        @if (session('success_manager')) 
        <div class="alert alert-success">
          <strong>{{session('success_manager')}}</strong>
        </div> 
        @endif 
        <form action="{{route('admin.manager_insert')}}" method="POST"> @csrf <div class="mt-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name" class="form-control"> @error('name') <strong class="text-danger">{{$message}}</strong> @enderror
          </div>
          <div class="mt-3">
            <label for="" class="form-label">Email</label>
            <input type="email" name="email" class="form-control"> @error('email') <strong class="text-danger">{{$message}}</strong> @enderror
          </div>
          <div class="mt-3">
            <label for="" class="form-label">Password</label>
            <input type="password" name="password" class="form-control"> @error('password') <strong class="text-danger">{{$message}}</strong> @enderror
          </div>
          
          <div class="mt-3">
            <button type="submit" class="btn btn-info">Add User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        <h3>Add New User</h3>
      </div>
      <div class="card-body"> 
        @if (session('success_user'))
        <div class="alert alert-success">
          <strong>{{session('success_user')}}</strong>
        </div> 
        @endif 
        <form action="{{route('admin.users_insert')}}" method="POST"> @csrf <div class="mt-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name" class="form-control"> @error('name') <strong class="text-danger">{{$message}}</strong> @enderror
          </div>
          <div class="mt-3">
            <label for="" class="form-label">Email</label>
            <input type="email" name="email" class="form-control"> @error('email') <strong class="text-danger">{{$message}}</strong> @enderror
          </div>
          <div class="mt-3">
            <label for="" class="form-label">Password</label>
            <input type="password" name="password" class="form-control"> @error('password') <strong class="text-danger">{{$message}}</strong> @enderror
          </div>
          
          <div class="mt-3">
            <button type="submit" class="btn btn-info">Add User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
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
              <th>User Name</th>
              <th>User Email</th>
              <th>Role</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody> 
            @foreach ($users as $user ) 
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>role</td>
                <td>
                <a href="{{route('user.delete' , $user->id)}}" title="delete" class="delete" onclick="return confirm('Are you sure you want to delete this User')"><i class="dripicons-tag-delete text-danger"></i></a>
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