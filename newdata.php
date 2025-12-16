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
				if ($_SESSION["already"]==1){
					$_SESSION["enimerosi"]="update"; //Είτε η σειρά είναι ήδη στη βάση ή όχι, το πρόγραμμα λαμβάνει υπόψιν τον αντίστοιχο τύπο ενημέρωσης.
				}else $_SESSION["enimerosi"]="new";
				if ($_GET["active"]==NULL){
				if ($_SESSION["already"]==0){
					$show="style='display:none;'"; //Εάν είναι καινούργια η σειρά, το αν ο δημιουργός είναι ενεργός ή όχι είναι υποχρεωτικό να συμπληρωθεί στην προηγούμενη σελίδα.
					echo "Πρέπει να συμπληρωθεί αν ο δημιουργός είναι ενεργός ή όχι.";
				}else{
					$_SESSION["energos"]=$_SESSION["energos-"];
				}
				}else{
				$_SESSION["energos"]=$_GET["active"];
				}
			if($_GET["arithmos"]==NULL){
				$_SESSION["oor"]=10; //Στην περίπτωση που δεν αναφέρει ο χρήστης τον αριθμό των δικαιούχων, το πρόγραμμα ορίζει των αριθμό de facto ως 10.
			}else{
				$_SESSION["oor"]=$_GET["arithmos"];
			}
			// Αναφέρονται οι υπάρχοντες δικαιούχοι.
			if ($_SESSION["already"]==1){
					echo"Οι δικαιούχοι για το βιβλίο με τίτλο ", $_SESSION["title"], " είναι: <br>
					1) ", $_SESSION["owner1-"], "<br>";
					if ($_SESSION["oor-"]>=2){
						echo "2) ", $_SESSION["owner2-"], "<br>";
					}
					if ($_SESSION["oor-"]>=3){
						echo "3) ", $_SESSION["owner3-"], "<br>";
					}
					if ($_SESSION["oor-"]>=4){
						echo "4) ", $_SESSION["owner4-"], "<br>";
					}
					if ($_SESSION["oor-"]>=5){
						echo "5) ", $_SESSION["owner5-"], "<br>";
					}
					if ($_SESSION["oor-"]>=6){
						echo "6) ", $_SESSION["owner6-"], "<br>";
					}
					if ($_SESSION["oor-"]>=7){
						echo "7) ", $_SESSION["owner7-"], "<br>";
					}
					if ($_SESSION["oor-"]>=8){
						echo "8) ", $_SESSION["owner8-"], "<br>";
					}
					if ($_SESSION["oor-"]>=9){
						echo "9) ", $_SESSION["owner9-"], "<br>";
					}
					if ($_SESSION["oor-"]==10){
						echo "10) ", $_SESSION["owner10-"], "<br>";
					}
					echo "<br><br>";
					if(($_SESSION["energos"]==$_SESSION["energos-"])&&($_GET["arithmos"]>$_SESSION["oor-"])){
						include('add.html'); //Εάν η κατάσταση του δημιουργού είναι ίδια και ο αριθμός των δικαιούχων μεγαλώνει, δίνεται η επιλογή στο χρήστη να κάνει απλή
											 //προσθήκη δικαιούχου.
					}elseif($_GET["arithmos"]<$_SESSION["oor-"]){
						include('subtract.html'); //Εάν ο αριθμός των δικαιούχων μικραίνει, δίνεται η επιλογή στο χρήστη να κάνει απλή αφαίρεση δικαιούχου ανεξάρτητα από το αν ο
												  //δημιουργός είναι ενεργός ή όχι.
					}
					}
			?>
			<div <?php echo $show;?>>
			<?php
				if (($_SESSION["energos"]==0) and ($_SESSION["oor"]==1)){ //Εάν ο δημιουργός είναι ανενεργός και υπάρχει μόνο ένας δικαιούχος, λαμβάνεται υπόψιν το ενδεχόμενο το
																		  // έργο να είναι κοινό κτήμα.
					include('public.html');
					echo "<br>";
				}
			?>
			<p>Παρακαλώ, συμπληρώστε τα παρακάτω στοιχεία. (Στο/α κουτάκι(α) με τη μέθοδο, συμπληρώνετε το συμβολαιογράφο ή, στην περίπτωση που η κατάθεση έγινε με άλλον τρόπο,
				τον τρόπο αυτό.)</p>
			<!-- Στην παρακάτω φόρμα συμπληρώνονται οι τριπλέτες δικαιούχου-ημερομηνίας-συμβολαιογράφου. -->
			<form action="execute.php" method="get">
				<?php
					if($_SESSION["already"]==1){
						echo"Στην περίπτωση που θέλετε να προσθέσετε και να αφαιρέσετε δικαιούχο, παρακαλείστε για διευκόλυνση του προγράμματος να γράψετε τον καινούριο
						δικαιούχο στη γραμμή που ο δικαιούχος θα αφαιρεθεί.<br>";
					}
					if ($_SESSION["energos"]==1){
						echo "Επειδή ορίσατε το δημιουργό του έργου ως ενεργό, αυτόματα θεωρείται ο πρώτος δικαιούχος και δεν χρειάζεται να το συμπληρώσετε.<br>";
					}
				?>
				<p>1ος Δικαιούχος:</p>
				<label>Ονοματεπώνυμο: </label> <input name="owner1">
				<?php
					if ($_SESSION["energos"]==1){
						echo $_SESSION["writer"]; //Εάν ο δημιουργός είναι ενεργός, το πρόγραμμα τον αναφέρει αυτόματα στη φόρμα.
					}
				?>
				<br>
				<label>Ημερομηνία: </label> <input type="date" name="date1"><br>
				<label>Μέθοδος: </label> <input name="notary1"><br>
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
			</div>
	<script type="text/javascript">
		var a="<?php echo $_SESSION["oor"]?>";
		// Ανάλογα με τον αριθμό των δικαιούχων εμφανίζονται τα αντίστοιχα κουτάκια.
		if(a<2){
			document.getElementById("second").style.display="none"
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