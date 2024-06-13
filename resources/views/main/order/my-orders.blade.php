@extends('layouts.master')

@section('content')

    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{__('messages.my_orders')}}</h2>
                <ul>
                    <li><a href="{{ url('/') }}">{{__('messages.home')}}</a></li>
                    <li>{{__('messages.my_orders')}}</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="cart-area ptb-100">
        <div class="container">
            <form>
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">{{__('messages.order_number')}}</th>
                            <th scope="col" class="text-center">{{__('messages.order_date')}}</th>
                            <th scope="col" class="text-center">{{__('messages.order_total')}}</th>
                            <th scope="col" class="text-center">{{__('messages.status')}}</th>
                            <th scope="col" class="text-center">{{__('messages.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="product-name text-center">
                                    <span>{{ $order->id }}</span>
                                </td>
                                <td class="product-price text-center">
                                    <span class="unit-amount">{{ $order->created_at }}</span>
                                </td>
                                <td class="product-subtotal text-center">
                                    <span class="subtotal-amount">{{ number_format($order->total, 2) }}</span>
                                </td>
                                @if($order->status == 1)
                                    <td class="product-subtotal text-center">
                                        <span class="subtotal-amount">{{__('messages.completed')}}</span>
                                    </td>
                                @elseif($order->status == 0)
                                    <td class="product-subtotal text-center">
                                        <span class="subtotal-amount">{{__('messages.pending')}}</span>
                                    </td>
                                @endif
                                <td class="product-subtotal text-center">
                                    <a href="{{ route('order.details', ['order_id' => $order->id]) }}" class="default-btn">{{__('messages.view_order')}}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </section>
    <style>
        @media only screen and (max-width: 768px) {
            .table-responsive td:nth-of-type(1):before { content: "{{__('messages.order_number')}}"; }
            .table-responsive td:nth-of-type(2):before { content: "{{__('messages.order_date')}}"; }
            .table-responsive td:nth-of-type(3):before { content: "{{__('messages.order_total')}}"; }
            .table-responsive td:nth-of-type(4):before { content: "{{__('messages.status')}}"; }
            .table-responsive td:nth-of-type(5):before { content: "{{__('messages.action')}}"; }
        }
    </style>
@endsection
