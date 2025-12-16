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
				Παρακαλώ, σημειώστε το(υς) δικαιούχο(υς) που θέλετε να αφαιρέσετε!
                <div id="blank"></div>
				<?php
				error_reporting(0);
				session_start();
				$_SESSION["enimerosi"]="subtract"; //Το πρόγραμμα λαμβάνει υπόψιν ότι πρόκειται να γίνει απλή προσθήκη δικαιούχων σε ήδη υπάρχουσα σειρά.
				?>
				<form action="execute.php" method="get">
					<!-- Κάθε όνομα στην παρακάτω φόρμα αποκτά τιμή 1, εφόσον επιλεχθεί. -->
					<div id="first"> <!-- Ο πρώτος δικαιούχος αναφέρεται μόνο εφόσον ο δημιουργός του έργου είναι ανενεργός. -->
						<?php echo "<input type='checkbox' name='owner1' value=1><label>",$_SESSION["owner1-"],"</label><br>";?>
					</div>
					<?php echo "<input type='checkbox' name='owner2' value=1><label>",$_SESSION["owner2-"],"</label><br>";?> <!-- Ο δεύτερος δικαιούχος υπάρχει πάντα σε αυτήν
																															 την περίπτωση. -->
					<div id="third"> <!-- Οι άλλοι οκτώ πιθανοί δικαιούχοι εμφανίζονται ανάλογα με τον προηγούμενο καταγεγραμμένο αριθμό δικαιούχων. -->
						<?php echo "<input type='checkbox' name='owner3' value=1><label>",$_SESSION["owner3-"],"</label><br>";?>
					</div>
					<div id="fourth">
						<?php echo "<input type='checkbox' name='owner4' value=1><label>",$_SESSION["owner4-"],"</label><br>";?>
					</div>
					<div id="fifth">
						<?php echo "<input type='checkbox' name='owner5' value=1><label>",$_SESSION["owner5-"],"</label><br>";?>
					</div>
					<div id="sixth">
						<?php echo "<input type='checkbox' name='owner6' value=1><label>",$_SESSION["owner6-"],"</label><br>";?>
					</div>
					<div id="seventh">
						<?php echo "<input type='checkbox' name='owner7' value=1><label>",$_SESSION["owner7-"],"</label><br>";?>
					</div>
					<div id="eighth">
						<?php echo "<input type='checkbox' name='owner8' value=1><label>",$_SESSION["owner8-"],"</label><br>";?>
					</div>
					<div id="nineth">
						<?php echo "<input type='checkbox' name='owner9' value=1><label>",$_SESSION["owner9-"],"</label><br>";?>
					</div>
					<div id="tenth">
						<?php echo "<input type='checkbox' name='owner10' value=1><label>",$_SESSION["owner10-"],"</label><br>";?>
					</div>
					<div id="blank"></div>
					<input type="submit">
				</form>
	</div>
	<script type="text/javascript">
		// Οι παρακάτω εντολές JavaScript λαμβάνουν τα δεδομένα για τον προηγούμενο αριθμό των δικαιούχων και την παρούσα κατάσταση του δημιουργού και εμφανίζουν τα αντίστοιχα
		// κουτάκια.
		var a="<?php echo $_SESSION["oor-"]?>";
		var b="<?php echo $_SESSION["energos"]?>"
		if (b==1){
			document.getElementById("first").style.display="none"
		}
		if(a<3){
			document.getElementById("third").style.display="none"
		}
		if(a<4){
			document.getElementById("fourth").style.display="none"
		}
		if(a<5){
			document.getElementById("fifth").style.display="none"
		}
		if(a<6){
			document.getElementById("sixth").style.display="none"
		}
		if(a<7){
			document.getElementById("seventh").style.display="none"
		}
		if(a<8){
			document.getElementById("eighth").style.display="none"
		}
		if(a<9){
			document.getElementById("nineth").style.display="none"
		}
		if(a<10){
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