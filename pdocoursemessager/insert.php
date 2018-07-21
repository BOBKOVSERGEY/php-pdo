<?php

require_once __DIR__ . '/connection.php';


$name = "Sergey Bobkov";
$email = "sergey_bobkov@inbox.ru";
$password = "mypassword";

$sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
$result = $pdo->prepare($sql);

$result->bindParam(":name", $name, PDO::PARAM_STR);
$result->bindParam(":email", $email, PDO::PARAM_STR);
$result->bindParam(":password", $password, PDO::PARAM_STR);
$query = $result->execute();

if ($query) {
  echo "Данные успешно добавлены";
} else {
  echo "Ошибка";
}
