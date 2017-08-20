<?php 

include "model/index.php";

switch ($action) {
	case "index":
		$pageName="index";
		include "view/index.html.php";
		break;
	default:
		$pageName="default";
		include "view/index.html.php";
}

?>
