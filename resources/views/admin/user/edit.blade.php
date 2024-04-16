@extends('admin.dashboard')

@section('content')

<!-- Users List Table -->

<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>Update User</h3>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    <strong>{{ session('success') }}</strong>
                </div>
                @endif
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mt-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ $user->name }}" class="form-control" readonly>
                    </div>
                    <div class="mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ $user->email }}" class="form-control" readonly>
                    </div>
                    <div class="mt-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-control">
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-info">Update User Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection