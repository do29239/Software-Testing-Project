@extends('layouts.master')

@section('content')


    <!-- Start Checkout Area -->
    <section class="checkout-area ptb-100">
        <div class="container">


                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="billing-details">
                            <h3 class="title">{{__('messages.billing_details')}}</h3>

                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>{{__('messages.city')}}<span class="required">*</span></label>
                                        <div class="select-box">
                                            <select class="form-control" >
                                                <option>{{ Auth::user()->city }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>{{__('messages.first_name')}}<span class="required">*</span></label>
                                        <input type="text" name="first_name" value="{{ Auth::user()->first_name }}" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>{{__('messages.last_name')}}<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}" />
                                    </div>
                                </div>

                                {{--    review thiss!!!!
                                                        <div class="col-lg-12 col-md-12">--}}
                                {{--                                <div class="form-group">--}}
                                {{--                                    <label>Company Name</label>--}}
                                {{--                                    <input type="text" class="form-control" />--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>{{__('messages.address')}}<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}"/>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>{{__('messages.phone')}}<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>{{__('messages.postcode')}}<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="postcode" value="{{ Auth::user()->postcode }}" />
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>{{__('messages.email')}}<span class="required">*</span></label>
                                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        @livewire('place-order')
                    </div>

                </div>

        </div>
    </section>
    <!-- End Checkout Area -->
@endsection
