<?php

// соединение
try {
  $pdo = new PDO('mysql:dbname=GU;host=localhost', 'root', '');
} catch(PDOException $e) {
  echo 'Нет соединения с БД: ' . $e->getMessage();
}

/*маппинг*/
/*class Text {
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

foreach ($row as $obj) {
  echo $obj->id_good . "----------------------";
  $obj->showText();
}


echo '<pre>';
  print_r($row);
echo '</pre>';
*/

$id = 3;
/* подготовленные запросы увеличиваеют быстродействие и безопасность */
$sql = "SELECT id_good, title, short_description, description FROM goods WHERE id_good = :id";
// подготовливаем запрос
$result = $pdo->prepare($sql);

$result->bindParam(":id", $id, PDO::PARAM_INT);

// выполняем запрос
$result->execute();


$row = $result->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
  print_r($row);
echo '</pre>';

