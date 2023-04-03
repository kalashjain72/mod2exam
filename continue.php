<?php
    session_start();
    try {
      require_once("connection.php");
    } catch (error) {
    header("Location: error.php?error=cant_connect_to_data_base");
    }

    $userId = $_SESSION['username'];
    $book_id = $_GET['id'];

    // Insert data into the continue table
    $sql = "INSERT INTO `continue_read` ( `email`, `book_id`) VALUES ('$userId','$book_id' );";
    // Execute the query
    
    $result = mysqli_query($conn, $sql);
    if($result){
      header("Location: profile.php?message=added_succesfully");
    } else {
      header("Location: home?error=book_not_added");
    }
?>