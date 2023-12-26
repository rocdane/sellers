<?php

namespace App\Services;

use App\Models\Customer;

interface ICustomerService
{
    public function create(array $data);

    public function getAll();

    public function getById(int $id);

    public function getByPhone(string $phone);

    public function getByEmail(string $email);

    public function update(int $id, array $data);

    public function delete(int $id);
}