<html>
<head>
</head>
<body>
<style>
#tbl {
	background-color:#CCC;
	width: auto;
	height:auto;
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

</body>
</html>

<?php
include 'db.php';
mysql_query("SET NAMES 'utf8'");

if (isset($_POST['srch'])){
$srch = $_POST['srch'];

	$sql = mysql_query("SELECT id, ime, priimek, telefon FROM demo WHERE priimek LIKE '".$srch."%' ");
	
		while($rows = mysql_fetch_array($sql)){
		$names[] = array(
		'id' => $rows['id'],
		'ime' => $rows['ime'],
		'priimek' => $rows['priimek'],
		'telefon' => $rows['telefon']);
}
}
	echo '<table id="tbl">';
	echo '<tr>';
	echo '<td>Ime</td>';
	echo '<td>Priimek</td>';
	echo '<td>Telefon</td>';
	echo '<tr>';
	
	if(count($names) < 1)
{
   		echo '<tr>';
		echo '<td>'.'Ni zadetkov'.'</td>';
		echo '</tr>';
}
else
{
	
	foreach($names as $name){
		echo '<tr>';
		echo '<td>'.$name['ime'].'</td>';
		echo '<td>'.$name['priimek'].'</td>';
		echo '<td>'.$name['telefon'].'</td>';
		echo '<td> <a href="index.php?stran=brisi&id='.$name['id'].'">Briši</a> </td>';
		echo '<td> <a href="index.php?stran=uredi&id='.$name['id'].'">Uredi</a> </td>';
		echo '</tr>';
		}
		
	echo '</table>';
}
?>
