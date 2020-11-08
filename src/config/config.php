<?php

return [

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
    | Track ajax requests
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
    | Exclusions
    |--------------------------------------------------------------------------
    |
    | This option will allow you to define what you dont want to track. Under
    | each of these sections, you can define a value that will not be tracked
    | like a route name that's called 'test' or a route method of 'POST'.
    |
    */

    'exclusions' => [
        'route_names'   => [],
        'route_methods' => [],
        'ip_addresses'  => [],
        'status_codes'  => [],
    ],

];
