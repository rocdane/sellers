<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use App\Api\Item;
use App\Api\Packing;

class Product extends Model implements Item
{
    use HasFactory;

    private Packing $packing;
    
    public function __construct() {
        $this->packing = new Package();
    }

    protected $fillable = [
        'media',
        'title',
        'description',
        'price',
        'view',
        'sold',
    ];

    protected $casts = [
        'sold_at' => 'datetime',
    ];

    public function mediaUrl():string
    {
        return Storage::url($this->media);
    }

    public function picturesUrl()
    {
        $pictures = [];

        foreach ($this->pictures as $picture) {
            $pictures[]['name'] = Storage::url($picture->name);
        }

        return $pictures;
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function package()
    {
        return $this->hasOne(Package::class);
    }

    public function getName(): string
    {
        return $this->title;
    }
    
    public function getPrice(): int
    {
        return $this->price;
    }

    public function getPacking(): Packing
    {
        return $this->packing;
    }
}
