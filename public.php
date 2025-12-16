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
        <h3 id="Kefalida">Κοινό Κτήμα</h3>
    <p>
		Παρακάτω εμφανίζεται το σύνολο των έργων που είναι κοινό κτήμα.
	</p>
		<table class="table" border="1" style="width:100%;">
		<thead>
		<tr>
			<th>Τίτλος</th>
			<th>Συγγραφέας</th>
		</tr>
		</thead>
		<tbody>
			<?php
			// Το πρόγραμμα αναζητεί όλα τα έργα που αποτελούν κοινό κτήμα και προβάλλει στον πίνακα τους τίτλους και τους συγγραφείς.
				$sql="SELECT * FROM publicdomain ORDER BY title";
				$result=$connection->query($sql);
				if(!$result){
					die("Invalid query".$connection->error);
				}
			while($row=$result->fetch_assoc()){
				echo "<tr>
				<td>".$row["title"]."</td>
				<td>".$row["writer"]."</td>
				</tr>";
			}
			?>
		</tbody>
		</table>
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