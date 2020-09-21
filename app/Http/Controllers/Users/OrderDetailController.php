<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Interfaces\OrderDetaiRepositoryInterface;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    private $orderDetailRepository;

    public function __construct(OrderDetaiRepositoryInterface $orderDetailRepository)
    {
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function index()
    {
        $orderDetail_list = $this->orderDetailRepository->getOrderDetails();

        return view('users.orders.index', compact(['orderDetail_list']));

    }

}
