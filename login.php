<!DOCTYPE html>
<html>

<head>
		<meta name="author" content="Jackson Alexander">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="my_style.css">
</head>

<body>
	<?php 
		if(isset($_POST["user_pass"])){
			echo "pass present";
			if(hash("sha256", $_POST["user_pass"]) === "b14e9015dae06b5e206c2b37178eac45e193792c5ccf1d48974552614c61f2ff"){
				echo "pass is correct";
				
				if ($_SERVER['SERVER_NAME'] === 'localhost') {
					$BASE_URL= $_SERVER['HTTP_HOST'] . '/JacksonAlexander47';
				} else if ($_SERVER['SERVER_NAME'] === 'osiris.ubishops.ca'){
					$BASE_URL= $_SERVER['HTTP_HOST'] . '/home/students/jalexander';
				} else {
					$BASE_URL= $_SERVER['HTTP_HOST'];
				}
				header('Location: http://' . $BASE_URL . '/to-do.php');

			}
			
		}
	
	include "nav.html"
	?>
	
	
	<form action="login.php" method="post">
	
		<input type="password" name="user_pass">
		
		<input type="submit">
	</form>

	<?php 
	include "footer.php"
	?>
</body>

</html>