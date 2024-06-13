@extends('layouts.Masteradmin')

@section('content')
    <div class="content">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="centered-card" >
                    <div class="card  card-half">
                        <div class="card-body">
                            <div class="card-body">
                                <h2>Stylist Details</h2>
                                <table class="table table-bordered">
                                    <tr>
                                        <td><strong>Saloon Name:</strong></td>
                                        <td>{{ $code->user && $code->user->profile ? $code->user->profile->saloon_name : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Saloon City:</strong></td>
                                        <td>{{ $code->user && $code->user->profile ? $code->user->profile->saloon_city : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Saloon Address</strong></td>
                                        <td>{{ $code->user && $code->user->profile ? $code->user->profile->saloon_address : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Saloon Phone</strong></td>
                                        <td>{{ $code->user && $code->user->profile ? $code->user->profile->saloon_phone : 'N/A' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="centered-card" >
                    <div class="card  card-half">
                        <div class="card-body">
                            <div class="card-body">
                                <h2>User Details</h2>
                                <table class="table table-bordered">
                                    <tr>
                                        <td><strong>First Name:</strong></td>
                                        <td>{{ $code->user ? $code->user->first_name . ' ' . $code->user->last_name : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>City:</strong></td>
                                        <td>{{ $code->user ? $code->user->city : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Address:</strong></td>
                                        <td>{{ $code->user ? $code->user->address : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Postcode / Zip:</strong></td>
                                        <td>{{ $code->user ? $code->user->postcode : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone:</strong></td>
                                        <td>{{ $code->user ? $code->user->phone : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email Address:</strong></td>
                                        <td>{{ $code->user ? $code->user->email : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Creator Name:</strong></td>
                                        <td>{{ $code->creator ? $code->creator->first_name . ' ' . $code->creator->last_name : 'N/A' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
