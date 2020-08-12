<!DOCTYPE html>
<html>
<head>
	<title>PriceCompareIndia - Compare computer part prices in india</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="description" content="A site for you to compare prices of computer parts in india from mdcomputers, vedantcompters and primeabgb and find the best price of the product.More Sites will be added soon.">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<script type="text/javascript">
			window.addEventListener('DOMContentLoaded', (event) => {
		   		var about = document.getElementById("about");
				var navbar = document.getElementsByClassName("navbar");
				var darkmodeButton = document.getElementById("darkmode");
				var button = document.getElementsByClassName("button");
				console.log(localStorage.getItem("dark-mode"));
		   		
		   		if(localStorage.getItem("dark-mode") == "enabled"){	
					about.classList.add("dark-mode");
					navbar[0].classList.add("dark-mode");
					navbar[1].classList.add("dark-mode");
					darkmodeButton.innerHTML = "Light Mode";
					darkmodeButton.classList.add("dark-mode");
					button[0].innerHTML = "Light Mode";
					button[0].classList.add("dark-mode");
				}
				else{
					about.classList.remove("dark-mode");
					navbar[0].classList.remove("dark-mode");
					navbar[1].classList.remove("dark-mode");
					darkmodeButton.innerHTML = "Dark Mode";
					darkmodeButton.classList.remove("dark-mode");
					button[0].innerHTML = "Light Mode";
					button[0].classList.remove("dark-mode");
				}
			});
		// }
	</script>
	<div class="navbar">
		<a href="index.php" id="up">Home</a>
		<form id="search" action="search.php" method="GET">
			<input type="text" name="search" id="searchBar" placeholder="Search....">	
		</form>
		<button onclick="darkmode()" id="darkmode">Dark Mode</button>
	</div>
	<div id="about">
		<h1>Price Compare</h1>
		<p>A site for you to compare prices of computer parts from mdcomputers, vedantcompters and primeabgb.<div> More Sites will be added soon.</div></p>
	</div>
	<div id="bottomnavbar" class="navbar">
		<a href="index.php">Home</a>
		<button onclick="darkmode()" class="button">dark-mode</button>
	</div>
	<script type="text/javascript">
		function darkmode(){
			var about = document.getElementById("about");
			var navbar = document.getElementsByClassName("navbar");
			var darkmodeButton = document.getElementById("darkmode");
			var button = document.getElementsByClassName("button");
			about.classList.toggle("dark-mode");
			navbar[0].classList.toggle("dark-mode");
			navbar[1].classList.toggle("dark-mode");

			if(navbar[0].classList.contains("dark-mode")){
				localStorage.setItem("dark-mode","enabled");
				darkmodeButton.innerHTML = "Light Mode";
				darkmodeButton.classList.add("dark-mode");
				button[0].innerHTML = "Light Mode";
				button[0].classList.add("dark-mode");
			}
			else{
				localStorage.setItem("dark-mode","disabled");
				darkmodeButton.innerHTML = "Dark Mode";
				darkmodeButton.classList.remove("dark-mode");
				button[0].innerHTML = "Dark Mode";
				button[0].classList.remove("dark-mode");
			}
		}
	</script>
</body>
</html>