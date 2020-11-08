<?php

namespace Lewis15520\Auditeer\app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Lewis15520\Auditeer\app\Services\AuditLogSaver;

class AuditLogMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!$request->ajax()) {
            (new AuditLogSaver($request, $response))->save();
        }

        return $response;
    }

}
