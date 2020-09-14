<?php
  $link = mysqli_connect('localhost','root','rootroot','dbp');
  $query = 'SELECT * FROM food';
  $result = mysqli_query($link, $query);
  $list = '';
  while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => 'Welcome!',
    'description' => 'My favorite food is ...'
  );

  if( isset($_GET['id']) ) {
    $query = "SELECT * FROM food WHERE id={$_GET['id']}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
      'title' => $row['title'],
      'description' => $row['description']
    );
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <img src="title.png" width="30%" height="30%">
  <title> My favorite food is </title>
</head>
<body>
  <h1 style="background-color:powderblue;"><a href="index.php"> My favorite food is </a></h1>
  <ol> <?= $list ?> </ol>
  <a href="create.php" style="background-color:Orange;">add food</a>
  <h2 style="color:Tomato;"> <?= $article['title'] ?> </h2>
  <?= $article['description'] ?>
</body>
</html>
