<?php

namespace Lewis15520\Auditeer\app\Models;

use Illuminate\Database\Eloquent\Model;

class AuditeerAuditLog extends Model
{

    protected $table    = 'auditeer_audit_log';
    protected $fillable = [
      'url',
      'method',
      'parameters',
      'ip_address',
      'response_status_code'
    ];

}
