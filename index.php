<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Hello, <?php echo $user_data['user_name'];echo "<br>";echo $user_data['money']; ?>
    <br>
    <a href="packs.php">packs</a><br>
    <a href="album.php">album</a><br>
    <a href="sell.php">sell</a><br>
    <a href="auctions.php">auctions</a>
</body>
</html>