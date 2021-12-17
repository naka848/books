<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookInformation extends Model
{
    // 編集を認めないカラムを設定
    protected $guarded = [
        'book_information_id',
        'created_at',
        'updated_at',
    ];
}
