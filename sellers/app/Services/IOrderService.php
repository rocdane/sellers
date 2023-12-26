<?php

namespace App\Services;

use App\Models\Order;

interface IOrderService
{
    public function create(array $data);

    public function getAll();

    public function getById(int $id);

    public function update(int $id, array $data);

    public function delete(int $id);
}