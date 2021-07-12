<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'uploads' => [
            'driver' => 'local',
            'root' => storage_path('app/uploads'),
            'url' => env('APP_URL').'/storage',
            'path' => '/uploads',
        ],

        'product_images' => [
            'driver' => 'local',
            'root' => storage_path('app/uploads/products/images'),
            'url' => env('APP_URL').'/storage',
            'path' => '/uploads/products/images'
        ],

        'product_temp_images' => [
            'driver' => 'local',
            'root' => storage_path('app/uploads/products/images/temp'),
            'url' => env('APP_URL').'/storage',
            'path' => '/uploads/products/images/temp'
        ],

        'banners' => [
            'driver' => 'local',
            'root' => storage_path('app/uploads/banners'),
            'url' => env('APP_URL').'/storage',
            'path' => '/uploads/banners',
        ],

        'banners_temp' => [
            'driver' => 'local',
            'root' => storage_path('app/uploads/banners/temp'),
            'url' => env('APP_URL').'/storage',
            'path' => '/uploads/banners/temp'
        ],

        'subbanners' => [
            'driver' => 'local',
            'root' => storage_path('app/uploads/subbanners'),
            'url' => env('APP_URL').'/storage',
            'path' => '/uploads/subbanners'
        ],

        'subbanners_temp' => [
            'driver' => 'local',
            'root' => storage_path('app/uploads/subbanners/temp'),
            'url' => env('APP_URL').'/storage',
            'path' => '/uploads/subbanners/temp'
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        // public_path('storage') => storage_path('app/public'),
        public_path('uploads') => storage_path('app/uploads'),
        public_path('uploads/products/images') => storage_path('app/uploads/products/images'),
        public_path('uploads/products/images/temp') => storage_path('app/uploads/products/images/temp'),
        public_path('uploads/banners') => storage_path('app/uploads/banners'),
        public_path('uploads/banners/temp') => storage_path('app/uploads/banners/temp'),
        public_path('uploads/subbanners') => storage_path('app/uploads/subbanners'),
        public_path('uploads/subbanners/temp') => storage_path('app/uploads/subbanners/temp')
    ],

];
