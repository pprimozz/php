        <?php

if (isset($_POST['submit']))
{
    $naslov = $_POST['naslov'];
    $vsebina = $_POST['vsebina'];
	$avtor = $_POST['avtor'];

    mysql_query("INSERT INTO novica (naslov, vsebina, avtor, ustvarjeno) VALUES ('$naslov', '$vsebina','$avtor',now())") or die (mysql_error());
if ($_POST['naslov'] == "" || $_POST['vsebina'] == "")
{
echo "Niste vpisali vseh podatkov.". "<br/>";
}
else 
{
echo "Novica uspešno objavljena!". "<br/>";
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title></title>
<style>

</style>
</head>
<body>

<h2>Dodajanje novic</h2><br />
<form method="POST" action="index.php?stran=dodaj">Naslov novice<br/>
<input type="text" name="naslov" /><br />
Avtor:<br/>
<input type="text" name="avtor" />
<br />
Vsebina novice:<br/>
<textarea name="vsebina" rows="5" cols="50"><?php echo $vsebina; ?></textarea><br/>
<input type="submit" value="Dodaj" name="submit" />
</body>

</html>



