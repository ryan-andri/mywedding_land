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
    'tgl_akad' => 'Minggu, 23 Juli 2023',
    'alamat_akad' => 'Jl. Kedukan, Kertapati, Palembang',
    'tgl_resepsi' => 'Minggu, 23 Juli 2023',
    'alamat_resepsi' => 'Jl. Kedukan, Kertapati, Palembang'
];

foreach ($configs as $con => $value) {
    putenv("$con=$value");
}
