<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Api\Packing;

class Package extends Model implements Packing
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'shipped',
    ];

    protected $casts = [
        'shipped_at' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getReference(): string
    {
        return "package";
    }
}
