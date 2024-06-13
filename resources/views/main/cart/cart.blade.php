@extends('layouts.master')

@section('content')

    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{__('messages.my_cart')}}</h2>
                <ul>
                    <li><a href="{{url('/')}}">{{__('messages.home')}}</a></li>
                    <li>{{__('messages.my_cart')}}</li>
                </ul>
            </div>
        </div>
    </div>
<!-- Start Cart Area -->
<section class="cart-area ptb-100">
    <div class="container">
        <form>
            <livewire:cart.show-cart :view="'show-cart'" />

        </form>
    </div>
</section>
<!-- End Cart Area -->
@endsection
