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
	<p> Παρακάτω φαίνεται ο βασικός πίνακας της βάσης δεδομένων που κατασκευάστηκε για τη Μεταπτυχιακή Διπλωματική Εργασία με τίτλο "Προστασία Πνευματικών Δικαιωμάτων μέσω Ψηφιακής Βάσης Δεδομένων"
        που εκπονήθηκε από τον Κωνσταντίνο-Αναστάσιο Γούδα για το Διατμηματικό Πρόγραμμα Μεταπτυχιακών Σπουδών "Υπολογιστική Δεδομένων και Αποφάσεων" του Πανεπιστημίου
        Πατρών.</p>
    	<p>Παρακαλώ κάντε κλικ στον πίνακα της βάσης που θέλετε να δείτε.</p>
	<div class="tablemenu">
		<button onclick="OpenList()" class="ListOpen">Πίνακες</button>
		<div id="Tables" class="menu"> <!-- Μενού για την επιλογή του πίνακα των Εκδοτικών Οίκων ή των Συμβολαιογράφων -->
			<a onclick="PublishClick()">Εκδοτικών Οίκων</a>
			<a onclick="NotaryClick()">Συμβολαιογράφων</a>
			<!-- Κλήση της συνάρτησης που εμφανίζει τον αντίστοιχο πίνακα -->
		</div>
	</div>
	<br>
	<div class="Table" id="Notaries">
	<table border="1"> <!-- Πίνακας Συμβολαιογράφων (έχει δομή όποια με αυτόν στο base.php) -->
		<thead>
		<tr>
			<th>Συμβολαιογράφος</th>
			<th>Τηλέφωνο Επικοινωνίας</th>
			<th>email</th>
		</tr>
		</thead>
		<tbody>
			<?php
				$sql="SELECT * FROM notaries ORDER BY notary";
				$result=$connection->query($sql);
				if(!$result){
					die("Invalid query".$connection->error);
				}
			while($row=$result->fetch_assoc()){ // Το πρόγραμμα λαμβάνει όλες τις σειρές του πίνακα των συμβολαιογράφων της βάσης και τις προβάλλει μία-μία.
				echo "<tr>
				<td>".$row["notary"]."</td>
				<td>".$row["tele"]."</td>
				<td>".$row["email"]."</td>
				</tr>";
			}
			?>
		</tbody>
	</table>
	</div>
	<div class="Table" id="Houses">
	<table border="1"> <!-- Πίνακας Εκδοτικών Οίκων (έχει δομή όποια με αυτόν στο base.php) -->
		<thead>
		<tr>
			<th>Εκδοτικός Οίκος</th>
			<th>Ιστοσελίδα</th>
		</tr>
		</thead>
		<tbody>
				<?php
				$sql="SELECT * FROM pubs ORDER BY house";
				$result=$connection->query($sql);
				if(!$result){
					die("Invalid query".$connection->error);
				}
			while($row=$result->fetch_assoc()){ // Το πρόγραμμα λαμβάνει όλες τις σειρές του πίνακα των εκδοτικών οίκων της βάσης και τις προβάλλει μία-μία.
				echo "<tr>
				<td>".$row["house"]."</td>
				<td>
				<a href='https://".$row["site"]."'>"
				.$row["site"].
				"</a>
				</td>
				</tr>";
			}
			?>
		</tbody>
	</table>
	</div>
	<div id="blank"></div>
	<script src="extra.js"></script>
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