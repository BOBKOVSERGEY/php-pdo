<?php
//error_reporting(0);

function debug($arr)
{
  echo "<pre>";
  print_r($arr);
  echo "</pre>";
}


// подключение к БД
try {
  $mysqli = new mysqli("localhost", "root", "", "wpthemeone");
  if ($mysqli->connect_error) {
    throw new Exception("Connection fault: " . $mysqli->connect_errno . " | " . $mysqli->connect_error);
  }
} catch(Exception $e) {
  echo $e->getMessage();
  exit;
}

// установка кодировки
$query = "SET NAMES utf8";
$mysqli->query($query);







/*Транзакции*/

// запрещаем атоподтверждение запросов
$mysqli->autocommit(FALSE);

try {
  $mysqli->query("INSERT INTO wp_posts(post_title, post_content) VALUE ('New title 1', 'New content 1')");
  if ($mysqli->error_list) {
    throw new Exception();
  }
  $mysqli->query("INSERT INTO wp_posts(post_title, post_content) VALUE('New title 1', 'New content 1')");
  if ($mysqli->error_list) {
    throw new Exception();
  }
  $mysqli->query("INSERT INTO wp_posts(post_title, post_content) VALUE('New title 1', 'New content 1')");
  if ($mysqli->error_list) {
    throw new Exception();
  }
  $mysqli->query("INSERT INTO wp_posts(post_title, post_content) VALUE('New title 1', 'New content 1')");
  if ($mysqli->error_list) {
    throw new Exception();
  }

  // транзакция успешно завершена
  $mysqli->commit();

} catch(Exception $e) {
  $mysqli->rollback();
  echo 'Ошибка выполнения запросов' .$e->getMessage();
}

$sql = "SELECT post_title, post_content FROM wp_posts";
$result = $mysqli->prepare($sql);
$result->execute();
$row = $result->get_result();
debug($row->fetch_all(MYSQLI_ASSOC));

/*END Транзакции*/

/*Подготовленныйе запросы*/
//$id = 5;

// подготовленные запросы
//$sql = "SELECT ID, post_title, post_content FROM wp_posts WHERE id = ?";

// подготавливаем запрос
//$result = $mysqli->prepare($sql);
// вводим данные
//$result->bind_param("i", $id); //s i d b принимает стоку число дату большой блочный объект
// выполняем подготовленный запрос
//$result->execute();

// получаем результаты подготовленного sql запроса
//$res = $result->get_result();

//while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
  //debug($row);
//}

//echo $res->num_rows;
//debug($res);

/*END Подготовленныйе запросы*/

// составляем sql запрос
//$sql = "SELECT ID, post_title, post_content FROM wp_posts";
// выполняем запрос
//$result = $mysqli->query($sql);

// констанки MYSQLI_NUM - выводит индексный массив
// констанки MYSQLI_ASSOC - выводит ассоциативный  массив


//while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  //debug($row);
  //debug($result->fetch_assoc());
  //debug($result->fetch_field());
//}
//$id = 1;

//$sql = "SELECT ID, post_title, post_content FROM wp_posts WHERE id='". $mysqli->real_escape_string($id) . "'";
// выполняем запрос
//$result = $mysqli->query($sql);
//while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  //debug($row);
//}

//$sqlDelete = "DELETE FROM wp_posts WHERE id=14";
//$resultDelete = $mysqli->query($sqlDelete);

// возвращаем кол-во строк затронутых в результате sql запроса
//echo $mysqli->affected_rows;

// получаем id вставляемой записи
//echo $mysqli->insert_id;


//debug($mysqli);


// завершает соединение с БД
//$mysqli->close();
//debug($result);
//$row = $result->fetch_all(MYSQLI_ASSOC);

//debug($row);

