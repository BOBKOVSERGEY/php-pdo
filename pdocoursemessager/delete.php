<?php

require_once __DIR__ . '/connection.php';

$id = 5;

$sql = "DELETE FROM users WHERE id = ?";

$result = $pdo->prepare($sql);
$result->bindParam(1, $id, PDO::PARAM_STR);


$query = $result->execute();

if ($query) {
  echo "Данные успешно удалены";
} else {
  echo "Ошибка";
}
