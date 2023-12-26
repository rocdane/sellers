<?php

namespace App\Services;

use App\Models\Product;

class ProductService implements IProductService
{
    public function create(array $data)
    {
        return Product::create($data);
    }

    public function getAll()
    {
        return Product::with(['category','pictures'])->orderBy('created_at','desc')->get();
    }

    public function getAvailable(int $pages)
    {
        return Product::with(['category','pictures'])->where('sold',false)->orderBy('view','desc')->paginate($pages);
    }

    public function getPopular(int $limit)
    {
        return Product::with(['category','pictures'])->orderByDesc('view')->limit($limit)->get();
    }

    public function getGroup(array $range)
    {
        return Product::with(['category','pictures'])->whereIn('id', $range)->get();
    }

    public function getById(int $id)
    {
        return Product::with(['category','pictures'])->findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        return Product::where('id',$id)->update($data);
    }

    public function delete(int $id)
    {
        return Product::deleteById($id);
    }
}