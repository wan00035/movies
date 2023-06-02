<?php
 require "data.php";
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $new =[
    'movie_id'=> $_POST['movie_id'],
    'movie_title'=> $_POST['movie_title'],
    'director'=> $_POST['director'],
    'year'=> $_POST['year'],
    'genre'=>$_POST['genre']
  ];

   $movies = array_map(function($m) use($new){
    if ($m['movie_id'] == $new['movie_id']){
      return $new;
    }
    return $m;
   }, $movies);

   $_SESSION['movies']= $movies;

   header("Location: movie.php?id=" .$movie['movie_id']);
 }
 if(isset($_GET['id'])){
   $movie = current(array_filter($movies, function($movie){
       //return $movie['movie_id'] == ($_GET['id']);
       //return $movie['movie_id'] === (int)($_GET['id']);
       return $movie['movie_id'] == intval($_GET['id']);
   }));
 

   //  var_dump($movie);
   //  exit();
    if(!$movie){
  header("Location: index.php");
 }
}else{
  header('Location: index.php');
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Movie</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main class="main">
    <?php require "header.php"; ?>
    <h2 class="form-title">Edit Movie</h2>
    <form class="form" method="post">
    <input type="hidden" name="movie_id" value="<?php echo $movie['movie_id'];?>">
      <input type="text" class="form-control" name="movie_title" placeholder="Movie Title" required value="<?php echo $movie['movie_title'];?>">
      <input type="text" class="form-control" name="director" placeholder="Director" required value="<?php echo $movie['director'];?>">
      <input type="number" class="form-control" name="year" placeholder="Year" required
          value="<?php echo $movie['year'];?>">
      <div class="error text-danger"></div>    
      <select class="form-control" name="genre">
          <option value="">Select a Genre</option>
          <?php foreach($genres as $genre):?>
            <option value ="<?php echo $genre;?>">
             <?php if ($genre === $movie['genre']):?> selected <?php endif;?>
          <?php echo $genre;?>
          </option>
          <?php endforeach;?>
      </select>
      <div class="error text-danger"></div>
      <button type="submit" class="button">Update Movie</button>
    </form>
    <form class="form" method="post" action="delete.php">

      <input type="hidden" name="movie_id" value="<?php echo $movie['movie_id'];?>">
      <button class="button danger"> Delete Movie</button>
    </form>
  </main>
</body>
</html>