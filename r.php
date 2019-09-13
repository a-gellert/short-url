<?php

$s_key = $_SERVER['REQUEST_URI'];

$rest = substr($s_key, 7);
$link = new mysqli('localhost','id10843771_alexander','123456','id10843771_test_goto_db');

$exurl=mysqli_query($link,"SELECT `url` FROM `short` WHERE `short_key`='$rest'")or die("Ошибка " . mysqli_error($link));


if ($exurl->num_rows > 0) {
  // output data of each row from $result
  while($row = $exurl->fetch_assoc()) {
    header('Location: '.$row['url']) ;
  }
}
else {
  echo '0 results';
}

mysqli_close($link);


 ?>