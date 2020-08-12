<?php 

$term = $_GET["search"];

$mdcomputer = "./data/mdcomputer.csv";
$fh = fopen($mdcomputer,'r') 
 or die('Error occurred when open the file ' . $mdcomputer );
 
$found = array();
$price = array();
$search = explode(" ", $term);
while($rec = fgetcsv($fh)){
	$c=0;
	for ($i=0; $i < sizeof($search) ; $i++) { 
		// if(strpos(strtolower($rec[6]), $search[$i]) !== false){
		// 	$c++;
		// }
		if(preg_match("/{$search[$i]}/i", $rec[6])){
			$c++;
		}	
	}
	if($c === sizeof($search)){
		array_push($found, $rec[6]);
		array_push($price, ltrim($rec[7],'₹'));
	}
}

$vedantcomputer = "./data/vedantcomputer.csv";
$fh = fopen($vedantcomputer,'r') 
 or die('Error occurred when open the file ' . $vedantcomputer );
 
$found1 = array();
$price1 = array();
while($rec = fgetcsv($fh)){
	$c=0;
	for ($i=0; $i < sizeof($search) ; $i++) { 
		// if(strpos(strtolower($rec[6]), $search[$i]) !== false){
		// 	$c++;
		// }
		if(preg_match("/{$search[$i]}/i", $rec[2])){
			$c++;
		}	
	}
	if($c === sizeof($search)){
		array_push($found1, $rec[2]);
		array_push($price1, ltrim($rec[3],'₹'));
	}
}

$primeabgb = "./data/primeabgb.csv";
$fh = fopen($primeabgb,'r') 
 or die('Error occurred when open the file ' . $primeabgb );
 

$found2 = array();
$price2 = array();
while($rec = fgetcsv($fh)){
	$c=0;
	for ($i=0; $i < sizeof($search) ; $i++) { 
		// if(strpos(strtolower($rec[6]), $search[$i]) !== false){
		// 	$c++;
		// }
		if(preg_match("/{$search[$i]}/i", $rec[4])){
			$c++;
		}	
	}
	if($c === sizeof($search)){
		array_push($found2, $rec[4]);
		array_push($price2, ltrim($rec[5],'₹'));
	}
}

// arsort($found);
// arsort($found1);
// arsort($found2);
array_multisort($price, SORT_NUMERIC, $found);
array_multisort($price1,SORT_NUMERIC, $found1);
array_multisort($price2,SORT_NUMERIC, $found2);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>comparePriceIndia</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
 	<script type="text/javascript">
		
			window.addEventListener('DOMContentLoaded', (event) => {
				var body = document.body;
				var navbar = document.getElementsByClassName("navbar");
				var content = document.getElementsByClassName("content");
				var card = document.getElementsByClassName("card");
				var button = document.getElementsByClassName("button");

				console.log(sessionStorage.getItem("dark-mode"));
		   		
		   		if(sessionStorage.getItem("dark-mode") == "enabled"){
					body.classList.add("dark-mode");
					navbar[0].classList.add("dark-mode");
					navbar[1].classList.add("dark-mode");
					content[0].classList.add("dark-mode");
					
					card[0].classList.add("dark-mode");
					card[1].classList.add("dark-mode");
					card[2].classList.add("dark-mode");
					
					button[0].classList.add("dark-mode");
					button[1].classList.add("dark-mode");
					button[1].innerHTML = "Light Mode";
					
					button[2].classList.add("dark-mode");
					button[3].classList.add("dark-mode");
					
					button[3].innerHTML = "Light Mode";
				}
				else{
					body.classList.remove("dark-mode");
					navbar[0].classList.remove("dark-mode");
					navbar[1].classList.remove("dark-mode");
		
					content[0].classList.remove("dark-mode");
					
					card[0].classList.remove("dark-mode");
					card[1].classList.remove("dark-mode");
					card[2].classList.remove("dark-mode");
					
					button[0].classList.remove("dark-mode");
					button[1].classList.remove("dark-mode");
					button[1].innerHTML = "Dark Mode";
					
					button[2].classList.remove("dark-mode");
					button[3].classList.remove("dark-mode");
					button[3].innerHTML = "Dark Mode";
				}

				if(sessionStorage.getItem("layout") == "row"){
					content[0].classList.add("row");
					card[0].classList.add("row");
					card[1].classList.add("row");
					card[2].classList.add("row");
				}
				else{
					content[0].classList.remove("row");
					card[0].classList.remove("row");
					card[1].classList.remove("row");
					card[2].classList.remove("row");
				}
			});
		// }
	</script>
 <div class="navbar">
		<a href="index.php" id="up">Home</a>
		<form id="search" action="search.php" method="GET">
			<input type="text" name="search" id="searchBar" placeholder="Search...." value="<?php echo $term; ?>">	
		</form>
		<button onclick="changeLayout()" class="button" id="up2">Change Layout</button>
		<button onclick="darkmode()" class="button" id="up3">dark-mode</button>
