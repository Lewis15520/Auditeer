<?php

namespace Lewis15520\Auditeer\app\Services;

use Lewis15520\Auditeer\app\Models\AuditeerAuditLog as model;

class AuditLogSaver
{

    private $response;
    private $request;
    private $model;

    public function __construct($request, $response)
    {
        $this->request      = $request;
        $this->response     = $response;
        $this->model        = new Model();
    }

    public function save()
    {
        $this->model->url                   = $this->request->path();
        $this->model->method                = $this->request->method();
        $this->model->parameters            = $this->setParameters();
        $this->model->ip_address            = $this->request->getClientIp();
        $this->model->response_status_code  = $this->response->getStatusCode();
        $this->model->save();
    }

    private function setParameters()
    {
        $parameters = [];

        if (!empty($this->request->query->all()))
            $parameters['url_query'] = $this->request->query->all();

        if (!empty($this->request->getContent()))
            $parameters['body_query'] = $this->request->getContent();

        if (config('auditeer.track_signed_in_users') && auth()->check())
            $parameters['signedin_user_id'] = auth()->user()->id;

        return json_encode($parameters, JSON_FORCE_OBJECT);
    }

}
