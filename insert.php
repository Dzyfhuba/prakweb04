<?php
require_once("config.php");

$judul = $_POST["judul"];
$deskripsi = $_POST["deskripsi"];

$sql = "INSERT INTO postingan (judul, deskripsi) VALUES (:judul, :deskripsi)";
$insert = $conn->prepare($sql);

$params = array(
    ":judul" => $judul,
    ":deskripsi" => $deskripsi,
);

$saved = $insert->execute($params);
session_start();

header("Location: .");
