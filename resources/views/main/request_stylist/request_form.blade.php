@extends('layouts.master')

@section('content')
<section class="login-area ptb-100">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="login-content">
        <h2>{{__('messages.request_stylist')}}</h2>

        <form class="login-form" action="{{route('requests.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Saloon Name</label>
                <input type="text" name="saloon_name" class="form-control" placeholder="Enter your saloon name" required>
                <input type="text" name="saloon_name" class="form-control" placeholder="{{__('messages.saloon_name')}}" required>
            </div>
            <div class="form-group">
                <label>Saloon City</label>
                <input type="text" name="saloon_city" class="form-control" placeholder="Enter your saloon city" required>
                <input type="text" name="saloon_city" class="form-control" placeholder="{{__('messages.saloon_city')}}" required>
            </div>
            <div class="form-group">
                <label>Saloon Address</label>
                <input type="text" name="saloon_address" class="form-control" placeholder="Enter your saloon address" required>
                <input type="text" name="saloon_address" class="form-control" placeholder="{{__('messages.saloon_address')}}" required>
            </div>
            <div class="form-group">
                <label>Saloon Phone Number</label>
                <input type="tel" name="saloon_phone" class="form-control" placeholder="Enter your saloon phone number" required>
            </div>
            <div class="form-group">
                <h4>Redeem Stylist Code</h4>
                <input type="text" name="stylist_code" class="form-control" placeholder="Enter your stylist code">
            </div>

            <button type="submit" class="default-btn">{{__('messages.submit_req')}}</button>

        </form>
    </div>

</section>
@endsection
