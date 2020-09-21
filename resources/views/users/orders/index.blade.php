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
                                <th>@lang('messages.cart.price')</th>
                                <th>@lang('messages.cart.image')</th>
                                <th>@lang('messages.cart.quantity')</th>
                                <th>@lang('messages.cart.total')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="shoping__cart__item">
                                    <h5>{{  }}</h5>
                                </td>
                                <td class="shoping__cart__price">

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
