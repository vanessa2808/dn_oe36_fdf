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
                                <th>@lang('messages.product.id')</th>
                                <th>@lang('messages.cart.product_name')</th>
                                <th>@lang('messages.cart.quantity')</th>
                                <th>@lang('messages.cart.price')</th>
                                <th>@lang('messages.product.create_at')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_list as $key => $order)
                                @foreach($order->order_details as $key=>$order_detail)
                                    @if(Auth::user()->user_name === $order->user->user_name)
                                        <tr>
                                            <td>{{$key +1}}</td>
                                            <td>
                                                {{$order_detail->product->product_name}}
                                            </td>
                                            <td>
                                                {{$order_detail->quantity}}
                                            </td>
                                            <td>
                                                {{$order_detail->quantity * $order_detail->product->price}}
                                            </td>
                                            <td>
                                                {{$order->created_at}}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($order_list->hasPages())
            {{ $order_list->links() }}
        @endif
    </section>
@endsection
