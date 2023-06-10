<?php
// config this and rename to env.php
$configs = [
    'MAIN_HOST' => 'your website url', // ie : localhost/mywebsite
    'DB_HOST' => 'localhost',
    'DB_USERNAME' => 'root',
    'DB_PASSWORD' => 'example',
    'DB_NAME' => 'example',

    // Dynamically
    'nick_pria' => 'Pria',
    'nick_wanita' => 'Wanita',
    'nama_pria' => 'Penganten Pria',
    'nama_wanita' => 'Penganten Wanita',

    // location map
    'lat' => '40.712776',
    'long' => '-74.005974'
];

foreach ($configs as $con => $value) {
    putenv("$con=$value");
}
