@extends('layouts.master')

@section('content')

    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{__('messages.my_account')}}</h2>
                <ul>
                    <li><a href="{{ url('/') }}">{{__('messages.home')}}</a></li>
                    <li>{{__('messages.my_account')}}</li>
                </ul>
                @if(Session('message'))
                    <div>{{session('message')}}</div>
                @endif
            </div>
        </div>
    </div>
    <!-- Start Profile Area -->
    <section class="profile-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="profile-form">
                        <!-- Update Profile Information -->
                        <div class="profile-section">
                            <h3>{{ __('Profile Settings') }}</h3>
                            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('patch')

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('First Name') }} <span>*</span></label>
                                            <input type="text" name="first_name" id="first_name" class="form-control" required value="{{ old('first_name', $user->first_name) }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('Last Name') }} <span>*</span></label>
                                            <input type="text" name="last_name" id="last_name" class="form-control" required value="{{ old('last_name', $user->last_name) }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('Phone') }} <span>*</span></label>
                                            <input type="text" name="phone" id="phone" class="form-control" required value="{{ old('phone', $user->phone) }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('City') }} <span>*</span></label>
                                            <input type="text" name="city" id="city" class="form-control" required value="{{ old('city', $user->city) }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('Address') }} <span>*</span></label>
                                            <input type="text" name="address" id="address" class="form-control" required value="{{ old('address', $user->address) }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('Postcode') }} <span>*</span></label>
                                            <input type="text" name="postcode" id="postcode" class="form-control" required value="{{ old('postcode', $user->postcode) }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('Email') }} <span>*</span></label>
                                            <input type="email" name="email" id="email" class="form-control" required value="{{ old('email', $user->email) }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    @if ($user->role == 2) {{-- Assuming 3 is the role for stylists --}}
                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('Saloon Name') }} <span>*</span></label>
                                            <input type="text" name="saloon_name" id="saloon_name" class="form-control" required value="{{ old('saloon_name', $user->stylistProfile->saloon_name ?? '') }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('Saloon Address') }} <span>*</span></label>
                                            <input type="text" name="saloon_address" id="saloon_address" class="form-control" required value="{{ old('saloon_address', $user->stylistProfile->saloon_address ?? '') }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('Saloon City') }} <span>*</span></label>
                                            <input type="text" name="saloon_city" id="saloon_city" class="form-control" required value="{{ old('saloon_city', $user->stylistProfile->saloon_city ?? '') }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('Saloon Phone') }} <span>*</span></label>
                                            <input type="text" name="saloon_phone" id="saloon_phone" class="form-control" required value="{{ old('saloon_phone', $user->stylistProfile->saloon_phone ?? '') }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">{{ __('Save Profile') }}</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Change Password -->
                        <div class="profile-section mt-4">
                            <h3>{{ __('Change Password') }}</h3>
                            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('Current Password') }} <span>*</span></label>
                                            <input type="password" name="current_password" id="current_password" class="form-control" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('New Password') }} <span>*</span></label>
                                            <input type="password" name="password" id="password" class="form-control" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('Confirm New Password') }} <span>*</span></label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">{{ __('Change Password') }}</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Delete Account -->
                        <div class="profile-section mt-4">
                            <h3>{{ __('Delete Account') }}</h3>
                            <form method="post" action="{{ route('profile.destroy') }}" class="mt-6 space-y-6" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                                @csrf
                                @method('delete')

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>{{ __('Password') }} <span>*</span></label>
                                            <input type="password" name="password" id="password" class="form-control" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn btn-danger">{{ __('Delete Account') }}</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Profile Area -->
@endsection
