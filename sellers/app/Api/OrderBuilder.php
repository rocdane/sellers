<?php

namespace App\Api;

use App\Models\Order;

class OrderBuilder
{
    public function buildOrder(): Order
    {
        $order = new Order();

        return $order;
    }
}