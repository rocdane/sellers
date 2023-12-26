<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'legal',
        'address',
        'phone',
        'email',
        'picture',
    ];

    public function pictureUrl():string
    {
        return Storage::url($this->picture);
    }
    
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
