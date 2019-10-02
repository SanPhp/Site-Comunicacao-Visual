<?php 
	require_once 'authorize.php';
	require_once 'connect.php';
	require_once 'appvars.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php

	if (isset($_GET['id_galeria'])) {
		
		$id_galeria = $_GET['id_galeria'];
		
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		
		$query = "DELETE FROM galeria WHERE id_galeria = $id_galeria";
		mysqli_query($dbc, $query);
		mysqli_close($dbc);

		
	}
	echo '<script language="javascript">location.href="javascript:history.back()"</script>';
 	
?>
<body>
</body>
</html>