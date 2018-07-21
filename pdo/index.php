<?php

// соединение
try {
  //mysql
  $pdo = new PDO('mysql:dbname=wpthemeone;host=localhost', 'root', '');

  //sqlite
  //$pdo = new PDO('sqlite:database.db');

  //pgsql
  /** @var TYPE_NAME $pdo */
  //$pdo = new PDO('pgsql:dbname=mydatabase host=localhost', 'user', 'password');


} catch(PDOException $e) {
  echo 'Нет соединения с БД: ' . $e->getMessage();
}

// формируем запрос
//$sql = "SELECT ID, post_content, post_title FROM wp_posts";

// выполняем запрос

//$result = $pdo->query($sql);

//$row = $result->fetchAll();

//while ($row = $result->fetch(MYSQLI_ASSOC)) {
//  echo $row->ID . '<br><br>';
//}

$sqlInsert = "INSERT INTO wp_posts (post_title) VALUES ('todayTest')";
$res = $pdo->exec($sqlInsert);

print_r($res);

$sql = "SELECT ID, post_title FROM wp_posts";
$result = $pdo->query($sql);
$row = $result->fetchAll();
echo '<pre>';
//print_r($row);
echo '<pre>';


$string1 = '/upload/images/Изображения/Лаки для ногтей/Лаки Wish/420.jpg';
$string2 = '/upload/images/Изображения/Лаки для ногтей/Лаки Wish/420.jpg';

echo 'String1' . $string1 . ' nnn<br>';
echo 'String2' . $string2 . ' nnn<br>';


if ($string1 == $string2) {
  echo 'true' . '<br><br>';
} else {
  echo 'false' . '<br><br>';
}




function computeDiff($from, $to)
{
  $diffValues = array();
  $diffMask = array();

  $dm = array();
  $n1 = count($from);
  $n2 = count($to);

  for ($j = -1; $j < $n2; $j++) $dm[-1][$j] = 0;
  for ($i = -1; $i < $n1; $i++) $dm[$i][-1] = 0;
  for ($i = 0; $i < $n1; $i++)
  {
    for ($j = 0; $j < $n2; $j++)
    {
      if ($from[$i] == $to[$j])
      {
        $ad = $dm[$i - 1][$j - 1];
        $dm[$i][$j] = $ad + 1;
      }
      else
      {
        $a1 = $dm[$i - 1][$j];
        $a2 = $dm[$i][$j - 1];
        $dm[$i][$j] = max($a1, $a2);
      }
    }
  }

  $i = $n1 - 1;
  $j = $n2 - 1;
  while (($i > -1) || ($j > -1))
  {
    if ($j > -1)
    {
      if ($dm[$i][$j - 1] == $dm[$i][$j])
      {
        $diffValues[] = $to[$j];
        $diffMask[] = 1;
        $j--;
        continue;
      }
    }
    if ($i > -1)
    {
      if ($dm[$i - 1][$j] == $dm[$i][$j])
      {
        $diffValues[] = $from[$i];
        $diffMask[] = -1;
        $i--;
        continue;
      }
    }
    {
      $diffValues[] = $from[$i];
      $diffMask[] = 0;
      $i--;
      $j--;
    }
  }

  $diffValues = array_reverse($diffValues);
  $diffMask = array_reverse($diffMask);

  return array('values' => $diffValues, 'mask' => $diffMask);
}

function diffline($line1, $line2)
{
  $diff = computeDiff(str_split($line1), str_split($line2));
  $diffval = $diff['values'];
  $diffmask = $diff['mask'];

  $n = count($diffval);
  $pmc = 0;
  $result = '';
  for ($i = 0; $i < $n; $i++)
  {
    $mc = $diffmask[$i];
    if ($mc != $pmc)
    {
      switch ($pmc)
      {
        case -1: $result .= '</del>'; break;
        case 1: $result .= '</ins>'; break;
      }
      switch ($mc)
      {
        case -1: $result .= '<del>'; break;
        case 1: $result .= '<ins>'; break;
      }
    }
    $result .= $diffval[$i];

    $pmc = $mc;
  }
  switch ($pmc)
  {
    case -1: $result .= '</del>'; break;
    case 1: $result .= '</ins>'; break;
  }

  return $result;
}



echo diffline($string1, $string2);
