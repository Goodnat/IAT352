<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>

<?php

// if(isset($_POST['textdata'])){
// 	$data=$_POST['textdata'];
// 	$fp=fopen('data.txt','a');
// 	fwrite($fp,$data);
// 	fclose($fp);
// }

// echo "<html><head></head><body>";
// $username=(!empty($_GET['username'])?$_GET['username']:"");
//
$fail = false;

if (isset($_POST['username']) && isset($_POST['password'])) {
	$file = "filetest.txt";

	if ($handle = fopen("$file", "r")) {
		while (!feof($handle)) {
			$line = explode(",", trim(fgets($handle)));
			if ($line[0] == $_POST['username'] && $line[2] == $_POST['password']) {
				//Header("Location: register.php");
				echo "<p>Successful login<p>";
				exit;
			}
		}
		$fail = true;
	}
}

if ($fail == true) {
	echo "<p>Login fail try again</p>";
}

?>


<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
	<input type="text" name="username" placeholder="Username" required />
	<input type="password" name="password" placeholder="Password" required />
	<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='register.php'>Register Here</a></p>
</div>


</body>
</html>