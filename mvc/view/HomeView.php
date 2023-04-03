<?php
session_start();
require_once("../vendor/autoload.php");
use Model\Book;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../public/css/style/home.css">
  <title>HomePage</title>
</head>
<body>
	<!-- Navbar -->
	<nav>
		<ul>
			<li><a href="/index.php?controller=Login&function=logout">Logout</a></li>
			<li><a href="#">Wishlist</a></li>
			<li><a href="#">Bucket List</a></li>
		</ul>
	</nav>

	<!-- Books -->
	<section>
  <h2>Books</h2>
    <div class=book>
		
		
    <?php
    // Fetch books from database
    
    $books = Book::fetchBooks();
    // Loop through the books and print their details
    foreach ($books as $book) {
      echo "<div class= book-block>";
      echo "<a href='continue.php?id=$book->book_id'><img src='$book->poster_image' alt='$book->book_title'></a>";
      echo '<h3>' . $book->book_title . '</h3>';
      echo '<p>' . $book->author . '</p>';
      echo " <a href='bucketlist.php?id=$book->book_id'><button>Add to BucketList</button></a>";
      echo '</div> ';
    }    
    ?>
    </div>
		<button>Load More</button>
	</section>
</body>
</html>
