<?php
require_once('configs/config.php');

$input_nama = !empty($_POST["nama"]) ? $_POST["nama"] : '';
$input_kehadiran = !empty($_POST["kehadiran"]) ? $_POST["kehadiran"] : '';
$input_komentar = !empty($_POST["komentar"]) ? $_POST["komentar"] : '';

if (empty($input_nama)) {
    loadKomentar();
} else {
    try {

        $db = DBConnection::getInstance();
        $nama = htmlspecialchars($input_nama);
        $kehadiran = htmlspecialchars($input_kehadiran);
        $komentar = htmlspecialchars($input_komentar);
        $query = "INSERT INTO komentar (nama, kehadiran, komentar, status) VALUES (?,?,?,?)";
        $command = $db->prepare($query);
        $command->execute([$nama, $kehadiran, $komentar, 1]);
        loadKomentar();
    } catch (PDOException $e) {
        die($e->getMessage());
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

function loadKomentar()
{
    try {
        $db = DBConnection::getInstance();
        $que = $db->query('SELECT * FROM komentar ORDER BY id DESC');
        $rows = $que->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows ? $rows : null);
    } catch (PDOException $e) {
        die($e->getMessage());
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
