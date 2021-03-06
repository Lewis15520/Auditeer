<?php

namespace Lewis15520\Auditeer\app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Lewis15520\Auditeer\app\Services\AuditLogSaver;
use Lewis15520\Auditeer\app\Services\CheckAuditeerExclusions;

class AuditLogMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!config('auditeer.enabled'))
            return $response;

        if((new CheckAuditeerExclusions)->hasExclusions($request, $response))
            return $response;

        if (config('auditeer.track_ajax_requests')) {
            (new AuditLogSaver($request, $response))->save();
        } else {
            if (!$request->ajax())
                (new AuditLogSaver($request, $response))->save();
        }

        return $response;
    }

}
