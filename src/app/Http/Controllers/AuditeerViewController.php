<?php

namespace Lewis15520\Auditeer\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Lewis15520\Auditeer\app\Models\AuditeerAuditLog;

class AuditeerViewController extends Controller
{

    public function getView()
    {
        $data = AuditeerAuditLog::orderBy('id', 'desc')->paginate(config('auditeer.view_config.view.audits_per_page'));
        return view('auditeer::auditeer', ['auditData' => $data]);
    }

    public function getDataView()
    {
        $data = AuditeerAuditLog::where('id', request()->get('id'))->first();
        return view('auditeer::partials.show_data', ['data' => $data])->render();
    }

}
