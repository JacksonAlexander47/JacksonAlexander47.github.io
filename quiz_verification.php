<!DOCTYPE html>
<html>

<head>

		<meta name="author" content="Jackson Alexander">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="my_style.css">
		
		<style>
			.image-container{
				float: left;
				height: 20%;
				width: 30%;
			}
			
			.image{
				width: 100%;
				height: 100%;
			}
			
			.selected{
				border: 5px solid purple;
			}
		
		
		</style>
		
</head>

<body style="background-color:#383838;">

<?php

include 'includes/nav.html';

$input_length = count($_GET);


if($input_length != 7){
	echo "make sure all fields in the form have been filled out";
	echo $input_length;
	exit;
}

$array = ['q1','q2','q3','q4','q5'];

foreach($array as $question){
	if(!isset($_GET[$question]) || $_GET[$question] === ""){
		echo "make sure each question in the form has been answered";
		exit;
}
}



// calculating the user's score 
$score = 0;

if($_GET['q1'] === "yes"){
	$score++;
};

if($_GET['q2'] === "purple jesus"){
	$score++;
};

if($_GET['q3'] === "Dewie's"){
	$score++;
};

if($_GET['q4'] === "purple"){
	$score++;
};

if($_GET['q5'] === "alligator"){
	$score++;
};

include 'includes/footer.php';

$category = 'a';

if($score >= 2.5){
	$category = 'b';
}

if($score == 5){
	$category = 'c';
}
?>

<h3 id="result" style="background:purple;"></h3>
<br>

<!-- survey outcomes -->
<div>

	<div class="image-container" id="babyGator">
		<img src="includes/baby-alligator.jfif" class="image">
	</div>
	
	<div class="image-container" id="Gator">
		<img src="includes/alligator.jfif" class="image">
	</div>
	
	<div class="image-container" id="bigGator">
		<img src="includes/big-gator.jfif" class="image">
	</div>

</div>


<script>
	let category = "<?php echo $category?>";
	let score = "<?php echo $score?>";
	let result = "undefined";
	
	if(category == 'a'){
		document.getElementById("babyGator").classList.add("selected");
		result = "baby gator";
	}
	
	if(category == 'b'){
		document.getElementById("Gator").classList.add("selected");
		result = "gator";
	}
	
	if(category == 'c'){
		document.getElementById("bigGator").classList.add("selected");
		result = "big gator";
	}
	
	console.log(category);
	
	let message = "your score is: " + score + " out of 5, you are a " + result;
	
	document.getElementById("result").textContent = message;
</script>



</body>

</html>