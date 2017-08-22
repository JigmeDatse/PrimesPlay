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

function getPrime($connection, $primenumber) {
	$sqlcommand = "SELECT primevalue FROM primes WHERE primenumber=$primenumber;";
	// This needs to be dealt with...
	$result=pg_query($connection, $sqlcommand);
	$therow=pg_fetch_row($result);
	return($therow);
}

function getUnconfirmed($connection, $primenumber, $unknownnumber) {
	$unverifiedids[]=0;
	$sqlcommand = "SELECT primeid FROM primes WHERE primenumber=$primenumber";
	$result=pg_query($connection, $sqlcommand);
	$primeids=pg_fetch_row($result);
	$primeid=pg_escape_literal($primeids[0]);
	if ($result && $primeid && ($primeid!="''")) {
		$sqlcommand = "SELECT unverifiedid FROM primesunverifiedkeys WHERE primeid=$primeid";
		$result=pg_query($connection, $sqlcommand);
		$unverifiedids = pg_fetch_all($result);
	} else {
		return(-1);
	}
	if ($result && $unverifiedids) {
		$theunverifiedid = $unverifiedids[$unknownnumber];
		$sqlcommand = "SELECT value FROM unverified WHERE unverifiedid=$theunverifiedid";
		$result=pg_query($connection, $sqlcommand);
		$thenumber=$pg_fetch_row($result);

	} else {
		return(-2);
	}
	if ($result && $thenumber) {
		return($thenumber);
	} else {
		return(-3);
	}
}
