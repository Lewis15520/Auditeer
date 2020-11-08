<?php

namespace Lewis15520\Auditeer\app\Services;


class CheckAuditeerExclusions
{

    public function hasExclusions($request, $response)
    {
        $exclusionsMap = [
            'route_urls'     => $request->path(),
            'route_methods' => $request->method(),
            'ip_addresses'  => $request->getClientIp(),
            'status_codes'  => $response->getStatusCode(),
        ];

        foreach ($exclusionsMap as $key => $value) {
            if (in_array($value, config("auditeer.exclusions.{$key}")))
                return true;
        }

        return false;
    }

}
