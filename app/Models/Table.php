<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;
    protected $table = 'reservations';

    protected $fillable = [
        'table_no',
        'max_pax',
        'status',
    ];

    public function orders() {
        return $this-belongsToMany(Order::class);
    }
}
