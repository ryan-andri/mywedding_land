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
    // Bank account number
    'card_wanita' => '1234567890',
    'an_wanita' => 'Atas Nama ?',
    'card_pria' => '1234567890',
    'an_pria' => 'Atas Nama ?',

    // bride
    'nama_wanita' => 'Nama Lengkap Wanita',
    'dt_wanita' => 'Putra/ri ke berapa dari Nama Wali bapak & ibu',
    'nama_pria' => 'Nama Lengkap Pria',
    'dt_pria' => 'Putra/ri ke berapa dari Nama Wali bapak & ibu',
    'kediaman' => 'Mempelai Pria/Wanita',
    // short story
    // must have paragraph tag <p></p>
    'story_box' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</P>' . '<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>'
];

foreach ($configs as $con => $value) {
    putenv("$con=$value");
}
