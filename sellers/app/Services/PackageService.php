<?php

namespace App\Services;

use App\Models\Package;

class PackageService implements IPackageService
{
    public function create(array $data)
    {
        return Package::create($data);
    }

    public function getAll()
    {
        return Package::all();
    }

    public function getById(int $id)
    {
        return Package::find($id);
    }

    public function update(int $id, array $data)
    {
        return Package::where('id',$id)->update($data);
    }

    public function delete(int $id)
    {
        return Package::deleteById($id);
    }
}