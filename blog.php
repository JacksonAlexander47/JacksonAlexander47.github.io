<!DOCTYPE html>
<html>

	<head>

		<script src="https://cdn.tailwindcss.com"></script>
		<link rel="stylesheet" href="my_style.css">

	</head>
	
	<?php 
	//loading the json file 
	$posts = file_get_contents("posts.json"); 

	if ($_SERVER['SERVER_NAME'] === 'localhost') {
					$BASE_URL= $_SERVER['HTTP_HOST'] . '/JacksonAlexander47';
				} else if ($_SERVER['SERVER_NAME'] === 'osiris.ubishops.ca'){
					$BASE_URL= $_SERVER['HTTP_HOST'] . '/home/jalexander';
				} else {
					$BASE_URL= $_SERVER['HTTP_HOST'];
				}
				
				$Write_url = 'http://' . $BASE_URL . '/write_post.php';
	?>

	<body class="h-screen flex flex-col">
		<?php include 'includes/nav.html'?>
	
		<button onclick="add_post()" class="relative right-0"> add a blog post</button>
		
		<div class="bg-gray-500 border-2 border-gray-600">

			<h1 class="text-center"><b>hero section</b></h1>

			<p class="text-center">
				the purpose of this blog is to write a little bit about the courses that I have taken this semester at Bishop's university
			</p>

			

		</div>

		<div class="flex h-full">

			<!-- list of posts -->
			<div class=" bg-gray-500 w-1/6 h-full border-2 border-gray-600 flex justify-center">

				<div class="justify-center" id="posts_list">
					<ul id="post_list">

					</ul>

				</div>

			</div>

			<!-- blog posts -->
			<div class="float right w-5/6 bg-gray-400 h-full" id="posts_display">
				
			</div>

		</div>

		 <?php include 'includes/footer.php'?>

	<script>

    var post_array = <?php echo $posts; ?>;

    var display = document.getElementById("posts_display");
    var post_list = document.getElementById("post_list");
    var identifier = 0;

    for (const title in post_array) {
        const content = post_array[title];

        const container = document.createElement('div');
        container.id = "post_" + identifier;

        const header = document.createElement('h2');
        header.textContent = title;

        const paragraph = document.createElement('p');
        paragraph.textContent = content;

        container.appendChild(header);
        container.appendChild(paragraph);
        display.appendChild(container);

        const listing = document.createElement('li');
        const link = document.createElement('a');
        link.href = "#post_" + identifier;
        link.textContent = title;

        listing.appendChild(link);
        post_list.appendChild(listing);

        identifier++;
    }

	function add_post(){
		window.location.href = "<?php echo $Write_url?>";
	}

</script>

	</body>
</html>
	