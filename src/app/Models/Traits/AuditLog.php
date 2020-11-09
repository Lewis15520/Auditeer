<?php

namespace Lewis15520\Auditeer\Traits;

use Lewis15520\Auditeer\app\Observers\SelfObserver;

Trait AuditLog
{

    public static function boot()
    {
        parent::boot();
        if (config('auditeer.track_model_changes'))
            self::observe(SelfObserver::class);
    }

}
