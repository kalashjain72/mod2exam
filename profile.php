<?php   
session_start();
if($_SESSION['valid']){

} else {
  session_destroy();
  header("Location: index.php?message=Please_login!!");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./style/profile.css">
  <title>profile</title>
</head>
<body>
<header>
    <nav>
        <ul class="list">
          <li>Hello user <?php echo $_SESSION['username']; ?></li>
          </li><a href="home.php">Home</a></li>
		  	  <li><a href="logout.php">Logout</a></li>
		  	  <li><a href="#">Wishlist</a></li>
			    <li><a href="#">Bucket List</a></li>
        </ul>
        <nav>
		<ul>
      
    <section>
      <h3> continue reading</h3>
      <?php include("continue_read.php")?>
    </section>
		</ul>
</header>

</body>
</html>