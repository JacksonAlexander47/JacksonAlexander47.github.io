
function splitAtRoot(path){
	//creates a new url object
	const url = new URL(path, location.origin);
	//pulls the absolute path from the url object 
	const pathFromRoot = url.pathname;
	//prints the path to the document 
	document.write("<br>----> path from root: " + pathFromRoot);
	//returns the path 
		return pathFromRoot
}




function setNav(current_path){
	console.log("function called");
	//"relative" path of the current page 
	current_path = splitAtRoot(current_path);
	fetch("nav.html")
	.then( r => r.text())
	.then(html => 
		document.getElementById("main-nav").innerHTML = html);
		
		
		let paths = document.querySelectorAll("ul#ListOfPaths li");
		paths.forEach(path => {
			if(splitAtRoot(path.firstChild.href) == current_path){
				path.classList.add("current");
			}
		}
		)
	}
	
