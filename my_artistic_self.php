<!DOCTYPE HTML>
<html>
	<head>
		<meta name="author" content="Jackson Alexander">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="my_style.css">

		<style>
			.keyword{
				font-family: 'times new roman', times, serif;
				position:relative;
			}
			#one{font-size:68px; color:DarkOrange; left:5%;}
			#two{font-size:62px; color:orange; left:20%;}
			#three{font-size:50px; color:GoldenRod; left:40%;}
			#four{font-size:38px; color:yellow; left:60%;}
			#five{font-size:26px; color:LightYellow; left:80%;}
			#img_div{
			background-image: url('number-5.jpg'); 
			width:65%; height:65%; 
			background-size:cover; 
			background-repeat:no-repeat; 
			background-position:center;
			margin:0 auto;
			}
		</style>
		<title>my_artistic_self</title>
		<meta> </meta>
	</head>
	<body>
	
	<?php 
			include 'nav.html';
		?>
		
		<div id="img_div">
		
			<p class="keyword" id="one">Curious</p>
			<p class="keyword" id="two">Present</p>
			<p class="keyword" id="three">Passionate</p>
			<p class="keyword" id="four">Flexible</p>
			<p class="keyword" id="five">Reliable</p>
		
		</div>
		<p>The painting that I chose was no 5 by Jackson Pollock. The Way that patterns seem to form when the artist i purposefully trying to be random reminds me that while life can seem random or cruel at times it is up to us to find meaning in it.
			As for the keywords that I chose,  I selected some traits that I think decribe me best as a person. I try to remain curious and learn from my experiences. I try to be present and make to make the most of each day. 
			I strive to spend my time doing what I am passionate about. I value being flexible and making the most out of any given situation. I make a pointof being reliable both professionally and especially personally as I value the relationships I have with my friends and family.
		</p>
		<!--buffer to avoid header overlapping with page elements-->
		<p style="height:1vh"></p>
		
		<?php 
			include 'footer.php';
		?>
	</body>

</html>