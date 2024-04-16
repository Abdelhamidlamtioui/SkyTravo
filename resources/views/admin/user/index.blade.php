@extends('admin.dashboard')

@section('content')
    
<!-- Users List Table -->
<div class="row">
  <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Add New User</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                    Add New User
                </button>
            </div>
        </div>
    </div>
  </div>
  
  <!-- Add New User Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form action="{{route('admin.user.store')}}" method="POST"> @csrf <div class="mt-3">
                  <label for="" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control"> @error('name') <strong class="text-danger">{{$message}}</strong> @enderror
                </div>
                <div class="mt-3">
                  <label for="" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control"> @error('email') <strong class="text-danger">{{$message}}</strong> @enderror
                </div>
                <div class="mt-3">
                  <label for="" class="form-label">Role</label>
                  <select name="role" id="" class="form-control">
                    <option value="">-- Select -- </option>
                    @foreach ($roles as $role )
                      <option value="{{$role->id}}">-- {{$role->name}} -- </option>
                    @endforeach
                  </select>
                  @error('role') 
                   <strong class="text-danger">{{$message}}</strong> 
                  @enderror
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
                <td>
                  @foreach ($user->roles as $role)
                      {{ $role->name }}
                      @if (!$loop->last)
                          , 
                      @endif
                  @endforeach
                </td>
                <td>
                  <a href="{{route('admin.user.edit' , $user->id)}}"  ><i class="dripicons-document-edit text-success"></i></a>
                  <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Airport?');">
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