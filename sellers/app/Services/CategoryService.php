<?php

namespace App\Services;

use App\Models\Category;

class CategoryService implements ICategoryService
{
    public function create(array $data)
    {
        return Category::create($data);
    }

    public function getAll()
    {
        return Category::with('products')->get();
    }

    public function getById(int $id)
    {
        return Category::find($id);
    }

    public function update(int $id, array $data)
    {
        return Category::where('id',$id)->update($data);
    }

    public function delete(int $id)
    {
        return Category::deleteById($id);
    }
}