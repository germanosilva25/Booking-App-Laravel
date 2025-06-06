<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'get-mensagens',
        'check-user-logged',
        'gravar-resposta-paciente',
        'getSignedDocument',
        'getRamals',
        'create-usuario',
        'preparar-agendamento',
        'criar-agendamento',
        'criar-agenda'
    ];
}
