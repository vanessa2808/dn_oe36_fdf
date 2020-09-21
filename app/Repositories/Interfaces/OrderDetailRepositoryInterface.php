<?php

namespace App\Repositories\Interfaces;

interface OrderDetailRepositoryInterface
{
    public function getOrderDetails();

    public function findOrders($id);

}
