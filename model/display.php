<?php 

$defaultSize=15;

if (isset($_GET["size"])) {
	$size=$_GET["size"];
} else {
	$size=$defaultSize;
}

if (isset($_GET["primenumber"])) {
	$primenumber=$_GET["primenumber"];
} else {
	$primenumber=0;
}

$i=0;
$j=0;

$tableResults="<ul>\n";

$displayTable="<table>\n";

$displayTable .= "\t<caption>Primes up to prime number $primenumber, and unconfirmed beyond that</caption>";

for ($i=1; $i <= $size; $i++) {
	$displayTable .= "\t<tr>\n";
	$rowPart=($i-1)*$size;
	for ($j=1; $j <= $size; $j++) {
		$number=$rowPart+$j;
		if ($number <= $primenumber) {
			$prime = getPrime($connection, $number);
			if ($prime > $number) {
				$displayTable .= "\t\t<td>$number, $prime</td>\n";
			} else { 
				$displayTable .= "\t\t<td>x, xxx</td>\n";
				$tableResults .= "\t<li>Prime Number: $number does not exist, and needs to be generated</li>";
			}
		} else {
			$unconfirmednumber=$number-$primenumber;
			$unconfirmed=getUnconfirmed($connection, $primenumber, $unconfirmednumber);
			if ($unconfirmed > $unconfirmednumber) {
				$displayTable .= "\t\t<td>U, $unconfirmed</td>\n";
			} else {
				$displayTable .= "\t\t<td>x, xxx</td>\n";
				$tableResults .= "\t<li>Unconfirmed number: $unconfirmednumber, for Prime Number: $primenumber does not exist, and needs to be generated</li>\n";
			}
		}
	}
	$displayTable .= "\t</tr>\n";
}

$displayTable .= "</table>\n";

?>
