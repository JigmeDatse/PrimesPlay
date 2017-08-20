<?php 

$host="localhost";
$dbname="primes";
$user="primesuser";
$password="primespassword";

$pgconnection="host=$host dbname=$dbname user=$user password=$password";

$connection=pg_connect($pgconnection);

function createDatabaseTables($connection, $sqlfile) {
	$sqlcommand = file_get_contents($sqlfile);
	if ($sqlcommand) {
		$result = pg_query($connection, $sqlcommand);
		if (!$result) {
			echo "An Error occured";
			echo pg_last_error($connection);
		}
	}
}

function getPrimes($primenumber) {
	$sqlcommand = "SELECT primevalue FROM primes WHERE primenumber=$primenumber;";
	// This needs to be dealt with... 

