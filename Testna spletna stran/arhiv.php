
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
   

 <?php
 include_once "baza.inc.php";
 
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
h2
{
color: #7A67EE;
font-size: 50px;
text-align: center;;
}
h3
{
margin-bottom:  0px;
padding-bottom: 0px;
color: blue;
}
label
{
color: gray ;
font-size: 10px;
}

#column2{
	border:1px solid orange;	
	padding: 7px;
	margin-bottom: 7px;
	-webkit-box-shadow: rgba(110, 110, 110, .7) 8px 8px 8px;
	-webkit-border-radius:10px;
}

#avtor{
	border: 1px solid black;	
	-webkit-border-radius:8px;
	
	padding-left:5px;
}


</style>
<head>
  <title></title>
<style>

</style>
</head>
<body>

<p>
<h2> Novice </h2>
</p>

<?php

    $mesec = array(
        "01" => "januar",
        "02" => "februar",
        "03" => "marec",
        "04" => "april",
        "05" => "maj",
        "06" => "juni",
        "07" => "julij",
        "08" => "avgust",
        "09" => "september",
        "10" => "oktober",
        "11" => "november",
        "12" => "december"
    );

$sql = mysql_query("SELECT naslov, avtor, ustvarjeno, vsebina FROM novica ORDER BY ustvarjeno DESC");

$num = mysql_num_rows($sql);

echo "Število vseh novic: " . $num . "<br/>" . "<br/>";
  
for ($i=1; $i<=$num; $i++)
{

list($naslov ,$avtor, $ustvarjeno, $vsebina) = mysql_fetch_row($sql);
$datum_cas = explode(" ", $ustvarjeno);
$datum = explode("-", $datum_cas[0]);
$cas = explode(":", $datum_cas[1]);


?>	
	<div id="column2"><p><div id="avtor"> 	<h3><?php echo $naslov . "<br/>"; ?></h3>
			<label><?php echo $datum[2] . ". " . $mesec[$datum[1]] . " " . $datum[0] . " ob " . $cas[0] . ":" . $cas[1].":" . $cas[2]; ?> </label>
           <?php echo "objavil: ".$avtor; ?></div> <br /><br />
            
<?php			
			echo nl2br($vsebina);
			echo "<br/>";
			echo "<br/>";

?>
</p>
</div>
<?php
} 
	
?>

</p>

</body>
</html>



