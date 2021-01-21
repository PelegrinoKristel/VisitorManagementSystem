<?php
return [
    'admin' => ['base_uri' =>env('ADMIN_SERVICE_BASE_URL'), 'secret' => env('ADMIN_SERVICE_SECRET')],
    'customer' => ['base_uri' =>env('CUSTOMER_SERVICE_BASE_URL'), 'secret' => env('CUSTOMER_SERVICE_SECRET')],
    'employee' => ['base_uri' =>env('EMPLOYEE_SERVICE_BASE_URL'), 'secret' => env('EMPLOYEE_SERVICE_SECRET')],
];