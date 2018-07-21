<?php

require_once __DIR__ . '/connection.php';

$name = "Taran Kira";
$email = "taran.kira@rambler.ru";
$password = "herpassword";
$id = 3;

$sql = "UPDATE users SET name = ? WHERE id = ?";

$result = $pdo->prepare($sql);
$result->bindParam(1, $name, PDO::PARAM_STR);
$result->bindParam(2, $id, PDO::PARAM_INT);

$query = $result->execute();

if ($query) {
  echo "Данные успешно обновлены";
} else {
  echo "Ошибка";
}
