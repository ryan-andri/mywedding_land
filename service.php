<?php
require_once('configs/config.php');

$input_nama = $_POST['nama'];
$input_kehadiran = $_POST['kehadiran'];
$input_komentar = $_POST['komentar'];
$optin = $_POST['opt'];

if ($optin == '0') {
    loadKomentar();
} else {
    $db = DBConnection::getInstance();
    $nama = htmlspecialchars($input_nama);
    $kehadiran = htmlspecialchars($input_kehadiran);
    $komentar = htmlspecialchars($input_komentar);
    $query = "INSERT INTO komentar (nama, kehadiran, komentar, status) VALUES (?,?,?,?)";
    $command = $db->prepare($query);
    $res = $command->execute([$nama, $kehadiran, $komentar, 1]);
    if ($res) {
        loadKomentar();
    } else {
        echo '';
    }
}

function loadKomentar()
{
    $db = DBConnection::getInstance();
    $que = $db->query('SELECT * FROM komentar');
    $rows = $que->fetchAll(PDO::FETCH_ASSOC);
    if ($rows == null) {
        echo '<div class="d-flex align-items-center justify-content-center mt-4">'
            . '<p>Belum ada komentar!</p>'
            . '</div>';
    } else {
        foreach ($rows as $comments) {
            $html = '<div class="card border-dark m-2">'
                . '<div class="card-body">'
                . '<p class="card-title" style="text-align: left;">'
                . '<strong>' . $comments['nama'] . '</strong>'
                . '<span style="float:right; font-size: 10px;">' . $comments['kehadiran'] . '</span>'
                . '</p>'
                . '<p class="card-text">' . $comments['komentar'] . '</p>'
                . '</div>'
                . '</div>';
            echo $html;
        }
    }
}
