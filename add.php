<?php
require_once 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IPF25Db</title>
	<link rel="stylesheet" href="style.css">
	<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
	<link rel="manifest" href="site.webmanifest">
</head>
<body>
	<header>
	<h1 id="titlos"></h1>
	<h2 id="ypotitlos"></h2>
	<script src="form.js"> </script>
	</header>
	<div id="main">
                <div id="blank"></div>
				<?php
				error_reporting(0);
				session_start();
				$_SESSION["enimerosi"]="add"; //Το πρόγραμμα λαμβάνει υπόψιν ότι πρόκειται να γίνει απλή προσθήκη δικαιούχων σε ήδη υπάρχουσα σειρά.
				?>
				<form action="execute.php" method="get">
				<!-- Για κάθε καινούργιο δικαιούχο συμπληρώνονται ξεχωριστά τα κουτάκια. -->
				<!-- Κάθε δικαιούχος ανήκει σε ξεχωριστό τμήμα της φόρμας, επίσης ο πρώτος δεν συμπεριλαμβάνεται καθώς υπάρχει ήδη. -->
				<div id="second">
					<p>2ος Δικαιούχος:</p>
					<label>Ονοματεπώνυμο: </label> <input name="owner2"><br>
					<label>Ημερομηνία: </label> <input type="date" name="date2"><br>
					<label>Μέθοδος: </label> <input name="notary2">
				</div>
				<div id="third">
					<p>3ος Δικαιούχος:</p>
					<label>Ονοματεπώνυμο: </label> <input name="owner3"><br>
					<label>Ημερομηνία: </label> <input type="date" name="date3"><br>
					<label>Μέθοδος: </label> <input name="notary3">
				</div>
				<div id="fourth">
					<p>4ος Δικαιούχος:</p>
					<label>Ονοματεπώνυμο: </label> <input name="owner4"><br>
					<label>Ημερομηνία: </label> <input type="date" name="date4"><br>
					<label>Μέθοδος: </label> <input name="notary4">
				</div>
				<div id="fifth">
					<p>5ος Δικαιούχος:</p>
					<label>Ονοματεπώνυμο: </label> <input name="owner5"><br>
					<label>Ημερομηνία: </label> <input type="date" name="date5"><br>
					<label>Μέθοδος: </label> <input name="notary5">
				</div>
				<div id="sixth">
					<p>6ος Δικαιούχος:</p>
					<label>Ονοματεπώνυμο: </label> <input name="owner6"><br>
					<label>Ημερομηνία: </label> <input type="date" name="date6"><br>
					<label>Μέθοδος: </label> <input name="notary6">
				</div>
				<div id="seventh">
					<p>7ος Δικαιούχος:</p>
					<label>Ονοματεπώνυμο: </label> <input name="owner7"><br>
					<label>Ημερομηνία: </label> <input type="date" name="date7"><br>
					<label>Μέθοδος: </label> <input name="notary7">
				</div>
				<div id="eighth">
					<p>8ος Δικαιούχος:</p>
					<label>Ονοματεπώνυμο: </label> <input name="owner8"><br>
					<label>Ημερομηνία: </label> <input type="date" name="date8"><br>
					<label>Μέθοδος: </label> <input name="notary8">
				</div>
				<div id="nineth">
					<p>9ος Δικαιούχος:</p>
					<label>Ονοματεπώνυμο: </label> <input name="owner9"><br>
					<label>Ημερομηνία: </label> <input type="date" name="date9"><br>
					<label>Μέθοδος: </label> <input name="notary9">
				</div>
				<div id="tenth">
					<p>10ος Δικαιούχος:</p>
					<label>Ονοματεπώνυμο: </label> <input name="owner10"><br>
					<label>Ημερομηνία: </label> <input type="date" name="date10"><br>
					<label>Μέθοδος: </label> <input name="notary10">
				</div>
				<div id="blank"></div>
				<input type="submit">
				</form>
	</div>
	<script type="text/javascript">
		// Τα κουτάκια των δικαιούχων εμφανίζονται μόνο για τους δικαιούχους των οποίων ο αριθμός είναι μεγαλύτερος από τον παλιό αριθμό των δικαιούχων και μικρότερος ή ίσος από το νέο αριθμό δικαιούχων.
		var a="<?php echo $_SESSION["oor-"]?>";
		var b="<?php echo $_SESSION["oor"]?>";
		if(a>=2){
			document.getElementById("second").style.display="none"
		}
		if(a>=3 || b<3){
			document.getElementById("third").style.display="none"
		}
		if(a>=4 || b<4){
			document.getElementById("fourth").style.display="none"
		}
		if(a>=5 || b<5){
			document.getElementById("fifth").style.display="none"
		}
		if(a>=6 || b<6){
			document.getElementById("sixth").style.display="none"
		}
		if(a>=7 || b<7){
			document.getElementById("seventh").style.display="none"
		}
		if(a>=8 || b<8){
			document.getElementById("eighth").style.display="none"
		}
		if(a>=9 || b<9){
			document.getElementById("nineth").style.display="none"
		}
		if(a>=10 || b<10){
			document.getElementById("tenth").style.display="none"
		}
	</script>
	<footer>
	    <nav class="bottom">
		<ul>
	    	<li><a href="index.html"> Κεντρική Σελίδα </a></li>
			<li><a href="base.php"> Βάση </a></li>
        	<li><a href="info.html"> Πληροφορίες </a></li>
		</ul>
        </nav>
	</footer>
</body>
</html>