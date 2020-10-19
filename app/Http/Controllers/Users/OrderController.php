<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailToUser;
use App\Mail\customerOrder;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Repositories\Eloquent\OrderRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\OrderDetaiRepositoryInterface;
use Mail;
use App\Models\User;
use Notification;
use Pusher\Pusher;
use App\Notifications\ReceiveOrder;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->middleware('auth');
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $order_list = $this->orderRepository->getOrders();
        return view('users.orders.index', compact(['order_list']));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        if ($this->orderRepository->createOrder($request->all()))
        {
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $orderedProducts = session('cart');
            $total =$cart->totalPrice;
            SendEmailToUser::dispatch(Auth::user()->email, $orderedProducts, $total);
            $notyAdmin = User::where('role_id', '=', config('const.role.admin'))->get();
            \Notification::send($notyAdmin, new ReceiveOrder());
            $data['title'] = "Xin chào admin! ";
            $data['content'] = "Bạn có đơn hàng từ khách";

            $options = array(
                'cluster' => 'ap1',
                'encrypted' => true
            );

            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );

            $pusher->trigger('NewOrderToAdmin', 'send-message', $data);


            return redirect()->back()->with('success', trans('messages.order.success'));

        } else {

            return redirect()->route('cart.index')->with('fail', trans('messages.order.fail'));

        }
    }

    public function show($id)
    {
        $order = $this->orderRepository->findOrders($id);
        if((!$order) || ($order->user_id != Auth::user()->id))
        {

            return redirect()->back();

        }

        return view('users.orders.detail', [
            'order' => $order,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

}
