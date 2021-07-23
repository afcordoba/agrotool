<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://local.com/data/comparativo/inline',
        'http://dm.helmutb.com/data/comparativo/inline',
        'http://manejo.ddns.net/data/comparativo/inline',
        'https://manejo.ddns.net/data/comparativo/inline',
        'http://www.donmario.com/manejo_exacto/public/data/comparativo/inline',
        'https://www.donmario.com/manejo_exacto/public/data/comparativo/inline',
    ];
}
