<?php
require_once('configs/config.php');
date_default_timezone_set('Asia/Jakarta');

$clientIP = md5($_SERVER['REMOTE_ADDR']);
$input_nama = !empty($_POST["nama"]) ? $_POST["nama"] : '';
$input_kehadiran = !empty($_POST["kehadiran"]) ? $_POST["kehadiran"] : '';
$input_komentar = !empty($_POST["komentar"]) ? $_POST["komentar"] : '';

// initial DB PDO
$db = DBConnection::getInstance();

// mitigate spam
if ($input_nama) {
    $query = $db->prepare("SELECT * FROM komentar WHERE ip_client = ? AND exp_periode > NOW()");
    $query->execute([$clientIP]);
    $res = $query->rowCount() > 0;
    if ($res) {
        loadKomentar(true);
        exit;
    }
}

if (empty($input_nama)) {
    loadKomentar(false);
} else {
    try {
        $nama = htmlspecialchars($input_nama);
        $kehadiran = htmlspecialchars($input_kehadiran);
        $komentar = htmlspecialchars($input_komentar);
        $query = "INSERT INTO komentar (nama, kehadiran, komentar, ip_client, exp_periode, status) VALUES (?,?,?,?,?,?)";
        $command = $db->prepare($query);
        $res = $command->execute([$nama, $kehadiran, $komentar, $clientIP, date('Y-m-d H:i:s', strtotime("+30 minutes")), 1]);
        if ($res) {
            loadKomentar(false);
        }
    } catch (PDOException $e) {
        echo json_encode([
            'result' => 'failed',
            'data' => null
        ]);
    }
}

function loadKomentar($blocked)
{
    try {
        $db = DBConnection::getInstance();
        $que = $db->query('SELECT nama, kehadiran, komentar FROM komentar ORDER BY id DESC');
        $rows = $que->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode([
            'result' => $blocked ? 'spam' : 'success',
            'data' => $rows ? $rows : null
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            'result' => 'failed',
            'data' => null
        ]);
    }
}
