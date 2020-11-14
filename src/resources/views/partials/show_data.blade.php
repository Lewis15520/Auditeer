@if(isset($data->parameters()->url_query))
    <div class="padding">
        <h5>URL Parameters</h5>
        <pre class="coded">{!! json_encode($data->parameters()->url_query, JSON_PRETTY_PRINT) !!}</pre>
    </div>
@endif

@if(isset($data->parameters()->body_query))
    <div class="padding">
        <h5>Body Parameters</h5>
        <pre class="coded">{!! json_encode($data->parameters()->body_query, JSON_PRETTY_PRINT) !!}</pre>
    </div>
@endif

@if(isset($data->parameters()->model_changes))
    <div class="padding">
        <h5>Data Changes</h5>
        <pre class="coded">{!! json_encode($data->parameters()->model_changes, JSON_PRETTY_PRINT) !!}</pre>
    </div>
@endif

<div class="padding" id="requestDataPanel">
    <h5>Request Data</h5>


    <p><span>{{ $data->url }}</span>URL</p>
    <p><span>{{ $data->method }}</span>Request Method</p>
    <p><span>{{ $data->ip_address }}</span>IP Address</p>
    <p><span>{{ Carbon\Carbon::parse($data->created_at)->format(config('auditeer.view_config.view.carbon_format')) }}</span>Capture Time</p>
    @if(isset($data->parameters()->user_id))
        <p>
            <span>
                @if(config('auditeer.view_config.user.show_id')) ({{ $data->parameters()->user_id }}) @endif
                <?php
                    $user               = $data->userFromId();
                    $userValueToDisplay = '';

                    if (strpos(config('auditeer.view_config.user.display_column'), '|')) {
                        $valuesToCollect = explode('|', config('auditeer.view_config.user.display_column'));

                        foreach ($valuesToCollect as $key => $value) {
                            if ($key !== 0)
                                $userValueToDisplay .= '(';
                            $userValueToDisplay .= $user->$value;
                            if ($key !== 0)
                                $userValueToDisplay .= ')';
                            $userValueToDisplay .= ' ';
                        }
                    } else {
                        $userValueToDisplay = $user->{config('auditeer.view_config.user.display_column')};
                    }
                ?>
                {{ $userValueToDisplay }}
            </span>
            User Associated
        </p>
    @endif
</div>
