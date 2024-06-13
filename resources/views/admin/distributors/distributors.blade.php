@extends('layouts.MasterAdmin')

@section('content')
    <div class="content">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8"> <!-- Adjusted for better layout with more fields -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Distributor</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('distributors.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">Distributor First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter distributor first name" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Distributor Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter distributor last name" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Distributor Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter distributor phone number" required>
                            </div>
                            <div class="form-group">
                                <label for="city">Distributor City</label>
                                <input type="text" name="city" id="city" class="form-control" placeholder="Enter Distributor City" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Distributor Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Enter Distributor Address" required>
                            </div>
                            <div class="form-group">
                                <label for="postcode">Distributor Zip</label>
                                <input type="text" name="postcode" id="postcode" class="form-control" placeholder="Enter Distributor Zip" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Distributor Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Distributor Email" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Create Distributor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Distributors</h4>
                </div>
                <div class="card-body">
                    @if(count($distributors) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="text-primary">
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($distributors as $distributor)
                                    <tr onclick="window.location='{{ route('distributors.show', $distributor) }}';" style="cursor: pointer;">
                                        <td>{{ $distributor->first_name }}</td>
                                        <td>{{ $distributor->last_name }}</td>
                                        <td>{{ $distributor->phone }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('distributors.destroy', ['distributor' => $distributor]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form  action="{{ route('distributors.edit', ['distributor' => $distributor]) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                    @else
                        <p>No Distributors found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
