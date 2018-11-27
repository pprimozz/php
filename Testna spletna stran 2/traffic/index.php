<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<style>

#tbl {
	background-color:#CCC;
	width: auto;
	height:auto;
	border-radius: 25px;
	text-align:center;
	font-size:14px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}

th, td
{
padding:10px;
border: 1px solid black;
}

</style>
<?php
include 'db.php';

$query = mysql_query("SELECT id_visitor, ip_address, date FROM visitors");


while($result = mysql_fetch_assoc($query)){
	
	$users[] = array(
	'id_visitor' => $result['id_visitor'],
	'ip_address' => $result['ip_address'],
	'date' => $result['date']	
	);
}
	echo '<table id="tbl">';
			
	foreach($users as $user){
		$date = explode("-", $user['date']);
		echo '<tr>';
		echo '<td id="first"> User ID: '.$user['id_visitor'].'</td>';
		echo '<td> IP address: '.$user['ip_address'].'</td>';
		echo '<td> Date of visit: '.$date[2].'.'.$date[1].'.'.$date[0].'</td>';
		echo '</tr>';
		}
		
	echo '</table>';
		
mysql_close($conn);
?>

</body>
</html>