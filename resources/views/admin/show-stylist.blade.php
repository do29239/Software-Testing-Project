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
                                        <td>{{ $user->profile ? $user->profile->saloon_name : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Saloon City:</strong></td>
                                        <td>{{ $user->profile ? $user->profile->saloon_city : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Saloon Address:</strong></td>
                                        <td>{{ $user->profile ? $user->profile->saloon_address : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Saloon Phone</strong></td>
                                        <td>{{ $user->profile ? $user->profile->saloon_phone : 'N/A' }}</td>
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
                                        <td>{{ $user ? $user->first_name . ' ' . $user->last_name : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>City:</strong></td>
                                        <td>{{ $user->city }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Address:</strong></td>
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Postcode / Zip:</strong></td>
                                        <td>{{ $user->postcode }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone:</strong></td>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email Address:</strong></td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
