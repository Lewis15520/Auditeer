<?php

namespace Lewis15520\Auditeer\app\Providers;

use Lewis15520\Auditeer\app\Http\Middleware\AuditLogMiddleware;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class AuditeerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            if(! class_exists('CreateAuditLogTable')) {
                $this->publishes([
                    __DIR__ . '/../../database/migrations/create_audit_log_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_audit_log_table.php'),
                ], 'migrations');
            }
        }

        $kernel = $this->app->make(Kernel::class);
        $kernel->pushMiddleware(AuditLogMiddleware::class);
    }

    public function register()
    {

    }

}
