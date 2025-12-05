<!DOCTYPE html>
<html>
<?php 

//loading the json storing the posts 
$file = "posts.json";

//if there is content in the post, we write it to the json
if(isset($_POST['blog_title']) && isset($_POST['blog_content'])){

    //loading the json contents into an array or creating a new array if the json is empty 
    $posts = json_decode(file_get_contents($file), true) ?? [];

    //writing the values from the post request into the array
    $posts[$_POST['blog_title']] = $_POST['blog_content'];
    

    //encoding the array as json then writing it back into the json file
    file_put_contents($file, json_encode($posts));   
}

?>
<head>
    <meta name="author" content="Jackson Alexander">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="my_style.css">
</head>

<body>

    <?php include "includes/nav.html";?>

    <form action="write_post.php" method="post">

        <label for="title">what is the title of your post?</label>
        <input type="text" name="blog_title" id="title">

        <label for="title">enter the content of your post</label>
        <input type="text" name="blog_content" id="content">

        <input type="submit">

    </form>
</body>

</hmtl>