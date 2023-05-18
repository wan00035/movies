<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Movie</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main class="main">
    <header class="header">
      <h1 class="header-title">Movie Mayhem</h1>
      <nav class="nav">
        <a class="nav-link" href="index.php">Movies</a>
        <a class="nav-link" href="new.php">New Movie</a>
      </nav>
    </header>
    <h2 class="form-title">New Movie</h2>
    <form class="form" method="post">
      <input type="text" class="form-control" name="movie_title" placeholder="Movie Title" required>
      <input type="text" class="form-control" name="director" placeholder="Director" required>
      <input type="number" class="form-control" name="year" placeholder="Year" required>
      <select class="form-control" name="genre_id">
          <option value="1">Fantasy</option>
      </select>
      <button type="submit" class="button">Add Movie</button>
    </form>
  </main>
</body>
</html>