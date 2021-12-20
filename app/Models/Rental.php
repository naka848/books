<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    // 編集可能なカラムを設定
    protected $fillable = [
        'user_id',
        'checkout_date',
        'return_date',
    ];

    // id以外の主キーを設定する
    protected $primaryKey = 'rental_id';
}
