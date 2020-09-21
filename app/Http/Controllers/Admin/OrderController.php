<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderRepository;
    private $userRepository;

    public function __construct(OrderRepositoryInterface $orderRepository, UserRepositoryInterface $userRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $order_list = $this->orderRepository->getOrders();

        return view('admin.orders.index', compact(['order_list']));

    }

    public function show($id)
    {
        $order = $this->orderRepository->findOrders($id);

        if(!($order))
        {

            return redirect()->back();

        }

        return view('admin.orders.detail', [
            'order' => $order
        ]);
    }

    public function destroy($id)
    {
        $deleteResult = $this->orderRepository->deleteOrder($id);
        if ($deleteResult)
        {
            return redirect()->route('orders.index')->with('Success', trans('messages.orders.success'));

        } else {

            return redirect()->back()->with('Fail', trans('messages.orders.fail'));
        }
    }

}
