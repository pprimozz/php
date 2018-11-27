<!doctype html>
<html>
<head>
<?php
include 'db.php';
mysql_query("SET NAMES 'utf8'");
?>
<meta charset="utf-8">
<title>Demo aplikacija telefonski imenik</title>
<link rel="stylesheet" type="text/css" href="style.css" />
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

<h1 id="naslov">Spletni imenik (demo aplikacija)</h1>
<?php
if (isset($_GET['stran']))
                    {
                    $stran = $_GET['stran'];
                        include_once $stran . ".php";

                }
                else
                    {
                    include_once "index.php";
                }
?>
<a href="dodaj.php">Dodaj nov kontakt</a> 

<label id="isci">Išči po priimku:</label> <input type="text" id="search"/>


</br></br>
<div id="content">
<?php
$query = mysql_query("SELECT id, ime, priimek, telefon FROM demo");


while($result = mysql_fetch_assoc($query)){
	
	$names[] = array(
	'id' => $result['id'],
	'ime' => $result['ime'],
	'priimek' => $result['priimek'],
	'telefon' => $result['telefon']	
	);
}
	echo '<table id="tbl">';
	echo '<tr>';
	echo '<td>Ime</td>';
	echo '<td>Priimek</td>';
	echo '<td>Telefon</td>';
	echo '<tr>';
			
	foreach($names as $name){
		
		echo '<tr>';
		echo '<td id="first">'.$name['ime'].'</td>';
		echo '<td> '.$name['priimek'].'</td>';
		echo '<td> '.$name['telefon'].'</td>';
		echo '<td> <a href="index.php?stran=brisi&id='.$name['id'].'">Briši</a> </td>';
		echo '<td> <a href="index.php?stran=uredi&id='.$name['id'].'">Uredi</a> </td>';
		echo '</tr>';
		}
		
	echo '</table>';
?>
</div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jfunc.js"></script>
</body>
</html>