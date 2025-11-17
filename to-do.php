<!DOCTYPE html>
<html>

<head>
<meta name="author" content="Jackson Alexander">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="my_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
	#input_form{
		background-color:#A9A9A9;
		border: 2px solid #000000;
	}
	
	li{
		margin:10px;
		background-color:#A9A9A9;
		border: 2px solid #000000;
	}
	span{
		color:OrangeRed;
	}
	label{
		color:OrangeRed;
	}
	

</style>
</head>


<body>

<?php 
	include 'nav.html';
?>

<form>
<fieldset id="input_form">
</form>

	<label for="task">task name</label><br>
	<input type="text" id="task"><br>
	
	<label for="add_task">add to list</label><br>
	<input type="button" id="add_task"><br>
	
</form>
</fieldset>

<ul id="to_do_list">

</ul>

<script> 
	// Load saved items from localStorage
	let items = JSON.parse(localStorage.getItem("items")) || [];
	renderList()  // We want show items in our list before adding new ones.

	const button = document.getElementById("add_task");
	const input = document.getElementById("task");
	
	function addItem(){
		let curr_task = input.value;
		if(curr_task.length == 0){
			alert("the input is empty");
		}
		else{
			// Save in storage
			const newItem = {
				text: curr_task,
				id: Date.now()  // unique timestamp-based id
			};
			items.push(newItem);
			localStorage.setItem("items", JSON.stringify(items));

			
			renderItem(curr_task); 
		}
	};
	
	function renderItem(item_text, id){
		const list = document.getElementById("to_do_list");
		
		const new_li = document.createElement('li');
		new_li.dataset.id = id;    // Store id in DOM
		
		const text_span = document.createElement('span');
		const trash_span = document.createElement('span');
		
		text_span.textContent = item_text;
		trash_span.classList.add('fas', 'fa-trash');
		new_li.appendChild(text_span);
		new_li.appendChild(trash_span);
		list.appendChild(new_li);
		
		trash_span.addEventListener("click", () => {
		
		items = items.filter(x => x.id !== id); // Remove based on unique id
		localStorage.setItem("items", JSON.stringify(items)); //Update localStorage
		new_li.remove();});
		
	};
	
	function renderList(){
      items.forEach((item, index) => {
          renderItem(item.text, item.id);
      })
	}

	
	button.addEventListener("click", addItem);
	

</script>
	<?php 
		include 'footer.php';
	?>
</body>

</html>