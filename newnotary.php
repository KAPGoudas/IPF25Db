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
			$sql="SELECT * FROM notaries";
			$result=$connection->query($sql);
			if(!$result){
				die("Invalid query".$connection->error);
			}
			$x=$_GET["tele"]/1000000000; //Το πρόγραμμα ελέγχει πρώτα αν το τηλέφωνο είναι αληθές.
			if ((2<$x) and (3>$x)){
				while($row=$result->fetch_assoc()){ //Εάν είναι αληθές, γίνεται αναζήτηση του συμβολαιογράφου για το αν είναι ήδη στη βάση ή όχι.
					if(($_GET["notary"]==$row["notary"])){
    	    	    echo "Ο συμβολαιογράφος αυτός υπάρχει ήδη στη βάση και δεν μπορεί να προστεθεί ξανά. <br>";
	            	include('goback.html');
					$already=1;
					break;
					}
				}
				if ($already==0){ //Εάν δεν είναι στη βάση, γίνεται κανονικά προσθήκη της σειράς.
					$notary=$_GET["notary"];
					$tele=$_GET["tele"];
					$mail=$_GET["email"];
					$insert="INSERT INTO notaries VALUES ('$notary','$tele','$mail')";
						$newnotary=$connection->query($insert);
						if(!$newnotary){
							die("Invalid query".$connection->error);
						}else{
							echo "Προσθήκη σειράς επιτυχής!<br>";
							include("goback.html");
						};
					}
			}else echo"Το τηλέφωνο αυτό δεν υπάρχει.";
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