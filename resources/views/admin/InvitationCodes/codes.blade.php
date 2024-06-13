@extends('layouts.MasterAdmin')

@section('content')
    <div class="content">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8"> <!-- Adjusted for better layout with more fields -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Generate Code</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('codes.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block">Generate Code</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Expires At</th>
                    <th>Created By</th>
                    <th>Used By</th>
                    <th>Saloon Name</th>
                    <th>Saloon City</th>
                    <th>Saloon Address</th>
                    <th>Saloon Phone</th>
                </tr>
                </thead>
                <tbody>
                @foreach($codes as $code)
                    <tr onclick="window.location='{{ route('codes.show', $code->id) }}';" style="cursor: pointer;">
                        <td>{{ $code->code }}</td>
                        <td>{{ $code->expires_at }}</td>
                        <td>{{ $code->creator ? $code->creator->first_name . ' ' . $code->creator->last_name : 'N/A' }}</td>
                        <td>{{ $code->user ? $code->user->first_name . ' ' . $code->user->last_name : 'N/A' }}</td>
                        <td>{{ $code->user && $code->user->profile ? $code->user->profile->saloon_name : 'N/A' }}</td>
                        <td>{{ $code->user && $code->user->profile ? $code->user->profile->saloon_city : 'N/A' }}</td>
                        <td>{{ $code->user && $code->user->profile ? $code->user->profile->saloon_address : 'N/A' }}</td>
                        <td>{{ $code->user && $code->user->profile ? $code->user->profile->saloon_phone : 'N/A' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection
