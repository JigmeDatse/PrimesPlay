<?php 

require_once "model/index.php";
require_once "model/database.php";

switch ($action) {
	case "display":
		$pageName="display";
		include "model/display.php";
		include "view/display.html.php";
		break;
	case "index":
		$pageName="index";
		include "view/index.html.php";
		break;
	default:
		$pageName="default";
		include "view/index.html.php";
}

?>
