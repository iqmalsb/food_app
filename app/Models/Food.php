<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'categories_id',
    ];

    public function categories() {
        return $this->belongsTo(Category::class);
    }

    public function orders() {
        return $this-belongsToMany(Order::class);
    }
}
