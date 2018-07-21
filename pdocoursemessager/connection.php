<?php

try {
  $pdo = new PDO('mysql:dbname=ms;host=localhost', 'root', '');
} catch(PDOException $e) {
  echo 'Нет соединения с БД: ' . $e->getMessage();
}