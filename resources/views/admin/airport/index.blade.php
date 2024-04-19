@extends('admin.dashboard')

@section('content')

<!-- Users List Table -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Add New Airport</h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAirportModal">
                        Add New Airport
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Airport Modal -->
    <div class="modal fade" id="addAirportModal" tabindex="-1" role="dialog" aria-labelledby="addAirportModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAirportModalLabel">Add New Airport</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.airport.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="" class="form-label">Code</label>
                            <input type="text" name="code" class="form-control">
                            @error('code')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="" class="form-label">Best Destination</label>
                            <select name="best_destination" class="form-control">
                                <option value="0">-- Select --</option>
                                <option value="1">-- Mark As Best Destination --</option>
                            </select>
                            @error('best_destination')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-info">Add Airport</button>
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Best Destination</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($airport as $air)
                            <tr>
                                <td>{{ $air->id }}</td>
                                <td>
                                    <img src="{{ $air->getFirstMediaUrl('media/AirportImage') ?? '' }}"
                                        alt="Airline Logo" width="100px">
                                </td>
                                <td>{{ $air->name }}</td>
                                @if($air->best_destination == 0)
                                    <td>Not Selected</td>
                                @elseif($air->best_destination == 1)
                                    <td>Best Destination Selected</td>
                                @endif
                                <td>
                                    <a href="{{ route('admin.airport.edit', $air->id) }}"><i
                                            class="dripicons-document-edit text-success"></i></a>
                                    <form action="{{ route('admin.airport.destroy', $air->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this Airport?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link p-0" style="color: red;"><i
                                                class="dripicons-trash"></i></button>
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
