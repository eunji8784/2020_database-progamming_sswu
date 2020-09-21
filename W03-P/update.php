<?php
  $link = mysqli_connect('localhost','root','rootroot','dbp');
  $query = 'SELECT * FROM food';
  $result = mysqli_query($link, $query);
  $list = '';
  while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => 'Welcome',
    'description' => 'My favorite food is ...'
  );

  if( isset($_GET['id']) ) {
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "SELECT * FROM food WHERE id={$filtered_id}";
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
  <title> My favorite food is </title>
</head>
<body>
  <h1 style="background-color:orange;"><a href="index.php"> My favorite food is </a></h1>
  <ol> <?= $list ?> </ol>
  <form action="process_update.php" method="post">
    <input type="hidden" name="id" value="<?=$filtered_id?>">
    <p><input type="text" name="title" placeholder="title"
    value="<?=$article['title']?>"></p>
    <p><textarea name="description"
    placeholder="description"><?=$article['description']?></textarea></p>
    <p><input type="submit"></p>
  </form>
</body>
</html>
