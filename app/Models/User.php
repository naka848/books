<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    // 不要な項目を設定すると、指定した項目は常に取得対象外となる
    // →データベースの管理項目など普段取得する必要のないもの指定する
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // データアクセス時に型変換をしてくれる
    // ※Laravelの$query->first()でDBの値を取得すると、
    // DBのカラムの型がIntegerで定義していたとしても、返り値はすべてStringになる
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
