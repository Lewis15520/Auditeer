<?php

use Illuminate\Support\Facades\Route;
use Lewis15520\Auditeer\app\Http\Controllers\AuditeerViewController;

if (config('auditeer.enable_views')) {

    Route::get('auditeer_data', [AuditeerViewController::class, 'getView'])->name('auditeer');
    Route::post('auditeer_data/get_data_view', [AuditeerViewController::class, 'getDataView']);

}
