<?php

namespace App\Models;

use App\Models\Food;
use App\Models\User;
use App\Models\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'total_price',
        'is_paid',
        'is_dine_in',
        'has_cutlery',
        'user_id',
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function foods() {
        return $this-belongsToMany(Food::class);
    }

    public function table() {
        return $this-belongsToMany(Table::class);
    }
}
