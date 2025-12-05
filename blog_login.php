<?php include "includes/config.php";
	    session_start();
			
			$file = "login_attempts.json";
			$_message = "Please log in";
			
			//if the user has already logged in this session redirect to blog.php
			if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true){
				if ($_SERVER['SERVER_NAME'] === 'localhost') {
					$BASE_URL= $_SERVER['HTTP_HOST'] . '/JacksonAlexander47';
				} else if ($_SERVER['SERVER_NAME'] === 'osiris.ubishops.ca'){
					$BASE_URL= $_SERVER['HTTP_HOST'] . '/home/jalexander';
				} else {
					$BASE_URL= $_SERVER['HTTP_HOST'];
				}
				
				header('Location: http://' . $BASE_URL . '/blog.php');
				exit();
				
			}

			//loading the login attempts file 
			if(file_exists($file)){
					$attempts = json_decode(file_get_contents($file), true);
				}
				

			//if a password has been entered
			if(isset($_POST["user_pass"])){
				
				//there should always be a username at this point anyways but better safe than sorry
				if(isset($_COOKIE["username"])){
					$user = $_COOKIE["username"];
				}
				else{
					$user = "guest";
				}
				
				if(!isset($attempts[$user])){
					$attempts[$user]=[
					'attempts'=>0,
					'locked_until'=>""
					];
				}
				
				//if the user is not locked out 
				if($attempts[$user]['locked_until'] <= time()){
					
					//if the users password is correct
					if(hash("sha256", $_POST["user_pass"]) === "b14e9015dae06b5e206c2b37178eac45e193792c5ccf1d48974552614c61f2ff"){
						
						
						setcookie('username', $_POST["user_name"], time() + 3600);
						
						if ($_SERVER['SERVER_NAME'] === 'localhost') {
							$BASE_URL= $_SERVER['HTTP_HOST'] . '/JacksonAlexander47';
						} else if ($_SERVER['SERVER_NAME'] === 'osiris.ubishops.ca'){
							$BASE_URL= $_SERVER['HTTP_HOST'] . '/home/jalexander';
						} else {
							$BASE_URL= $_SERVER['HTTP_HOST'];
						}
						
						$_SESSION['is_logged_in']= true;
						header('Location: http://' . $BASE_URL . '/blog.php');
						exit();
					}
					else{
						$attempts[$user]['attempts'] += 1;
						$_message = "incorrect password, this is attempt # " . (string)$attempts[$user]['attempts'];
						if($attempts[$user]['attempts'] >= 3){
							$attempts[$user]['locked_until']= time() + (30);
							$attempts[$user]['attempts'] = 0;
							$_message = "too many incorrect passwords, you are locked out for " . ($attempts[$user]['locked_until'] - time());
						}
					}
				}
				else{
					$_message = "too many incorrect passwords, you are locked out for " . ($attempts[$user]['locked_until'] - time());
				}
			
		}
		
		file_put_contents($file, json_encode($attempts));
		function autofill(){
			if(isset($_COOKIE["username"])){
				echo $_COOKIE["username"];
			}
			else{
				echo "username";
			}
			return;
		}

?>




<!DOCTYPE html>
<html>

<head>
		<meta name="author" content="Jackson Alexander">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="my_style.css">
</head>

<body>
	<?php 
	include "includes/nav.html";
	echo $_message;
	echo "<br><br>";
	?>
	
	
	<form action="login.php" method="post">
	
		<label for="name">what is your username?</label>
		<input type="text" name="user_name" id="name" value= "<?php autofill()?>" >
		<br><br>
		
		<label for="pass">what is your password?</label>
		<input type="password" name="user_pass" id="pass">
		<br><br>
		
		<input type="submit">
	</form>

	<?php 
	include "includes/footer.php"
	?>
</body>

</html>