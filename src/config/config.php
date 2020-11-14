<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enabling Auditeer
    |--------------------------------------------------------------------------
    |
    | This option will allow you to start tracking and auditing data.
    |
    */

    'enabled' => false,

    /*
    |--------------------------------------------------------------------------
    | Enable Auditeer Views
    |--------------------------------------------------------------------------
    |
    | This option allows you to go to '{base_url}/auditeer_data' and have a
    | nice interface to view your Auditeer data.
    |
    */

    'enable_views' => false,

    /*
    |--------------------------------------------------------------------------
    | Auditeer View Config
    |--------------------------------------------------------------------------
    |
    | These options allow you to configure the auditeer view to how you would
    | like to see the data.
    |
    | view: This will allow you to edit how the view is displayed.
    |
    | user: This is the settings on where to find the user and how to display
    | them.
    |
    */

    'view_config' => [
        'view' => [
            'default_width'     => '1260px',
            'audits_per_page'   => 5,
            'carbon_format'     => 'jS \o\f F, Y g:i:s a',
        ],
        'user' => [
            'model'             => \App\Models\User::class,
            'display_column'    => 'email',
            'show_id'           => false,
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Tracking Signed-in Users
    |--------------------------------------------------------------------------
    |
    | This option allows you to add the user_id field in to the parameters
    | field. This will only work if the user_id comes from session under
    | auth()->user()->id
    |
    */

    'track_signed_in_users' => false,

    /*
    |--------------------------------------------------------------------------
    | Track Ajax Requests
    |--------------------------------------------------------------------------
    |
    | This option allows you to track ajax requests. You should consider all
    | calls to the server before turning this on e.g: graph calls, datatables
    | ajax calls etc.
    |
    */

    'track_ajax_requests' => false,

    /*
    |--------------------------------------------------------------------------
    | Track Model Changes
    |--------------------------------------------------------------------------
    |
    | This option allows you to track all model changes with the trait
    | associated to the model.
    |
    */

    'track_model_changes' => false,

    /*
    |--------------------------------------------------------------------------
    | Exclusions
    |--------------------------------------------------------------------------
    |
    | This option will allow you to define what you dont want to track. Under
    | each of these sections, you can define a value that will not be tracked
    | like a route name that's called 'test' or a route method of 'POST'.
    |
    */

    'exclusions' => [
        'route_urls'    => [],
        'route_methods' => [],
        'ip_addresses'  => [],
        'status_codes'  => [],
    ],

];
