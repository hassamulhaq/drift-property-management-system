<?php

return [
    /*
    |--------------------------------------------------------------------------
    | API Token Expiry in Minutes
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of minutes before an API Token Expires.
    | By default, the timeout lasts for 1 hour.
    |
    */

    'api_token_expiry_minutes' => env('DRIFT_API_TOKEN_EXPIRY_MINUTES', 60),

    /*
    |--------------------------------------------------------------------------
    | DRIFT API DEFAULT RESULT LIMIT
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of result limit.
    | By default, the limit is 10.
    |
    */

    'default_result_limit' => env('DRIFT_API_DEFAULT_RESULT_LIMIT', 10),

    /*
    |--------------------------------------------------------------------------
    | DRIFT OTP LENGTH
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of OTP length.
    | By default, the length is 12.
    |
    */

    'otp_length' => env('DRIFT_OTP_LENGTH', 12),

    /*
    |--------------------------------------------------------------------------
    | DRIFT OTP EXPIRY MINUTES
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of minutes before an OTP Token Expires.
    | By default, the timeout lasts for 1 hour.
    |
    */

    'otp_expiry_minutes' => env('DRIFT_OTP_EXPIRY_MINUTES', 60),

    /*
    |--------------------------------------------------------------------------
    | DRIFT FRONTEND DOMAIN
    |--------------------------------------------------------------------------
    |
    | Here you may define the DRIFT front end domain.
    | By default, it's empty.
    |
    */

    'frontend_domain' => env('DRIFT_FRONTEND_DOMAIN', ''),

    /*
    |--------------------------------------------------------------------------F
    | DRIFT FRONTEND EMPLOYEE DOMAIN
    |--------------------------------------------------------------------------
    |
    | Here you may define the DRIFT FRONTEND EMPLOYEE DOMAIN
    | By default, it's empty.
    |
    */

    'frontend_employee_domain' => env('DRIFT_FRONTEND_EMPLOYEE_DOMAIN', ''),

    /*
    |--------------------------------------------------------------------------
    | DRIFT FRONTEND FOR MANAGERS
    |--------------------------------------------------------------------------
    |
    | Here you may define the DRIFT FRONTEND FOR MANAGERS
    | By default, it's empty.
    |
    */
    'frontend_for_managers' => env('DRIFT_FRONTEND_FOR_MANAGERS', ''),

    /*
    |--------------------------------------------------------------------------
    | DRIFT FRONTEND FOR Developer
    |--------------------------------------------------------------------------
    |
    | Here you may define the DRIFT FRONTEND FOR DEVELOPERS
    | By default, it's empty.
    |
    */
    'frontend_for_developers' => env('DRIFT_FRONTEND_FOR_DEVELOPERS', ''),

    /*
    |--------------------------------------------------------------------------
    | DRIFT MAXIMUM DAILY APPOINTMENTS
    |--------------------------------------------------------------------------
    |
    | Here you may define the DRIFT MAXIMUM DAILY APPOINTMENTS
    | By default, it's 8.
    |
    */

    'maximum_daily_appointments' => env('DRIFT_MAXIMUM_DAILY_APPOINTMENTS', 8),

    /*
    |--------------------------------------------------------------------------
    | DRIFT INTER BOOKING BUFFER MINUTES
    |--------------------------------------------------------------------------
    |
    | Here you may define the DRIFT INTER BOOKING BUFFER MINUTES
    | By default, it's 15 minutes.
    |
    */

    'inter_booking_buffer_minutes' => env('DRIFT_INTER_BOOKING_BUFFER_MINUTES', 15),

    /*
    |--------------------------------------------------------------------------
    | DRIFT ENABLE APPOINTMENT ROOM CONSTRAINTS
    |--------------------------------------------------------------------------
    |
    | Here you may define the DRIFT ENABLE APPOINTMENT ROOM CONSTRAINTS
    | By default, it's false.
    |
    */

    'enable_appointment_room_constraints' => env('DRIFT_ENABLE_APPOINTMENT_ROOM_CONSTRAINTS', false),

    /*
    |--------------------------------------------------------------------------
    | DRIFT TOKEN CONVERSION RATE
    |--------------------------------------------------------------------------
    |
    | Here you may define the DRIFT TOKEN CONVERSION RATE
    | By default, it's rate is .01.
    |
    */
    'token_conversion_rate' => env('DRIFT_TOKEN_CONVERSION_RATE', .01),

    /*
    |--------------------------------------------------------------------------
    | DRIFT MAX DATE RANGE DAYS
    |--------------------------------------------------------------------------
    |
    | Here you may define the DRIFT MAX DATE RANGE DAYS
    | By default, it's 92 days.
    |
    */

    'max_date_range_days' => env('DRIFT_MAX_DATE_RANGE_DAYS', 92),

    /*
    |--------------------------------------------------------------------------
    | DRIFT DEFAULT DATE RANGE DAYS
    |--------------------------------------------------------------------------
    |
    | Here you may define the DRIFT DEFAULT DATE RANGE DAYS
    | By default, it's 30 Days.
    |
    */

    'default_date_range_days' => env('DRIFT_DEFAULT_DATE_RANGE_DAYS', 30),

    /*
    |--------------------------------------------------------------------------
    | DRIFT TOTAL STEPS
    |--------------------------------------------------------------------------
    |
    | Here you may define the DRIFT TOTAL STEPS
    | By default, it's 77 Days.
    |
    */

    'total_steps' => env('DRIFT_TOTAL_STEPS', 77),
];
