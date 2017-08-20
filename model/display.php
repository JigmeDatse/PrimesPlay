<?php 

$defaultSize=18;

if (isset($_GET["size"])) {
	$size=$_GET["size"];
} else {
	$size=$defaultSize;
}

$i=0;
$j=0;

$displayTable="<table>\n";

for ($i=1; $i <= $size; $i++) {
	$displayTable .= "\t<tr>\n";
	$rowPart=($i-1)*$size;
	for ($j=1; $j <= $size; $j++) {
		$number=$rowPart+$j;
		$displayTable .= "\t\t<td>$number,$i+$j+$number</td>\n";
	}
	$displayTable .= "\t</tr>\n";
}

$displayTable .= "</table>\n";

?>
