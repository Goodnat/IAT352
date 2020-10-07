<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	<?php

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
	$data = $_POST['username'] . "," . $_POST['email'] . "," . $_POST['password'] . "\n";
	//echo ($data);

	if ($handle = fopen('./filetest.txt', 'a+')) {
		// read this Hello World! from filetest.txt
		// fill in your own code. Hint! each character is 1 byte
		fwrite($handle, $data);
		fclose($handle);

		echo "<p>Successfull registration</p>";
		echo "<p>Go to <a href='login.php'>Logo in</a> page</p>";
	}

} else {
	?>
	<div class="form">
	<h1>Registration</h1>
	<form name="registration" action="register.php" method="post">
		<input type="text" name="username" placeholder="Username" required />
		<input type="email" name="email" placeholder="Email" required />
		<input type="password" name="password" placeholder="Password" required />
		<input type="submit" name="submit" value="Register" />
	</form>
</div>

<?php }?>




</body>
</html>