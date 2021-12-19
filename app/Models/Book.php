<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // 編集可能なカラムを設定
    protected $fillable = [
        'purchase_date',
    ];

    public function book_information()
    {
        return $this->belongsTo('App\Models\Book','book_information_id','book_information_id');
    }

}
