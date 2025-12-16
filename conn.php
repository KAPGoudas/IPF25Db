<?php
                $servername="localhost";
				$username="root";
				$password="SenatioThyron9";
				$database="ipf25db";
				$connection= new mysqli($servername,$username,$password,$database);

				if ($connection->connect_error){
					die("Connection Failed". $connection->connect_error);
				}

// Αυτό το αρχείο χρησιμοποιείται για όλες τις σελίδες PHP που χρειάζεται να συνδεθούν με τη βάση.