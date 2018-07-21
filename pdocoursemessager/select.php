<?php

require_once __DIR__ . '/connection.php';


$id = 3;

$sql = "SELECT * FROM users";

$result = $pdo->prepare($sql);
$result->execute();
if ($result->rowCount() > 0) {
  $rows = $result->fetchAll(PDO::FETCH_OBJ);
  echo '<pre>';
  print_r($rows);
  echo '</pre>';

  foreach ($rows as $row) {
    echo $row->name . '<br>';
  }
} else {
  echo "Нет строк";
}
