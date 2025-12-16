<?php
require_once 'conn.php'; //Σύνδεση με το conn.php
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
	<p> Παρακάτω φαίνεται ο βασικός πίνακας της βάσης δεδομένων που κατασκευάστηκε για τη Μεταπτυχιακή Διπλωματική Εργασία με τίτλο "Προστασία Πνευματικών Δικαιωμάτων μέσω Ψηφιακής Βάσης Δεδομένων"
        που εκπονήθηκε από τον Κωνσταντίνο-Αναστάσιο Γούδα για το Διατμηματικό Πρόγραμμα Μεταπτυχιακών Σπουδών "Υπολογιστική Δεδομένων και Αποφάσεων" του Πανεπιστημίου
        Πατρών.</p>
    	<p>Πλκτρολογήστε το όνομα που αναζητείτε στον πίνακα της βάσης:</p>
	<?php
		$show="style='display:none;'"; // Ο πίνακας αρχικά είναι κρυμμένος.
	?>
		<form action="" method="get">
			<input type="search" name="Find" id="Find"> <!-- Επιλογή τρόπου αναζήτησης -->
			<p>Αναζήτηση Βάσει:</p>
			<input type="radio" value="title" name="searchtype"><label>Τίτλου</label>
			<br>
			<input type="radio" value="writer" name="searchtype"><label>Συγγραφέα</label>
			<br>
			<input type="radio" value="owner" name="searchtype"><label>Δικαιούχου</label>
			<div id="blank"></div>
			<button type="submit"><img id="Fakos" src="fakos.png"></button>
		</form>
		<?php
			if(isset($_GET["Find"])){
				$show="style='display:grid;'"; // Ο πίνακας εμφανίζεται μόνο κατόπιν αναζήτησης του χρήστη.
				$search=$_GET["Find"];
				if($_GET["searchtype"]=="title"){
					$sql="SELECT * FROM erga WHERE title LIKE '%$search%' ORDER BY title LIMIT 10";
				}
				if($_GET["searchtype"]=="writer"){
					$sql="SELECT * FROM erga WHERE writer LIKE '%$search%' ORDER BY title  LIMIT 10";
				}
				if($_GET["searchtype"]=="owner"){
				$sql="SELECT * FROM erga WHERE owner1 LIKE '%$search%' OR owner2 LIKE '%$search%'
				OR owner3 LIKE '%$search%'
				OR owner4 LIKE '%$search%'
				OR owner5 LIKE '%$search%'
				OR owner6 LIKE '%$search%'
				OR owner7 LIKE '%$search%'
				OR owner8 LIKE '%$search%'
				OR owner9 LIKE '%$search%'
				OR owner10 LIKE '%$search%'
				ORDER BY title LIMIT 10";
				}
			// Εκτέλεση εντολής ανάλογα με τον τρόπο αναζήτησης που επιλέχθηκε παραπάνω. Εμφανίζονται 10 σειρές από την αναζήτηση.
			}
		?>
		<div class="Table"<?php echo $show?>> <!-- Ο πίνακας αυτός εμφανίζεται μόνο κατόπιν εντολής αναζήτησης. -->
		<table class="table" border="1" style="width:100%;">
		<thead>
		<tr>
			<th>Τίτλος</th>
			<th>Συγγραφέας</th>
			<th>Ενεργός</th>
			<th>Αριθμός Δικαιούχων</th>
			<th>1ος Δικαιούχος</th>
			<th>Ημερομηνία</th>
			<th>Μέθοδος</th>
			<th>2ος Δικαιούχος</th>
			<th>Ημερομηνία</th>
			<th>Μέθοδος</th>
			<th>3ος Δικαιούχος</th>
			<th>Ημερομηνία</th>
			<th>Μέθοδος</th>
			<th>4ος Δικαιούχος</th>
			<th>Ημερομηνία</th>
			<th>Μέθοδος</th>
			<th>5ος Δικαιούχος</th>
			<th>Ημερομηνία</th>
			<th>Μέθοδος</th>
			<th>6ος Δικαιούχος</th>
			<th>Ημερομηνία</th>
			<th>Μέθοδος</th>
			<th>7ος Δικαιούχος</th>
			<th>Ημερομηνία</th>
			<th>Μέθοδος</th>
			<th>8ος Δικαιούχος</th>
			<th>Ημερομηνία</th>
			<th>Μέθοδος</th>
			<th>9ος Δικαιούχος</th>
			<th>Ημερομηνία</th>
			<th>Μέθοδος</th>
			<th>10ος Δικαιούχος</th>
			<th>Ημερομηνία</th>
			<th>Μέθοδος</th>
		</tr>
		</thead>
		<tbody>
			<?php
			// Η πάνω σειρά είναι πάντα η ίδια, ενώ οι υπόλοιπες ποικίλλουν ανάλογα με την αναζήτηση που έκανε ο χρήστης.
				if ($sql){
				$result=$connection->query($sql);
				if(!$result){
					die("Invalid query".$connection->error);
				}
			while($row=$result->fetch_assoc()){ //Το πρόγραμμα βρίσκει όλες τις σειρές του πίνακα που ταιριάζουν με την εντολή και τις προβάλλει μία-μία.
				echo "<tr>
				<td>".$row["title"]."</td>
				<td>".$row["writer"]."</td>";
				if($row["energos"]==1){
					echo "<td>Ναι</td>"; // Μετατροπή των "1" και "0" σε "Ναι" και "Όχι" αντίστοιχα
				} else echo "<td>Όχι</td>";
				echo "<td>".$row["oor"]."</td>
				<td>".$row["owner1"]."</td>
				<td>".$row["date1"]."</td>
				<td>".$row["notary1"]."</td>
				<td>".$row["owner2"]."</td>
				<td>".$row["date2"]."</td>
				<td>".$row["notary2"]."</td>
				<td>".$row["owner3"]."</td>
				<td>".$row["date3"]."</td>
				<td>".$row["notary3"]."</td>
				<td>".$row["owner4"]."</td>
				<td>".$row["date4"]."</td>
				<td>".$row["notary4"]."</td>
				<td>".$row["owner5"]."</td>
				<td>".$row["date5"]."</td>
				<td>".$row["notary5"]."</td>
				<td>".$row["owner6"]."</td>
				<td>".$row["date6"]."</td>
				<td>".$row["notary6"]."</td>
				<td>".$row["owner7"]."</td>
				<td>".$row["date7"]."</td>
				<td>".$row["notary7"]."</td>
				<td>".$row["owner8"]."</td>
				<td>".$row["date8"]."</td>
				<td>".$row["notary8"]."</td>
				<td>".$row["owner9"]."</td>
				<td>".$row["date9"]."</td>
				<td>".$row["notary9"]."</td>
				<td>".$row["owner10"]."</td>
				<td>".$row["date10"]."</td>
				<td>".$row["notary10"]."</td>
				</tr>";
			}
		}
			?>
		</tbody>
		</table>
	</div>
	<div id="blank"></div>
		<br>
		<p>Εάν επιθυμείτε να δείτε τους πίνακες των συμβολαιογράφων και των εκδοτικών οίκων, πατήστε <a id="link" href="extra.php">εδω</a>!</p>
		<br>
		<p>Εναλλακτικά, μπορείτε να δείτε το σύνολο των έργων που αποτελούν κοινό κτήμα <a id="link" href="public.php">εδώ</a>!</p>

    <p>
        Στην περίπτωση όπου επιθυμείτε να προσθέσετε καινούργια σειρά δεδομένων, πατήστε <a id="link" href="pass.php">εδώ</a>!
	</p>
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