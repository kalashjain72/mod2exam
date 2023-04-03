<?php
session_start();
try {
  require_once("connection.php");
} catch (error) {
header("Location: error.php?error=cant_connect_to_data_base");
}

class Book {
  public $book_id;
  public $poster_image;
  public $book_title;
  public $genre;
  public $publication_date;
  public $author;
  public $ratings;
  public $category;

  // Constructor
  public function __construct($book_id, $poster_image, $book_title, $genre, $publication_date, $author, $ratings, $category) {
    $this->book_id = $book_id;
    $this->poster_image = $poster_image;
    $this->book_title = $book_title;
    $this->genre = $genre;
    $this->publication_date = $publication_date;
    $this->author = $author;
    $this->ratings = $ratings;
    $this->category = $category;
  }

  // Method to add the book to the database
  public function addBooks($conn){
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($_FILES['poster_image']['name']);
    move_uploaded_file($_FILES['poster_image']['tmp_name'], $target_file);

    $sql = "INSERT INTO books (book_id, poster_image, book_title, genre, publication_date, author, ratings, category) VALUES ('$this->book_id', '$target_file', '$this->book_title', '$this->genre', '$this->publication_date', '$this->author', '$this->ratings', '$this->category')";

      $result =mysqli_query($conn,$sql);
      if($result){
        header("Location: add_books.php?message=added_succesfully");
      } else {
        header("Location: add_books.php?error=book_not_added");
      }
  }
  
  public static function fetchBooks($conn) {
  
    $sql = "SELECT * FROM books";

    $result = mysqli_query($conn, $sql);

    // If there are no results, return an empty array
    if (!$result || mysqli_num_rows($result) == 0) {
      return [];
    }
    
    // Otherwise, loop through the results and create a Book object for each row
    $books = [];
    while ($row = mysqli_fetch_assoc($result)) {
      
      $book = new Book(
        $row['book_id'],
        $row['poster_image'],
        $row['book_title'],
        $row['genre'],
        $row['publication_date'],
        $row['author'],
        $row['ratings'],
        $row['category']
      );
      $books[] = $book;
    }
  
    return $books;
  }





}
?>