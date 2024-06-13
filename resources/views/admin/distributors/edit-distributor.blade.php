@extends('layouts.MasterAdmin')

@section('content')
    <div class="content">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Distributor</h4>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form action="{{ route('distributors.update', ['distributor' => $distributor->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="first_name">Distributor First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter distributor first name" value="{{ $distributor->first_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Distributor Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter distributor last name" value="{{$distributor->last_name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Distributor Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter distributor phone number" value="{{ $distributor->phone }}" required>
                            </div>
                            <div class="form-group">
                                <label for="city">Distributor City</label>
                                <input type="text" name="city" id="city" class="form-control" placeholder="Enter Distributor City" value="{{ $distributor->city }}" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Distributor Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Enter Distributor Address" value="{{ $distributor->address }}" required>
                            </div>
                            <div class="form-group">
                                <label for="postcode">Distributor Zip</label>
                                <input type="text" name="postcode" id="postcode" class="form-control" placeholder="Enter Distributor Zip" value="{{ $distributor->postcode }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Distributor Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Distributor Email" value="{{ $distributor->email }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Update Distributor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
