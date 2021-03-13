<?php

return [
    'login_data' => [
        'email' => 'required|string|email|max:100',
        'password' => 'required|string|min:8|max:20'
    ],
    'clients' => [
        'name' => 'required|string|max:60',
        'id_number' => 'required|string|max:40|unique:clients',
        'email' => 'required|string|email|max:100|unique:clients',
        'phone_number' => 'required|string|max:80',
        'concessionaire_id' => 'required|integer',
    ],
    'update_clients' => [
        'name' => 'required|string|max:60',
        'id_number' => '|string|max:40|unique:clients',
        'email' => 'string|email|max:100|unique:clients',
        'phone_number' => 'required|string|max:80',
        'concessionaire_id' => 'required|integer',
    ],
    'concessionaires'=>[
        'name' => 'required|string|max:60',
        'direction' => 'required|string|max:120',
        'code' => 'required|string|max:20|unique:concessionaires',
        'region_id' => 'required|integer',
    ],
    'update_concessionaires'=>[
        'name' => 'required|string|max:60',
        'direction' => 'required|string|max:120',
        'code' => 'string|max:20|unique:concessionaires',
        'region_id' => 'required|integer',
    ],
    'regions' => [
        'name' => 'required|string|max:60',
        'code' => 'required|string|max:10|unique:regions',
    ],
    'update_regions' => [
        'name' => 'required|string|max:60',
        'code' => 'string|max:10|unique:regions',
    ]
];