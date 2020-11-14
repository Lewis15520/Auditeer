<div id="requestDataPanel">
    <h5>Request Data</h5>
    <p>URL: <span>{{ $data->url }}</span></p>
    <p>Request Method: <span>{{ $data->method }}</span></p>
    <p>IP Address: <span>{{ $data->ip_address }}</span></p>
    <p>Capture Time: <span>{{ Carbon\Carbon::parse($data->created_at)->format(config('auditeer.view_config.view.carbon_format')) }}</span></p>
    @if(isset($data->parameters()->user_id))
        <p>
            User Associated:
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
        </p>
    @endif
</div>
