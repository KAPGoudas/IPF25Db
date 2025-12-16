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
    <h3>ΠΡΟΣΟΧΗ!</h3>
	<p>
		Στην προηγούμενη σελίδα δηλώσατε ότι επιθυμείτε να υποβάλετε μια καινούργια σειρά δεδομένων για ένα έργο.
	</p>
    <p>
        Για την προστασία της βάσης από παραποιήσεις, μόνο ορισμένα άτομα έχουν εξουσιοδοτηθεί για να προσθέσουν ή να μεταποιήσουν μια σειρά δεδομένων.
    </p>
    <p>
        Στην περίπτωση που θέλετε να συνεχίσετε, παρακαλείστε να πληκτρολογήσετε τον κωδικό πρόσβασης για την τροποποίηση της βάσης.
    </p>
	<form method="get">
    <label>Κωδικός: </label>
    <input type="password" name="Code">
    <br>
    <input type="submit">
	</form>
	<div id="blank"></div>
	<?php
	error_reporting(0);
	if($_GET["Code"]){
	if($_GET["Code"]!="Alpha Phoenix"){
		include("sfalma.html"); //Εάν ο κωδικός είναι λάθος, το πρόγραμμα πετάει σφάλμα.
	}else{
		header("Location: choice.html"); //Εάν είναι σωστός, ανακατευθύνει το χρήστη στο choice.html.
		exit;
	}
	}
	?>
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