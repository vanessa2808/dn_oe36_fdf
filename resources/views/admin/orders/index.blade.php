@section('content')
    @extends('admin.layouts.master')
@section('title', 'admin')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('messages.users.list_user')</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>@lang('messages.orders.id')</th>
                                <th>@lang('messages.orders.user_id')</th>
                                <th>@lang('messages.orders.total_price')</th>
                                <th>@lang('messages.orders.status')</th>
                                <th>@lang('messages.orders.create_at')</th>
                                <th>@lang('messages.orders.update_at')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_list as $key => $order)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$order->user->user_name}}</td>
                                    <td>{{$order->total_price}}</td>
                                    <td>
                                        <input data-id="{{$order->id}}" class="toggle-class" type="checkbox"  data-on="Active" data-off="InActive" {{ $order->status ? 'checked' : '' }}>

                                    </td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->updated_at}}</td>
                                    <td>
                                        <form method="POST" action="{{asset('admin/orders/'.$order->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <td>
                                        <input type="submit" name="submit" value="@lang('messages.orders.delete')"
                                               class="btn btn-danger rounded-circle ml-3"
                                               id="button">
                                    </td>
                                    </form>
                                    </td>
                                    <td>
                                        <a href="{{route('orders.show',$order->id)}}"
                                           class="btn btn-primary rounded-circle ml-3"><i
                                                class="fas fa-pen text-white">@lang('messages.orders.show_detail')</i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($order_list->hasPages())
        {{ $order_list->links() }}
    @endif
</section>
@endsection
