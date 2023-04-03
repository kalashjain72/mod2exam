<?php
try {
require_once("connection.php");
require_once("book.php");
} catch (error) {
header("Location: index.php?message=error_in_database");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the book details from the POST request
  $book_id = $_POST['book_id'];
  $book_title = $_POST['book_title'];
  $genre = $_POST['genre'];
  $publication_date = $_POST['publication_date'];
  $author = $_POST['author'];
  $ratings = $_POST['ratings'];
  $category = $_POST['category'];
  $poster_image = $_FILES['poster_image'];
  // Create a new Book object with the book details
  $book =new book($book_id, $poster_image, $book_title, $genre, $publication_date, $author, $ratings, $category);

  $book->addBooks($conn);

}
?>