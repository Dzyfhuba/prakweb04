<?php
require_once("config.php");

$id = $_POST["id"];
$judul = $_POST["judul"];
$deskripsi = $_POST["deskripsi"];

$sql = "UPDATE postingan SET judul=:judul, deskripsi=:deskripsi WHERE id=:id";
$change = $conn->prepare($sql);

$params = array(
    ":id" => $id,
    ":judul" => $judul,
    ":deskripsi" => $deskripsi,
);

$saved = $change->execute($params);
session_start();

header("Location: .");