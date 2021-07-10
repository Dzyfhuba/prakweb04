<?php

require_once("config.php");

$id = $_POST['id'];

$sql = "DELETE FROM postingan WHERE id=:id";
$delete = $conn->prepare($sql);

$params = array(
    ":id" => $id
);

$saved = $delete->execute($params);
echo $saved;
header("Location: .");