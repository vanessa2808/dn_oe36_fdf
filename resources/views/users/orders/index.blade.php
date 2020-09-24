@section('content')
    @extends('users.layouts.master')

    @if( session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif

    <section class="breadcrumb-section set-bg" data-setbg="user_layouts/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>@lang('messages.order.order_product')</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">@lang('messages.cart.home')</a>
                            <span>@lang('messages.cart.shopping_cart')</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">@lang('messages.cart.product_name')</th>
                                <th>@lang('messages.cart.status')</th>
                                <th>@lang('messages.cart.quantity')</th>
                                <th>@lang('messages.cart.total')</th>
                                <th>@lang('messages.product.create_at')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderDetail_list as $key => $orderDetail)
                            @foreach($order_list as $key => $order)
                                @if(Auth::user()->id === $order->user_id)
                                    <tr>
                                        <td>{{$orderDetail->product->product_name}}</td>
                                        <td class="shoping__cart__price">
                                            <h5>
                                                @if($order->status == 0)
                                                    @lang('messages.order.receive')
                                                @else
                                                    @lang('messages.order.confirm')
                                                @endif
                                            </h5>
                                        </td>
                                        <td>{{$orderDetail->quantity}}</td>
                                        <td class="shoping__cart__item">
                                            <h5>{{$order->total_price}}</h5>
                                        </td>
                                        <td>{{$order->created_at}}</td>
                                    </tr>
                                @endif
                            @endforeach
                            @endforeach
                            </tbody>
                            @if($order_list->hasPages())
                                {{ $order_list->links() }}
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
