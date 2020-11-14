@extends('auditeer::layouts.app')
@section('body')

    <div class="centerPanel" style="width: {{ config('auditeer.view_config.view.default_width') }}; margin: 0 auto;">

        <h1 class="title">Auditeer Data Viewing<span>Click on the audit log entries below to display their data.</span></h1>

        <div class="row">

            <div class="col-4">

                @forelse($auditData as $data)


                    <?php

                        switch (true) {

                            case in_array($data->response_status_code, [200, 201, 202, 203, 204, 205, 206, 208, 226, 300, 301, 302, 303, 304, 305, 306, 307, 308, 418]):
                                $headerColor = 'success';
                                break;

                            case in_array($data->response_status_code, [400, 401, 402, 403, 404, 405, 406, 407, 408, 409, 410, 411, 412, 413, 414, 415, 416, 417, 421, 422, 423, 424, 425, 426, 428, 429, 431, 451, 500, 501, 502, 503, 504, 505, 506, 507, 508, 510, 511]):
                                $headerColor = 'error';
                                break;

                            case in_array($data->response_status_code, [207]):
                                $headerColor = 'unknown';
                                break;

                        }

                    ?>

                    <div class="auditDataRow" id="{{ $data->id }}">
                        <div class="header {{ $headerColor }}">
                            <p>{{ Carbon\Carbon::parse($data->created_at)->format(config('auditeer.view_config.view.carbon_format')) }}</p>
                        </div>
                        <div class="url">
                            <p><span>{{ $data->method }}</span>{{ $data->url }}</p>
                        </div>
                        <div class="body">

                            <div class="row">

                                <div class="col-6">
                                    <p>{{ isset($data->parameters()->user_id)? 'Yes': 'No' }}<span>User Associated</span></p>
                                </div>

                                <div class="col-6">
                                    <p>{{ $data->response_status_code }}<span>Http Status</span></p>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-6">
                                    <p>{{ isset($data->parameters()->body_query)? 'Yes': 'No' }}<span>Body Content</span></p>
                                </div>

                                <div class="col-6">
                                    <p>{{ isset($data->parameters()->url_query)? 'Yes': 'No' }}<span>URL Parameters</span></p>
                                </div>

                            </div>
                        </div>
{{--                        @if(isset($data->parameters()->user_id))--}}
{{--                            <p>--}}
{{--                                User: {{ $data->userFromId()->{config('auditeer.view_config.user.display_column')} }}--}}
{{--                                @if(config('auditeer.view_config.user.show_id'))(ID: {{ $data->parameters()->user_id }})@endif--}}
{{--                            </p>--}}
{{--                        @endif--}}
                    </div>


                @empty

                @endforelse

                    {{ $auditData->links() }}

            </div>


            <div class="col-8">

                <div class="pane" id="dataPanel">

                </div>

            </div>


        </div>


    </div>

@endsection





