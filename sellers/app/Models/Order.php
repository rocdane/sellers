<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Api\Item;

class Order extends Model
{
    use HasFactory;

    private array $items;

    public function __construct() {
        $this->items = array();
        $this->reference = "order_new_ref";
    }

    protected $fillable = [
        'reference',
        'confirmed',
    ];

    protected $casts = [
        'confirmed_at' => 'datetime',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function addItem(Item $item)
    {
        array_push($this->items, $item);
    }

    public function removeItem(Item $item)
    {
        unset($this->items[$item]);
    }

    public function showItems()
    {
        return $this->items;
    }

    public function validate()
    { 
        foreach ($this->items as $item) {
            $this->products()->attach($item['id']);
        }
        
        return $this->save();
    }
}
