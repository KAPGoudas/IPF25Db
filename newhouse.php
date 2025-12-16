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
				$already=0;
				if(substr($_GET["page"],0,4)=="www."){ // Οι πρώτοι τέσσερις χαρακτήρες της ιστοσελίδας πρέπει να είναι "www." για να είναι βέβαιο ότι πρόκειται για ιστοσελίδα.
					$sql="SELECT * FROM pubs";
					$result=$connection->query($sql); //Το πρόγραμμα ψάχνει να βρει αν ο εκδοτικός οίκος υπάρχει ήδη στη βάση.
					if(!$result){
						die("Invalid query".$connection->error);
					}
					while($row=$result->fetch_assoc()){
						if(($_GET["house"]==$row["house"])and($_GET["page"]==$row["site"])){
    	            	    echo "Ο οίκος αυτός υπάρχει ήδη στη βάση και δεν μπορεί να προστεθεί ξανά. <br>";
        	            	include('goback.html');
							$already=1;
							break;
						}
					}
					if ($already==0){
						$house=$_GET["house"];
						$site=$_GET["page"];
						$insert="INSERT INTO pubs VALUES ('$house','$site')";
						$newhouse=$connection->query($insert);
						if(!$newhouse){
							die("Invalid query".$connection->error);
						}else{
							echo "Προσθήκη σειράς επιτυχής!<br>";
							include("goback.html");
						};
					}
				}else echo "ΣΦΑΛΜΑ: Η ιστοσελίδα πρέπει να ξεκινάει από www.";
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