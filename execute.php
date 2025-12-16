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
				session_start(); //Συλλογή των βασικών δεδομένων που έχουν συλλεχθεί μέχρι στιγμής.
				$title=$_SESSION["title"];
				$writer=$_SESSION["writer"];
				$energos=$_SESSION["energos"];
				$oor=$_SESSION["oor"];
				switch($_SESSION["enimerosi"]){ //Ανάλογα με τον τρόπο που έχει γίνει η συλλογή των δεδομένων, η εφαρμογή θα κάνει προσθήκη ή την κατάλληλη ενημέρωση σειράς.
					case "new": //Προσθήκη νέας σειράς.
						//Οι δικαιούχοι και οι συμβολαιογράφοι προστίθενται πριν από τις ημερομηνίες, καθώς οι ημερομηνίες δεν μπορούν να προστεθούν χωρίς κάποια τιμή.
						//Η εφαρμογή συλλέγει τα δεδομένα για όλους τους δικαιούχους και τους συμβολαιογράφους, είτε είναι κενά τα δεδομένα είτε όχι και δημιουργεί την καινούργια σειρά.
						$owner1=$_GET["owner1"];$notary1=$_GET["notary1"];$owner2=$_GET["owner2"];$notary2=$_GET["notary2"];$owner3=$_GET["owner3"];$notary3=$_GET["notary3"];
						$owner4=$_GET["owner4"];$notary4=$_GET["notary4"];$owner5=$_GET["owner5"];$notary5=$_GET["notary5"];$owner6=$_GET["owner6"];$notary6=$_GET["notary6"];
						$owner7=$_GET["owner7"];$notary7=$_GET["notary7"];$owner8=$_GET["owner8"];$notary8=$_GET["notary8"];$owner9=$_GET["owner9"];$notary9=$_GET["notary9"];
						$owner10=$_GET["owner10"];$notary10=$_GET["notary10"];
						$sql="INSERT INTO erga(title, writer, energos, oor,owner1,notary1,owner2, notary2,owner3, notary3,owner4, notary4,owner5, notary5,owner6, notary6,
						owner7, notary7,owner8, notary8,owner9, notary9,owner10, notary10)
						VALUES('$title','$writer',$energos,$oor,'$owner1','$notary1','$owner2','$notary2','$owner3','$notary3','$owner4','$notary4','$owner5','$notary5'
						,'$owner6','$notary6','$owner7','$notary7','$owner8','$notary8','$owner9','$notary9','$owner10','$notary10')";
						//Εν τω μεταξύ, γίνεται συλλογή και των δεδομένων για τις ημερομηνίες.
						$date1=$_GET["date1"];$date2=$_GET["date2"];$date3=$_GET["date3"];$date4=$_GET["date4"];$date5=$_GET["date5"];
						$date6=$_GET["date6"];$date7=$_GET["date7"];$date8=$_GET["date8"];$date9=$_GET["date9"];$date10=$_GET["date10"];
						$result=$connection->query($sql);
						if(!$result){
							die("Invalid query".$connection->error);
						}else{
							echo "Προσθήκη σειράς επιτυχής!<br>";//Στην περίπτωση που όλα πήγαν καλά, το πρόγραμμα βγάζει ότι η προσθήκη ήταν επιτυχής.
							include("goback.html");
						};
						//Για κάθε ημερομηνία ξεχωριστά γίνεται μια εντολή ενημέρωσης της καινούργιας σειράς όπου γίνεται η προσθήκη της ημερομηνίας.
						$linedate1="UPDATE erga SET date1='$date1' WHERE title='$title' AND writer='$writer'";
						$linedate2="UPDATE erga SET date2='$date2' WHERE title='$title' AND writer='$writer'";
						$linedate3="UPDATE erga SET date3='$date3' WHERE title='$title' AND writer='$writer'";
						$linedate4="UPDATE erga SET date4='$date4' WHERE title='$title' AND writer='$writer'";
						$linedate5="UPDATE erga SET date5='$date5' WHERE title='$title' AND writer='$writer'";
						$linedate6="UPDATE erga SET date6='$date6' WHERE title='$title' AND writer='$writer'";
						$linedate7="UPDATE erga SET date7='$date7' WHERE title='$title' AND writer='$writer'";
						$linedate8="UPDATE erga SET date8='$date8' WHERE title='$title' AND writer='$writer'";
						$linedate9="UPDATE erga SET date9='$date9' WHERE title='$title' AND writer='$writer'";
						$linedate10="UPDATE erga SET date10='$date10' WHERE title='$title' AND writer='$writer'";
						//Οι εντολές αυτές εφαρμόζονται μόνο όταν οι αντίστοιχες ημερομηνίες έχουν κάποια τιμή.
							if($date1){
								$addition1=$connection->query($linedate1);
							}
							if($date2){
								$addition2=$connection->query($linedate2);
							}
							if($date3){
								$addition3=$connection->query($linedate3);
							}
							if($date4){
								$addition4=$connection->query($linedate4);
							}
							if($date5){
								$addition5=$connection->query($linedate5);
							}
							if($date6){
								$addition6=$connection->query($linedate6);
							}
							if($date7){
								$addition7=$connection->query($linedate7);
							}
							if($date8){
								$addition8=$connection->query($linedate8);
							}
							if($date9){
								$addition9=$connection->query($linedate9);
							}
							if($date10){
								$addition10=$connection->query($linedate10);
							}
						break;
					case "add": //Ενημέρωση σειράς-Προσθήκη Δικαιούχου.
						//Συλλέγονται τα παλιά και τα νέα δεδομένα για τους δικαιούχους και τους συμβολαιογράφους και τοποθετούνται σε αντίστοιχα arrays.
						$oorb=$_SESSION["oor-"];
						$owner1b=$_SESSION["owner1-"];
						$owner2b=$_SESSION["owner2-"];
						$owner3b=$_SESSION["owner3-"];
						$owner4b=$_SESSION["owner4-"];
						$owner5b=$_SESSION["owner5-"];
						$owner6b=$_SESSION["owner6-"];
						$owner7b=$_SESSION["owner7-"];
						$owner8b=$_SESSION["owner8-"];
						$owner9b=$_SESSION["owner9-"];
						$owner2=$_GET["owner2"];
						$notary2=$_GET["notary2"];
						$owner3=$_GET["owner3"];
						$notary3=$_GET["notary3"];
						$owner4=$_GET["owner4"];
						$notary4=$_GET["notary4"];
						$owner5=$_GET["owner5"];
						$notary5=$_GET["notary5"];
						$owner6=$_GET["owner6"];
						$notary6=$_GET["notary6"];
						$owner7=$_GET["owner7"];
						$notary7=$_GET["notary7"];
						$owner8=$_GET["owner8"];
						$notary8=$_GET["notary8"];
						$owner9=$_GET["owner9"];
						$notary9=$_GET["notary9"];
						$owner10=$_GET["owner10"];
						$notary10=$_GET["notary10"];
						$oldowners=array($owner1b,$owner2b,$owner3b,$owner4b,$owner5b,$owner6b,$owner7b,$owner8b,$owner9b,$owner10b);
						$newowners=array($owner1b,$owner2,$owner3,$owner4,$owner5,$owner6,$owner7,$owner8,$owner9,$owner10);
						for($i=1;$i<$oorb;$i++){
							$newowners[$i]=$oldowners[$i];
						}
						//Ο πρώτος δικαιούχος, καθώς και όλα τα δεδομένα που προϋπήρχαν στη σειρά, παραμένουν και μετά την ενημέρωση. Επομένως, ό,τι υπάρχει στο παλιό array πρέπει να μεταφερθεί και στο καινούργιο array.
						$newownersq="UPDATE erga SET oor=$oor, owner2='$newowners[1]',owner3='$newowners[2]',owner4='$newowners[3]',owner5='$newowners[4]',owner6='$newowners[5]',
						owner7='$newowners[6]',owner8='$newowners[7]',owner9='$newowners[8]',owner10='$newowners[9]' WHERE title='$title' AND writer='$writer'";
						$result=$connection->query($newownersq);
						if(!$result){
							die("Invalid query".$connection->error);
						}else{
							echo "Ενημέρωση σειράς επιτυχής!<br>";
							include("goback.html");
						};
						// Οι ημερομηνίες προστίθενται στη βάση με παρόμοιο τρόπο όπως πριν, αλλά μόνο για τους καινούργιους δικαιούχους.
						$date2=$_GET["date2"];
						$date3=$_GET["date3"];
						$date4=$_GET["date4"];
						$date5=$_GET["date5"];
						$date6=$_GET["date6"];
						$date7=$_GET["date7"];
						$date8=$_GET["date8"];
						$date9=$_GET["date9"];
						$date10=$_GET["date10"];
						$linedate2="UPDATE erga SET date2='$date2' WHERE title='$title' AND writer='$writer'";
						$linedate3="UPDATE erga SET date3='$date3' WHERE title='$title' AND writer='$writer'";
						$linedate4="UPDATE erga SET date4='$date4' WHERE title='$title' AND writer='$writer'";
						$linedate5="UPDATE erga SET date5='$date5' WHERE title='$title' AND writer='$writer'";
						$linedate6="UPDATE erga SET date6='$date6' WHERE title='$title' AND writer='$writer'";
						$linedate7="UPDATE erga SET date7='$date7' WHERE title='$title' AND writer='$writer'";
						$linedate8="UPDATE erga SET date8='$date8' WHERE title='$title' AND writer='$writer'";
						$linedate9="UPDATE erga SET date9='$date9' WHERE title='$title' AND writer='$writer'";
						$linedate10="UPDATE erga SET date10='$date10' WHERE title='$title' AND writer='$writer'";
						// Παρόμοια προσθήκη δεδομένων γίνεται και για τους συμβολαιογράφους.
						$newnotary2="UPDATE erga SET notary2='$notary2' WHERE title='$title' AND writer='$writer'";
						$newnotary3="UPDATE erga SET notary3='$notary3' WHERE title='$title' AND writer='$writer'";
						$newnotary4="UPDATE erga SET notary4='$notary4' WHERE title='$title' AND writer='$writer'";
						$newnotary5="UPDATE erga SET notary5='$notary5' WHERE title='$title' AND writer='$writer'";
						$newnotary6="UPDATE erga SET notary6='$notary6' WHERE title='$title' AND writer='$writer'";
						$newnotary7="UPDATE erga SET notary7='$notary7' WHERE title='$title' AND writer='$writer'";
						$newnotary8="UPDATE erga SET notary8='$notary8' WHERE title='$title' AND writer='$writer'";
						$newnotary9="UPDATE erga SET notary9='$notary9' WHERE title='$title' AND writer='$writer'";
						$newnotary10="UPDATE erga SET notary10='$notary10' WHERE title='$title' AND writer='$writer'";
							if($date2){
								$addition2=$connection->query($linedate2);
							}
							if($date3){
								$addition3=$connection->query($linedate3);
							}
							if($date4){
								$addition4=$connection->query($linedate4);
							}
							if($date5){
								$addition5=$connection->query($linedate5);
							}
							if($date6){
								$addition6=$connection->query($linedate6);
							}
							if($date7){
								$addition7=$connection->query($linedate7);
							}
							if($date8){
								$addition8=$connection->query($linedate8);
							}
							if($date9){
								$addition9=$connection->query($linedate9);
							}
							if($date10){
								$addition10=$connection->query($linedate10);
							}
							if($notary2){
								$naddition2=$connection->query($newnotary2);
							}
							if($notary3){
								$naddition3=$connection->query($newnotary3);
							}
							if($notary4){
								$naddition4=$connection->query($newnotary4);
							}
							if($notary5){
								$naddition5=$connection->query($newnotary5);
							}
							if($notary6){
								$naddition6=$connection->query($newnotary6);
							}
							if($notary7){
								$naddition7=$connection->query($newnotary7);
							}
							if($notary8){
								$naddition8=$connection->query($newnotary8);
							}
							if($notary9){
								$naddition9=$connection->query($newnotary9);
							}
							if($notary10){
								$naddition10=$connection->query($newnotary10);
							}
						break;
					case "subtract": //Ενημέρωση σειράς-Αφαίρεση δικαιούχου
						// Για κάθε δικαιούχο που πρέπει να αφαιρεθεί, η τιμή που λαμβάνει το πρόγραμμα είναι 1, αλλιώς είναι 0.
						if($_GET["owner1"]){
							$vowner1=$_GET["owner1"];
						}else $vowner1=0;
						if($_GET["owner2"]){
							$vowner2=$_GET["owner2"];
						}else $vowner2=0;
						if($_GET["owner3"]){
							$vowner3=$_GET["owner3"];
						}else $vowner3=0;
						if($_GET["owner4"]){
							$vowner4=$_GET["owner4"];
						}else $vowner4=0;
						if($_GET["owner5"]){
							$vowner5=$_GET["owner5"];
						}else $vowner5=0;
						if($_GET["owner6"]){
							$vowner6=$_GET["owner6"];
						}else $vowner6=0;
						if($_GET["owner7"]){
							$vowner7=$_GET["owner7"];
						}else $vowner7=0;
						if($_GET["owner8"]){
							$vowner8=$_GET["owner8"];
						}else $vowner8=0;
						if($_GET["owner9"]){
							$vowner9=$_GET["owner9"];
						}else $vowner9=0;
						if($_GET["owner10"]){
							$vowner10=$_GET["owner10"];
						}else $vowner10=0;
						// Στη συνέχεια, προστίθενται όλες οι τιμές για να ξέρει το πρόγραμμα πόσους δικαιούχους πρέπει να αφαιρέσει.
						$sum=$vowner1+$vowner2+$vowner3+$vowner4+$vowner5+$vowner6+$vowner7+$vowner8+$vowner9+$vowner10;
						// Σε αυτήν την περίπτωση, οι στήλες για το 10ο και τελευταίο δικαιούχο είναι πάντα μηδέν.
						$noor="UPDATE erga SET oor=$oor,owner10=NULL,date10=NULL,notary10=NULL WHERE title='$title' AND writer='$writer'";
						$minus1="UPDATE erga SET owner1=NULL,date1=NULL,notary1=NULL WHERE title='$title' AND writer='$writer'";
						$minus2="UPDATE erga SET owner2=NULL,date2=NULL,notary2=NULL WHERE title='$title' AND writer='$writer'";
						$minus3="UPDATE erga SET owner3=NULL,date3=NULL,notary3=NULL WHERE title='$title' AND writer='$writer'";
						$minus4="UPDATE erga SET owner4=NULL,date4=NULL,notary4=NULL WHERE title='$title' AND writer='$writer'";
						$minus5="UPDATE erga SET owner5=NULL,date5=NULL,notary5=NULL WHERE title='$title' AND writer='$writer'";
						$minus6="UPDATE erga SET owner6=NULL,date6=NULL,notary6=NULL WHERE title='$title' AND writer='$writer'";
						$minus7="UPDATE erga SET owner7=NULL,date7=NULL,notary7=NULL WHERE title='$title' AND writer='$writer'";
						$minus8="UPDATE erga SET owner8=NULL,date8=NULL,notary8=NULL WHERE title='$title' AND writer='$writer'";
						$minus9="UPDATE erga SET owner9=NULL,date9=NULL,notary9=NULL WHERE title='$title' AND writer='$writer'";
						if($sum!=$_SESSION["oor-"]-$_SESSION["oor"]){
							echo "Ο αριθμός αφαιρέσεων είναι λανθασμένος!"; //Προτού εκτελέσει την εντολή, το πρόγραμμα επιβεβαιώνει αν ο αριθμός αφαιρέσεων είναι σωστός.
						}else{
							if($vowner1==1){
							$result1=$connection->query($minus1); //Το πρόγραμμα αφαιρεί κάθε τριάδα στηλών που ζητάται να αφαιρεθεί ξεχωριστά.
							if(!$result1){
								die("Invalid query".$connection->error);
							}}
							if($vowner2==1){
							$result2=$connection->query($minus2);
							if(!$result2){
								die("Invalid query".$connection->error);
							}}
							if($vowner3==1){
							$result3=$connection->query($minus3);
							if(!$result3){
								die("Invalid query".$connection->error);
							}}
							if($vowner4==1){
							$result4=$connection->query($minus4);
							if(!$result4){
								die("Invalid query".$connection->error);
							}}
							if($vowner5==1){
							$result5=$connection->query($minus5);
							if(!$result5){
								die("Invalid query".$connection->error);
							}}
							if($vowner6==1){
							$result6=$connection->query($minus6);
							if(!$result6){
								die("Invalid query".$connection->error);
							}}
							if($vowner7==1){
							$result7=$connection->query($minus7);
							if(!$result7){
								die("Invalid query".$connection->error);
							}}
							if($vowner8==1){
							$result8=$connection->query($minus8);
							if(!$result8){
								die("Invalid query".$connection->error);
							}}
							if($vowner9==1){
							$result9=$connection->query($minus9);
							if(!$result9){
								die("Invalid query".$connection->error);
							}}
							$result=$connection->query($noor);
							if(!$result){
								die("Invalid query".$connection->error);
							}else{
							echo "Ενημέρωση σειράς επιτυχής!<br>";
							include("goback.html");
							}
						}
						break;
					case "update": //Ενημέρωση σειράς
						//Λαμβάνονται τα προϋπάρχοντα δεδομένα για όλους τους δικαιούχους.
						$owner1=$_SESSION["owner1-"];
						$owner2=$_SESSION["owner2-"];
						$owner3=$_SESSION["owner3-"];
						$owner4=$_SESSION["owner4-"];
						$owner5=$_SESSION["owner5-"];
						$owner6=$_SESSION["owner6-"];
						$owner7=$_SESSION["owner7-"];
						$owner8=$_SESSION["owner8-"];
						$owner9=$_SESSION["owner9-"];
						$owner10=$_SESSION["owner10-"];
						$notary1=$_SESSION["notary1-"];
						$notary2=$_SESSION["notary2-"];
						$notary3=$_SESSION["notary3-"];
						$notary4=$_SESSION["notary4-"];
						$notary5=$_SESSION["notary5-"];
						$notary6=$_SESSION["notary6-"];
						$notary7=$_SESSION["notary7-"];
						$notary8=$_SESSION["notary8-"];
						$notary9=$_SESSION["notary9-"];
						$notary10=$_SESSION["notary10-"];
						if($_GET["owner1"]){
							$owner1=$_GET["owner1"]; //Κάθε φορά που ένα όνομα γράφεται εκ νέου, τα αντίστοιχα δεδομένα ενημερώνονται.
							$notary1=$_GET["notary1"];
						}
						if($_GET["owner2"]){
							$owner2=$_GET["owner2"];
							$notary2=$_GET["notary2"];
						}
						if($_GET["owner3"]){
							$owner3=$_GET["owner3"];
							$notary3=$_GET["notary3"];
						}
						if($_GET["owner4"]){
							$owner4=$_GET["owner4"];
							$notary4=$_GET["notary4"];
						}
						if($_GET["owner5"]){
							$owner5=$_GET["owner5"];
							$notary5=$_GET["notary5"];
						}
						if($_GET["owner6"]){
							$owner6=$_GET["owner6"];
							$notary6=$_GET["notary6"];
						}
						if($_GET["owner7"]){
							$owner7=$_GET["owner7"];
							$notary7=$_GET["notary7"];
						}
						if($_GET["owner8"]){
							$owner8=$_GET["owner8"];
							$notary8=$_GET["notary8"];
						}
						if($_GET["owner9"]){
							$owner9=$_GET["owner9"];
							$notary9=$_GET["notary9"];
						}
						if($_GET["owner10"]){
							$owner10=$_GET["owner10"];
							$notary10=$_GET["notary10"];
						}
						$sql="UPDATE erga SET oor='$oor',owner1='$owner1',notary1='$notary1',owner2='$owner2', notary2='$notary2',owner3='$owner3', notary3='$notary3',
						owner4='$owner4', notary4='$notary4',owner5='$owner5', notary5='$notary5',owner6='$owner6', notary6='$notary6', owner7='$owner7', notary7='$notary7',
						owner8='$owner8', notary8='$notary8',owner9='$owner9', notary9='$notary9',owner10='$owner10', notary10='$notary10'";
						// Η διαδικασία με τους δικαιούχους, τους συμβολαιογράφους και τις ημερομηνίες είναι ίδια με πριν.
						$date1=$_GET["date1"];$date2=$_GET["date2"];$date3=$_GET["date3"];$date4=$_GET["date4"];$date5=$_GET["date5"];
						$date6=$_GET["date6"];$date7=$_GET["date7"];$date8=$_GET["date8"];$date9=$_GET["date9"];$date10=$_GET["date10"];
						$result=$connection->query($sql);
						if(!$result){
							die("Invalid query".$connection->error);
						}else{
							echo "Ενημέρωση σειράς επιτυχής!<br>";
							include("goback.html");
						};
						//Οι στήλες που αντιστοιχούν σε αριθμό των δικαιούχων μεγαλύτερο από αυτόν που έχει οριστεί μηδενίζονται.
						if($oor<2){
							$minus2="UPDATE erga SET owner2=NULL,date2=NULL,notary2=NULL WHERE title='$title' AND writer='$writer'";
							$result2=$connection->query($minus2);
							if(!$result2){
								die("Invalid query".$connection->error);
							}}
						if($oor<3){
							$minus3="UPDATE erga SET owner3=NULL,date3=NULL,notary3=NULL WHERE title='$title' AND writer='$writer'";
							$result3=$connection->query($minus3);
							if(!$result3){
								die("Invalid query".$connection->error);
							}}
						if($oor<4){
							$minus4="UPDATE erga SET owner4=NULL,date4=NULL,notary4=NULL WHERE title='$title' AND writer='$writer'";
							$result4=$connection->query($minus4);
							if(!$result4){
								die("Invalid query".$connection->error);
							}}
						if($oor<5){
							$minus5="UPDATE erga SET owner5=NULL,date5=NULL,notary5=NULL WHERE title='$title' AND writer='$writer'";
							$result5=$connection->query($minus5);
							if(!$result5){
								die("Invalid query".$connection->error);
							}}
						if($oor<6){
							$minus6="UPDATE erga SET owner6=NULL,date6=NULL,notary6=NULL WHERE title='$title' AND writer='$writer'";
							$result6=$connection->query($minus6);
							if(!$result6){
								die("Invalid query".$connection->error);
							}}
						if($oor<7){
							$minus7="UPDATE erga SET owner7=NULL,date7=NULL,notary7=NULL WHERE title='$title' AND writer='$writer'";
							$result7=$connection->query($minus7);
							if(!$result7){
								die("Invalid query".$connection->error);
							}}
						if($oor<8){
							$minus8="UPDATE erga SET owner8=NULL,date8=NULL,notary8=NULL WHERE title='$title' AND writer='$writer'";
							$result8=$connection->query($minus8);
							if(!$result8){
								die("Invalid query".$connection->error);
							}}
						if($oor<9){
							$minus9="UPDATE erga SET owner9=NULL,date9=NULL,notary9=NULL WHERE title='$title' AND writer='$writer'";
							$result9=$connection->query($minus6);
							if(!$result9){
								die("Invalid query".$connection->error);
							}}
						if($oor<10){
							$minus10="UPDATE erga SET owner10=NULL,date10=NULL,notary10=NULL WHERE title='$title' AND writer='$writer'";
							$result10=$connection->query($minus10);
							if(!$result10){
								die("Invalid query".$connection->error);
							}}
						$linedate1="UPDATE erga SET date1='$date1' WHERE title='$title' AND writer='$writer'";
						$linedate2="UPDATE erga SET date2='$date2' WHERE title='$title' AND writer='$writer'";
						$linedate3="UPDATE erga SET date3='$date3' WHERE title='$title' AND writer='$writer'";
						$linedate4="UPDATE erga SET date4='$date4' WHERE title='$title' AND writer='$writer'";
						$linedate5="UPDATE erga SET date5='$date5' WHERE title='$title' AND writer='$writer'";
						$linedate6="UPDATE erga SET date6='$date6' WHERE title='$title' AND writer='$writer'";
						$linedate7="UPDATE erga SET date7='$date7' WHERE title='$title' AND writer='$writer'";
						$linedate8="UPDATE erga SET date8='$date8' WHERE title='$title' AND writer='$writer'";
						$linedate9="UPDATE erga SET date9='$date9' WHERE title='$title' AND writer='$writer'";
						$linedate10="UPDATE erga SET date10='$date10' WHERE title='$title' AND writer='$writer'";
							if($date1){
								$addition1=$connection->query($linedate1);
							}
							if($date2){
								$addition2=$connection->query($linedate2);
							}
							if($date3){
								$addition3=$connection->query($linedate3);
							}
							if($date4){
								$addition4=$connection->query($linedate4);
							}
							if($date5){
								$addition5=$connection->query($linedate5);
							}
							if($date6){
								$addition6=$connection->query($linedate6);
							}
							if($date7){
								$addition7=$connection->query($linedate7);
							}
							if($date8){
								$addition8=$connection->query($linedate8);
							}
							if($date9){
								$addition9=$connection->query($linedate9);
							}
							if($date10){
								$addition10=$connection->query($linedate10);
							}
						break;
				
					case "public"; // Κοινό κτήμα-Προσθήκη ή Ενημέρωση σειράς
						if ($_GET["year"]){ // Το πρόγραμμα ελέγχει αν έχει λάβει την τιμή της χρονιάς στο προηγούμενο αρχείο.
							if(is_numeric($_GET["year"])==1){ // Η διαδικασία μπορεί να συνεχιστεί μόνο αν έχει λάβει αριθμητική τιμή.
							if ($_GET["year"]>2025){
								echo "Η χρονιά αυτή δεν είναι σωστή."; // Η χρονιά δεν μπορεί να είναι μετά το 2025.
							}else if ($_GET["year"]<1994){ //Εάν η χρονιά είναι πριν το 1994, ορίζεται πάντα η ίδια ημερομηνία ορισμού κοινού κτήματος.
								$sql="INSERT INTO erga(title, writer, energos, oor,owner1,date1)VALUES('$title','$writer',0,1,'Ελληνική Δημοκρατία','1993-03-03')";
								$result=$connection->query($sql);
								if(!$result){
								die("Invalid query".$connection->error);
								}else{
								echo "Προσθήκη σειράς επιτυχής!<br>";
								include("goback.html");
								}
							}else{
								$date=mktime(0,0,0,1,1,$_GET["year"]); //Ανάλογα με το έτος, ως ημερομηνία ορισμού κοινού κτήματος ορίζεται πάντα η πρωτοχρονιά του έτους αυτού.
								$date1=date("Y-m-d",$date);
								$sql="INSERT INTO erga(title, writer, energos, oor,owner1,date1)VALUES('$title','$writer',0,1,'Ελληνική Δημοκρατία','$date1')";
								$result=$connection->query($sql);
								if(!$result){
								die("Invalid query".$connection->error);
								}else{
								echo "Προσθήκη σειράς επιτυχής!<br>";
								include("goback.html");
								}
							}
						}else{
							echo "Παρακαλώ, συμπληρώστε έτος στην προηγούμενη σελίδα!";
						}
						}else{
							// Εάν το πρόγραμμα δεν έχει λάβει χρονιά κοινού κτήματος, ορίζει de facto την 3η Μαρτίου 1993.
							$sql="INSERT INTO erga(title, writer, energos, oor,owner1,date1)VALUES('$title','$writer',0,1,'Ελληνική Δημοκρατία','1993-03-03')";
								$result=$connection->query($sql);
								if(!$result){
								die("Invalid query".$connection->error);
								}else{
								echo "Προσθήκη σειράς επιτυχής!<br>";
								include("goback.html");
								}
						}
						break;			
				}

		?>
				<div id="blank"></div>

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