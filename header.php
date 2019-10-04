
<?php 
require_once 'config.php';

if(isset($_GET['ajax'])){

	$queryBuilder = $conn;




	$array = $queryBuilder->fetchAll("SELECT lat, lon as lng, city, form_of_bribe, date, sector, category, description, id, name_of_company, amount FROM wp_bribery_report ORDER BY id DESC");

	$count = 0;

	foreach($array as $string){

		$array[$count]['comment'] = count($queryBuilder->fetchAll("SELECT * FROM wp_bribery_comment where wp_bribery_report_id = '" . $string['id'] . "' ORDER BY id DESC"));

		$view = $queryBuilder->fetchAssoc("SELECT * FROM wp_bribery_view WHERE wp_bribery_report_id=?", array($string['id']));

		if(!empty($view))
			$array[$count]['view'] = $view['count'];
		else
			$array[$count]['view'] = 0;

		$count++;


	}

  	$cord = json_encode($array, JSON_PRETTY_PRINT);

  	echo $cord;
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bribe report</title>

	<link rel="stylesheet" type="text/css" href="bootstrap/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/datetimepicker/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/select2/select2-bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/taginput/bootstrap-tagsinput.css">
	<link rel="stylesheet" type="text/css" href="fonts/Material/css/materialdesignicons.min.css">

	<script src="bootstrap/js/jquery-3.3.1.min.js" ></script>
	<script src="bootstrap/js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="bootstrap/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="bootstrap/select2/select2.full.js" ></script>
	<script src="bootstrap/datetimepicker/js/moment-with-locales.js" ></script>
	<script src="bootstrap/datetimepicker/js/bootstrap-datetimepicker.min.js" ></script>
	<script src="bootstrap/taginput/bootstrap-tagsinput.min.js" ></script>
	<script type="text/javascript">
		
		//$.fn.select2.defaults.set( "theme", "bootstrap" );
	</script>
</head>
<body>

