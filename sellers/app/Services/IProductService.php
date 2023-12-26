<?php

namespace App\Services;

use App\Models\Product;

interface IProductService
{
    public function create(array $data);

    public function getAll();

    public function getAvailable(int $pages);
    
    public function getPopular(int $limit);
    
    public function getGroup(array $range);

    public function getById(int $id);

    public function update(int $id, array $data);

    public function delete(int $id);
}