<?php

namespace App\Services;

use App\Models\Category;

interface ICategoryService
{
    public function create(array $data);

    public function getAll();

    public function getById(int $id);

    public function update(int $id, array $data);

    public function delete(int $id);
}