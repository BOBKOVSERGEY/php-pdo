<?php

// соединение
try {
  $pdo = new PDO('mysql:dbname=GU;host=localhost', 'root', '');
} catch(PDOException $e) {
  echo 'Нет соединения с БД: ' . $e->getMessage();
}

class Text {
  public $id_good;
  public $title;
  public $description;
  public $short_description;

  public function showText()
  {
    echo '№' . $this->id_good . '<br>';
    echo 'Заголовок ' . $this->title . '<br>';
    echo 'Анонс ' . $this->short_description . '<br>';
    echo 'Описание ' . $this->description . '<br>';
  }
}

$sql = "SELECT id_good, title, short_description, description FROM goods";
$result = $pdo->query($sql);

$row = $result->fetchAll(PDO::FETCH_CLASS, 'Text');


echo '<pre>';
  print_r($row);
echo '</pre>';