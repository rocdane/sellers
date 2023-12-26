<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService implements ICustomerService
{
    public function create(array $data)
    {
        return Customer::create($data);
    }

    public function getAll()
    {
        return Customer::all();
    }

    public function getById(int $id)
    {
        return Customer::find($id);
    }

    public function getByPhone(string $phone)
    {
        return Customer::where('phone',$phone)->get();
    }

    public function getByEmail(string $email)
    {
        return Customer::where('email',$email)->get();
    }

    public function update(int $id, array $data)
    {
        return Customer::where('id',$id)->update($data);
    }

    public function delete(int $id)
    {
        return Customer::deleteById($id);
    }
}