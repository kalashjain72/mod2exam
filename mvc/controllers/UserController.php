<?php

namespace Controller;

use Model\book;

/**
 * @file
 * It contains the controller file for authenticated users and their functionality like ADD 
 */

/**
 * Class for controller which handles all the authenticated user, and if not then redirect to homepage.
 */
class UserController
{

  /**
   * Whenever the object is cretaed it checks if user authenticated or not.
   */
  function __construct()
  {
    if (!isset($_SESSION['username'])) {
      header('location: /');
    }
  }



  //   * Function to add the book by a author.
      // @return array 
  //   */
  function add()
  {

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
      $book = new book($book_id, $poster_image, $book_title, $genre, $publication_date, $author, $ratings, $category);

      $book->addBooks();
    }
  }

    }

