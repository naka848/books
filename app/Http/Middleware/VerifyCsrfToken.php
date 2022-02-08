<?php

namespace App\Http\Middleware;

// VerifyCsrfTokenをミドルウェアとして扱うよ
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     * →和訳：CSRFの検証から除外すべきURI
     * @var array
     */
    protected $except = [
        //
    ];
}
