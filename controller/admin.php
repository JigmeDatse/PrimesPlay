<?php 

include "model/admin.php";

switch ($action) {
	case "createdb":
		$pageName="admin - Create Database";
		include "model/database.php";
		include "model/createdb.php";
		include "view/admin/createdb.html.php";
		break;
	case "index":
		$pageName="admin - index";
		include "view/admin/index.html.php";
		break;
	default:
		$pageName="default";
		include "view/admin/index.html.php";
}

?>
