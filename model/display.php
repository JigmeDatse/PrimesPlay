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

$displayTable="<table>\n";

echo "\t<caption>Primes up to prime number $primenumber, and unconfirmed beyond that</caption>

for ($i=1; $i <= $size; $i++) {
	$displayTable .= "\t<tr>\n";
	$rowPart=($i-1)*$size;
	for ($j=1; $j <= $size; $j++) {
		$number=$rowPart+$j;
		if ($number <= $primenumber) {
			$prime = getPrime($primenumber);
			$displayTable .= "\t\t<td>$number,$prime</td>\n";
		} else {
			$unconfirmednumber=$number-$primenumber;
			$unconfirmed[$unconfirmednumber]=getUncomfirmed($primeNumber, $unconfirmednumber);
			$displayTable .= "\t\t<td>U,$unconfirmed</td>\n";
		}
	}
	$displayTable .= "\t</tr>\n";
}

$displayTable .= "</table>\n";

?>
