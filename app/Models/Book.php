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

    // id以外の主キーを設定する
    protected $primaryKey = 'book_id';

    public function book_information()
    {
        return $this->belongsTo('App\Models\BookInformation','book_information_id','book_information_id');
    }

}
