<?php

namespace App\Services;

use App\Models\Order;

class OrderService implements IOrderService
{
    public function create(array $data)
    {
        return Order::create($data);
    }

    public function getAll()
    {
        return Order::all();
    }

    public function getById(int $id)
    {
        return Order::with(['customer','products'])->find($id);
    }

    public function update(int $id, array $data)
    {
        return Order::where('id',$id)->update($data);
    }

    public function delete(int $id)
    {
        return Order::deleteById($id);
    }
}