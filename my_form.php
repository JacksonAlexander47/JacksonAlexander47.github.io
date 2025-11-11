<!DOCTYPE html>
<html>

<head>
	
	<meta name="author" content="Jackson ALexander">
	<link rel="stylesheet" href="my_style.css">
	<style>
		#title{
			background-color: purple;
			margin: auto;
			height: 10%;
			width: 32%;
		}
		
		#quiz{
			background-color: #484848;
		}
		
		h3{
			background-color: purple;
		}
		
		footer{
			background-color: purple;
		}
	</style>
	
	
</head>

<body style="background-color:#383838;">

<?php 
	include 'nav.html';
?>
	
	
	<fieldset id="quiz">
	<legend id="title">how much of a gaiter are you?</legend>
	<form onsubmit="return validate()" action="quiz_verification.php" method="get">
	<!-- how much of a gaiter are you?--> 
	
	
		<h3>what is your name?</h3>
		<input type="text" id="name" name="name" value="enter name">
		<br><br>
		
		<h3>what is your email?</h3>
		<input type="email" id="email" name="email" value="enter email">
		<br><br>
		
		<h3>Have you walked the arches?</h3>
		<label for="yes">Yes I have walked the arches</label>
		<input type="radio" name="q1" id="yes" value="yes">
		
		<label for="no">No I have not walked the arches</label>
		<input type="radio" name="q1" id="no" value="no">
		<br><br>
		
		<h3>what is the unnofficial drink of Bishop's university</h3>
		<label for="choice1">swamp water</label>
		<input type="radio" id="choice1" name="q2" value="swamp water">
		<br>
		<label for="choice2">alligator ale</label>
		<input type="radio" id="choice2" name="q2" value="alligator ale">
		<br>
		<label for="choice3">purple jesus</label>
		<input type="radio" id="choice3" name="q2" value="purple jesus">
		<br><br>
		
		<h3>what is the name of the dining hall on campus</h3>
		<label for="choice1">Dewie's</label>
		<input type="radio" id="choice1" name="q3" value="Dewie's">
		<br>
		<label for="choice2">Doowee's</label>
		<input type="radio" id="choice2" name="q3" value="Doowee's">
		<br>
		<label for="choice3">Dewhorts</label>
		<input type="radio" id="choice3" name="q3" value="Dewhorts">
		<br><br>
		
		<h3>what is the official colour of Bishop's university</h3>
		<label for="choice1">blue</label>
		<input type="radio" id="choice1" name="q4" value="blue">
		<br>
		<label for="choice2">purple</label>
		<input type="radio" id="choice2" name="q4" value="purple">
		<br>
		<label for="choice3">teal</label>
		<input type="radio" id="choice3" name="q4" value="teal">
		<br><br>
		
		<h3>what is the mascot of Bishop's university</h3>
		<label for="choice1">alligator</label>
		<input type="radio" id="choice1" name="q5" value="alligator">
		<br>
		<label for="choice2">crocodile</label>
		<input type="radio" id="choice2" name="q5" value="crocodile">
		<br>
		<label for="choice3">caiman</label>
		<input type="radio" id="choice3" name="q5" value="caiman">
		<br><br>
		<input type="submit" style="background-color: purple;">
		
		
	</form>
	</fieldset>
	
	<script>
		function validate(){
			
			let name = document.getElementById('name');
			
			let email = document.getElementById('email');
		
		if(!name || !email){
			window.alert("fill in both the name and email fields");
			return false;
		}
		
		return true;
		}
	</script>
	
	<?php 
		include 'footer.php';
	?>

</body>


</html>