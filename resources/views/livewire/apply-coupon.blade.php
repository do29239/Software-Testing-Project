<div class="payment-box">
    <div class="form-group">
        <input type="text" wire:model="couponCode" class="form-control" placeholder="{{__('messages.apply_coupon')}}" optional>
        @if($errorMessage)
            <div class="alert alert-danger">{{ $errorMessage }}</div>
        @endif
    </div>
    <button wire:click.prevent="applyCoupon" class="default-btn">{{__('messages.apply_coupon')}}</button>
</div>
