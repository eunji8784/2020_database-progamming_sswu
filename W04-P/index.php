<?php
  $link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');
  $query = "SELECT * FROM food";
  $result = mysqli_query($link, $query);
  $list ='';
  while ($row = mysqli_fetch_array($result)) {
      $escaped_title = htmlspecialchars($row['title']);
      $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
  }

  $article = array(
    'title' => 'Welcome',
    'description' => 'My favorite food is ...'
  );

  $update_link = '';
  $author = '';
  $delete_link = '';

  if (isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
      $query = "SELECT * FROM food LEFT JOIN author on
      food.author_id = author.id WHERE food.id={$filtered_id}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $article['title'] = htmlspecialchars($row['title']);
      $article['description'] = htmlspecialchars($row['description']);
      $article['name'] = htmlspecialchars($row['name']);

      $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
      $delete_link = '
        <form action="process_delete.php" method="post">
          <input type="hidden" name="id" value="'.$_GET['id'].'">
          <input type="submit" value="delete">
        </form>
      ';

      $author = "<p>by {$article['name']}</p>";
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <img src="title.png" width="30%" height="30%">
    <title>My favorite food is</title>
  </head>
  <body>
    <h1 style="background-color:orange;"><a href="index.php">My favorite food is</a></h1>
    <a href="author.php">author</a>
    <ol><?= $list ?></ol>
    <a href="create.php">create</a>
    <?= $update_link ?>
    <?= $delete_link ?>
    <h2 style="color:Tomato;"><?= $article['title'] ?></h2>
    <?= $article['description'] ?>
    <?= $author ?>
  </body>
</html>
