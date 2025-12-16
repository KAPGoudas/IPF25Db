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
				session_start();
                $_SESSION["enimerosi"]="public" // Το πρόγραμμα λαμβάνει υπόψιν ότι το έργο είναι κοινό κτήμα.
		?>
				<div id="blank"></div>
		<form action="execute.php" method="get">
			Στην περίπτωση που το έργο έγινε κοινό κτήμα μετά το 1993, παρακαλώ συμπληρώστε το αντίστοιχο έτος: <input name="year"> <input type="submit">
		</form>
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