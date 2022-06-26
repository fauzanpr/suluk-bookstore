<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BookUserTransaction;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookuser()
    {
        return $this->belongsToMany(BookUser::class);
    }

    public function bookusertransaction()
    {
        return $this->hasMany(BookUserTransaction::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
