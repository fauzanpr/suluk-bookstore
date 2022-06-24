<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'transfer_proff',
        'item_total',
        'price_total',
        'transaction_date',
        'transaction_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
