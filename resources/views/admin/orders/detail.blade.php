@section('content')
    @extends('admin.layouts.master')
@section('title', 'admin')

<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>@lang('messages.orders.id')</th>
            <th>@lang('messages.orders.user_id')</th>
            <th>@lang('messages.orders.total_price')</th>
            <th>@lang('messages.orders.status')</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$order->user->user_name}}</td>
                <td>{{$order->total_price}}</td>
                <td>
                    <input data-id="{{$order->id}}" class="toggle-class" type="checkbox"  data-on="Active" data-off="InActive" {{ $order->status ? 'checked' : '' }}>

                </td>
                <td>{{$order->product_name}}</td>
                <td>{{$order->updated_at}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
