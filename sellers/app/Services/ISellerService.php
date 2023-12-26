<?php

namespace App\Services;

use App\Models\Seller;

interface ISellerService
{
    public function create(array $data);

    public function getAll();

    public function getById(int $id);

    public function update(int $id, array $data);
    
    public function editBank(int $id, array $data);

    public function delete(int $id);
}