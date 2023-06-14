<?php
// config this and rename to env.php
$configs = [
    'MAIN_HOST' => 'your website url', // ie : localhost/mywebsite
    'DB_HOST' => 'localhost',
    'DB_USERNAME' => 'root',
    'DB_PASSWORD' => 'example',
    'DB_NAME' => 'example',

    // Dynamically
    'nick_pria' => 'Nick Pria',
    'nick_wanita' => 'Nick Wanita',
    'tgl_akad' => 'Minggu, 01 Januari 2024',
    'alamat_akad' => 'Jl. Indonesia Raya Tercinta, Indonesia NKRI',
    'tgl_resepsi' => 'Minggu, 01 Januari 2024',
    'alamat_resepsi' => 'Jl. Indonesia Raya Tercinta, Indonesia NKRI',
    'waktu_akad' => '09:00-10:00',
    'waktu_resepsi' => '10:00-Selesai',

    // location map
    'lat' => '40.712776',
    'long' => '-74.005974',
    // share location from gmap
    'gmap' => 'https://goo.gl/maps/abcdefghijklmn',

    // bride
    'nama_wanita' => 'Nama Lengkap Wanita',
    'dt_wanita' => 'Putra/ri ke berapa dari Nama Wali',
    'nama_pria' => 'Nama Lengkap Pria',
    'dt_pria' => 'Putra/ri ke berapa dari Nama Wali',
    'kediaman' => 'Mempelai Pria/Wanita'
];

foreach ($configs as $con => $value) {
    putenv("$con=$value");
}
