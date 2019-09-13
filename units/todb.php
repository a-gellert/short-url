<!DOCTYPE html>
<html lang="ru">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial - scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/css/style.css">
	<title>GoTo</title>
</head>
<body>
<div class = "py-3 text-center">
  
<img class="d-block mx-auto" src="/images/logo.png" alt="" width="72" height="72">

<h2 class="mb-4">Сервис сокращения ссылок</h2>
 <p class="lead mb-4">Полученный URL</p>

<?php
$mysql = new mysqli('localhost','id10843771_alexander','123456','id10843771_test_goto_db');
$url = filter_var(trim($_POST['url']), FILTER_SANITIZE_STRING);


$result = '';
function getRandomWord($len = 5) {
    $word = array_merge(range('a', 'z'), range('0', '9'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}
$result = getRandomWord();

 echo "astounded-means.000webhostapp.com/r.php/", $result;

$mysql->query("INSERT INTO `short`(`url`, `short_key`) VALUES('$url', '$result')");

$mysql->close();

 ?>
 <p class="lead mt-4 mb-4">Введите адрес в данное поле</p>
		<form method="post" action="todb.php">
			<input  type="text" class="container" placeholder="http://..." name="url" value="" required=""><br>
			<button class="btn btn-success mt-2" type="submit">Сократить</button>
		</form>