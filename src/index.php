<?php
	$host = getenv('DB_HOST');
	$user = getenv('DB_USER');
	$pass = getenv('DB_PASS');
	$name = getenv('DB_NAME');
	echo "mysqli_connect($host, $user, $pass, $name);<br>";
	$conn = mysqli_connect($host, $user, $pass, $name);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "<b>Connection successfull</b>";
	mysqli_close($conn);