</div>
<div class="content">
		<div class="card">
			<a href="https://mdcomputers.in" target="_blank">
				<div class="title">MDComputer</div>
			</a>
			<?php for($i = 0;$i < count($found); $i++){echo(nl2br("<div>$found[$i]</div><div> ₹$price[$i]</div>"));} ?>
		</div>
		<div class="card">
			<a href="https://vedantcomputers.com" target="_blank">
				<div class="title">VedantComputer</div>
			</a>
			<?php for($i = 0;$i < count($found1); $i++){echo(nl2br("<div>$found1[$i]</div><div> ₹$price1[$i]</div>"));} ?>
		</div>
		<div class="card"><a href="https://www.primeabgb.com/" target="_blank">
			<div class="title">PrimeABGB</div>
		</a>
		<?php for($i = 0;$i < count($found2); $i++){echo(nl2br("<div>$found2[$i]</div><div> ₹$price2[$i]</div>"));} ?>
	</div>
</div>
<div id="bottomnavbar" class="navbar">
	<a href="index.php">Home</a>
	<button onclick="changeLayout()" class="button">Change Layout</button>
	<button onclick="darkmode()" class="button">dark-mode</button>
</div>

<script type="text/javascript">
	function darkmode(){
		var body = document.body;
		var navbar = document.getElementsByClassName("navbar");
		var content = document.getElementsByClassName("content");
		var card = document.getElementsByClassName("card");
		var button = document.getElementsByClassName("button");

		body.classList.toggle("dark-mode");
		navbar[0].classList.toggle("dark-mode");
		navbar[1].classList.toggle("dark-mode");	
		content[0].classList.toggle("dark-mode");
		card[0].classList.toggle("dark-mode");
		card[1].classList.toggle("dark-mode");
		card[2].classList.toggle("dark-mode");

		if(navbar[0].classList.contains("dark-mode")){
			sessionStorage.setItem("dark-mode","enabled");
			button[0].classList.add("dark-mode");
			button[1].classList.add("dark-mode");
			button[1].innerHTML = "Light Mode";
			button[2].classList.add("dark-mode");
			button[3].classList.add("dark-mode");
			
			button[3].innerHTML = "Light Mode";
		}
		else{
			sessionStorage.setItem("dark-mode","disabled");
			button[0].classList.remove("dark-mode");
			button[1].classList.remove("dark-mode");
			button[1].innerHTML = "Dark Mode";
			button[2].classList.remove("dark-mode");
			button[3].classList.remove("dark-mode");
			button[3].innerHTML = "Dark Mode";
		}
	}

	function changeLayout(){
		var content = document.getElementsByClassName("content");
		var card = document.getElementsByClassName("card");

		if(content[0].classList.contains("row")){
			content[0].classList.remove("row");
			card[0].classList.remove("row");
			card[1].classList.remove("row");
			card[2].classList.remove("row");
			sessionStorage.setItem("layout","column");
		}
		else{
			content[0].classList.add("row");
			card[0].classList.add("row");
			card[1].classList.add("row");
			card[2].classList.add("row");
			sessionStorage.setItem("layout","row");
		}
	}
</script>
 </body>
 </html>