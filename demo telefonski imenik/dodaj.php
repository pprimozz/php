<?php

include 'db.php';

if (isset($_POST['submit']))
{
    $ime = $_POST['ime'];
    $priimek = $_POST['priimek'];
	$telefon = $_POST['telefon'];

if ($_POST['ime'] == "" || $_POST['priimek'] == ""  || $_POST['telefon'] == "")
{
echo "Niste vpisali vseh podatkov.". "<br/>";
}
else 
{
	 mysql_query("INSERT INTO demo (ime, priimek, telefon) VALUES ('$ime', '$priimek', '$telefon') ") or die(mysql_error());
	 ?>
     <script type="text/javascript"> 
					alert("Kontakt je bil uspešno vnešen");
				</script>
     <?php
	header("Location: http://primoz-pucko.com/demo"); 
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title></title>

</head>
<body>

<h2>Dodajanje kontaktov</h2>

<form method="POST" action="index.php?stran=dodaj">
Ime:<br/>
<input type="text" name="ime" /><br />
Priimek:<br/>
<input type="text" name="priimek" />
<br />
Telefonska stevilka:<br/>
<input type="text" name="telefon" /><br/>
<input type="submit" value="Dodaj" name="submit"  />
</form>
</body>

</html>



