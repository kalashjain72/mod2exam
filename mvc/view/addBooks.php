<?php   
session_start();
if($_SESSION['role']=='admin'){

} else {
  session_destroy();
  header("Location: index.php?message=login_as_admin!!");
}?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADD BOOKS Page</title>
	<link rel="stylesheet" type="text/css" href="./style/add_books.css">
</head>
<body>
<header>
    <nav>
        <ul class="list">
        <li>Hello admin <?php echo $_SESSION['username']; ?></li>
        </li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>

	<div class="books-box">
		<h1>Add books</h1>
		<form action="/index.php?controller=User&function=add" method="POST" enctype="multipart/form-data">
  <label for="book_id">Book ID:</label>
  <input type="text" id="book_id" name="book_id" required>

  <label for="poster_image">Poster Image:</label>
  <input type="file" id="poster_image" name="poster_image" accept="image/*" required>

  <label for="book_title">Book Title:</label>
  <input type="text" id="book_title" name="book_title" required>

  <label for="genre">Genre:</label>
  <input type="text" id="genre" name="genre" required>

  <label for="publication_date">Publication Date:</label>
  <input type="date" id="publication_date" name="publication_date" required>

  <label for="author">Author:</label>
  <input type="text" id="author" name="author" required>

  <label for="ratings">Ratings:</label>
  <input type="number" id="ratings" name="ratings" min="0" max="5" required>

  <label for="category">Category:</label>
  <select id="category" name="category" required>
    <option value="fiction">Fiction</option>
    <option value="non-fiction">Non-fiction</option>
  </select>

  <input type="submit" value="Submit">
</form>

    </div>
</body>
</html>
