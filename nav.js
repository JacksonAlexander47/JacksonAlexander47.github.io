function setNav(){
	fetch("nav.html")
	.then( r => r.text())
	.then(html => getElementById("main-nav").innerHTML = html);
}