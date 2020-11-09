<?php

namespace Lewis15520\Auditeer\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuditeerViewController extends Controller
{

    public function getView()
    {
        return view('auditeer::auditeer');
    }

}
