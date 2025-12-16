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
		<?php
				session_start(); //Μέσω αυτής της εντολής, μπορούν να συλλεχθούν τα δεδομένα της καινούργιας σειράς με τρόπο ώστε η δημιουργία της να είναι όσο ορθή γίνεται.
				$_SESSION["title"]=$_GET["title"];
				$_SESSION["writer"]=$_GET["writer"]; //Το αρχείο παίρνει τις απαντήσεις από το προηγούμενο αρχείο ως δεδομένα.
				$show=""; //Με αυτήν τη μεταβλητή, μπορεί να επιτευχθεί η απόκρυψη ορισμένων στοιχείων όποτε αυτό είναι ορθό.
				//Οι παραπάνω μεταβλητές αρχικοποιήθηκαν για την αποφυγή προειδοποιήσεων.
				$ispublic="Όχι"; //Συνθήκη για το αν ένα έργο υπάρχει ήδη στη βάση ως κοινό κτήμα.
				$active="Ναι"; //Συνθήκη του αν ο δημιουργός του υπό μελέτη έργου είναι ενεργός δικαιούχος ή όχι.
				$num=1; //Αριθμός δικαιούχων.
				$_SESSION["already"]=0; //Συνθήκη για το αν ένα έργο βρίσκεται ήδη στη βάση.
				$sql="SELECT * FROM erga"; //Το πρόγραμμα καλεί όλα τα έργα του πίνακα erga για να δει αν κάποιο από αυτά αντιστοιχεί στο έργο που πάει να προστεθεί στη βάση.
				$result=$connection->query($sql);
				if(!$result){
					die("Invalid query".$connection->error);
				}
				while($row=$result->fetch_assoc()){
				if(($_GET["title"]==$row["title"])and($_GET["writer"]==$row["writer"])){ //Η συνθήκη για το αν ένα έργο είναι προϋπάρχον στηρίζεται στο αν ο τίτλος και ο συγγραφέας εμφανίζονται στην ίδια σειρά.
					$_SESSION["already"]=1;	$ispublic=$row["owner1"];$active=$row["energos"];$num=$row["oor"]; //Οι μεταβλητές που εμφανίστηκαν πριν τροποποιούνται.
					$_SESSION["energos-"]=$row["energos"];$_SESSION["oor-"]=$row["oor"]; //Νέες μεταβλητές δημιουργούνται για τη συλλογή των προϋπάρχοντων δεδομένων.
					$_SESSION["owner1-"]=$row["owner1"];$_SESSION["date1-"]=$row["date1"];$_SESSION["norary1-"]=$row["notary1"];
					$_SESSION["owner2-"]=$row["owner2"];$_SESSION["date2-"]=$row["date2"];$_SESSION["norary2-"]=$row["notary2"];
					$_SESSION["owner3-"]=$row["owner3"];$_SESSION["date3-"]=$row["date3"];$_SESSION["norary3-"]=$row["notary3"];
					$_SESSION["owner4-"]=$row["owner4"];$_SESSION["date4-"]=$row["date4"];$_SESSION["norary4-"]=$row["notary4"];
					$_SESSION["owner5-"]=$row["owner5"];$_SESSION["date5-"]=$row["date5"];$_SESSION["norary5-"]=$row["notary5"];
					$_SESSION["owner6-"]=$row["owner6"];$_SESSION["date6-"]=$row["date6"];$_SESSION["norary6-"]=$row["notary6"];
					$_SESSION["owner7-"]=$row["owner7"];$_SESSION["date7-"]=$row["date7"];$_SESSION["norary7-"]=$row["notary7"];
					$_SESSION["owner8-"]=$row["owner8"];$_SESSION["date8-"]=$row["date8"];$_SESSION["norary8-"]=$row["notary8"];
					$_SESSION["owner9-"]=$row["owner9"];$_SESSION["date9-"]=$row["date9"];$_SESSION["norary9-"]=$row["notary9"];
					$_SESSION["owner10-"]=$row["owner10"];$_SESSION["date10-"]=$row["date10"];$_SESSION["norary10-"]=$row["notary10"];
					break;
				}}
				?>
				<div id="blank"></div>
		<?php
			if ($ispublic=="Ελληνική Δημοκρατία"){ //Εάν το έργο υπάρχει ακόμη με δικαιούχο την Ελληνική Δημοκρατία, η σειρά δεν μπορεί να ενημερωθεί.
				$show="style='display:none;'";
				echo"Το συγκεκριμένο έργο υπάρχει ήδη στη βάση και είναι κοινό κτήμα. Επομένως, δεν μπορεί να ενημερωθεί.<br>";
				include('goback.html');
			}elseif($_SESSION["already"]==1){
				echo "Το έργο αυτό υπάρχει ήδη στη βάση.";
				$_SESSION["enimerosi"]="update";
			}else{
				$_SESSION["enimerosi"]="new";
			}
		?>
		<div id="blank"></div>
		<div id="form" <?php echo $show;?>>
        <form action="newdata.php" method="get">
            <label>Τίτλος:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $_GET["title"];?><br>
		    <label>Συγγραφέας:</label> &nbsp;<?php echo $_GET["writer"];?>
			<div>
			<!-- Συμπληρώνονται το αν ο συγγραφέας του έργου είναι ενεργός ή όχι, καθώς και ο αριθμός των δικαιούχων. -->
			<label>Ενεργός:</label> <input type="radio" name="active" value="1"> <label>Ναι:</label> <input type="radio" name="active" value="0"> <label>Όχι:</label>
			<?php
				if ($_SESSION["already"]==1){
				// Στην περίπτωση που προϋπάρχει η σειρά, εμφανίζονται τα προηγούμενα δεδομένα για ενημέρωση του χρήστη.
				echo"Υπάρχον δεδομένο: ";
				if($active==1){
					echo" Ναι"; // Όπως στη σελίδα της βάσης, έτσι κι εδώ, τα "1" και "0" γίνονται "Ναι" και "Όχι" αντίστοιχα.
				}else{
					echo" Όχι";
				}}
			?>
			</div>
			<div>
				<label>Αριθμός Δικαιούχων:</label> <input type="number" name="arithmos" min="1" max="10">
				<?php
				if($_SESSION["already"]==1){
				echo "Υπάρχον Δεδομένο: ", $num;} ?>
			</div>
			<input type="submit">
        </form>
		</div>
	</div>
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