<?php

namespace App\Services;

use App\Models\Seller;
use App\Models\Bank;

class SellerService implements ISellerService
{
    public function create(array $data)
    {
        return Seller::create($data);
    }

    public function getAll()
    {
        return Seller::all();
    }

    public function getById(int $id)
    {
        return Seller::with('bank')->find($id);
    }

    public function update(int $id, array $data)
    {
        return Seller::where('id',$id)->update($data);
    }

    public function editBank(int $id, array $data)
    {
        $seller = Seller::findOrFail($id);
        $bank = new Bank();
        
        $bank->fill([
            'name'=>$data['name'],
            'iban'=>$data['iban'],
            'bic'=>$data['bic']
        ]);

        $seller->bank()->associate($bank);
        $seller->save();
    }

    public function delete(int $id)
    {
        return Seller::deleteById($id);
    }
}