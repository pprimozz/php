<?php


$sql = mysql_query("SELECT naslov, id_novica, avtor FROM novica ORDER BY ustvarjeno DESC");
$num = mysql_num_rows($sql);
?>

  <style>
  h3
  {
	  color: red;
	  font-size: 35px;
  }
  </style>


<h3>Urejanje novic</h3>
<br />
<br />
	
<?php


if (isset($_GET['id']) && $_GET['stran']=='uredi' && (!isset($_POST['submit'])))
{
    $id = $_GET['id'];
    $sql = mysql_query("SELECT naslov, vsebina, avtor FROM novica WHERE id_novica ='$id'");
    $num = mysql_num_rows($sql);
    list($naslov, $vsebina, $avtor) = mysql_fetch_row($sql);
	
?>
	
	Izbrali ste novico z ID stevilko <?php echo $id; ?> <br /> <br />

<form method="POST" action="index.php?stran=uredi&id=<?php echo $id; ?>">
Naslov novice<br/>
<input type="text" name="naslov" value="<?php echo $naslov; ?>"/>
<br />
Avtor:<br/>
<input type="text" name="avtor" value="<?php echo $avtor; ?>"/>
<br />
Vsebina novice:<br/>
<textarea name="vsebina" rows="20px" cols="70px"><?php echo $vsebina; ?></textarea><br/>
<input type="submit" value="Uredi" name="submit" />
<br />
</form>

<?php
}

else if ($_GET['stran']=='uredi' && (isset($_POST['submit'])))
    {

    $naslov = $_POST['naslov'];
    $vsebina = $_POST['vsebina'];
	$avtor = $_POST['avtor'];
    $id = $_GET['id'];
    $sql = mysql_query("UPDATE novica SET naslov='$naslov', vsebina='$vsebina',avtor ='$avtor', ustvarjeno=now() WHERE id_novica='$id'") or die (mysql_error());

    if ($sql)
        {
        echo "Novica je bila uspešno posodobljena.";
		}
    
} 


else
{
?>

Izberite novico, ki jo zelite urediti. <br /><br />

<?php

	for($i = 1; $i<=$num; $i++)
	{
	list($naslov, $id_novica, $avtor) = mysql_fetch_row($sql);
?>
	<a href="index.php?stran=brisi&id=<?php echo $id_novica; ?>"><img border="0" src="brisi.png" width="15" height="15"/></a>
	<a href="index.php?stran=uredi&id=<?php echo $id_novica; ?>"><?php echo $naslov; ?></a><br />
<?php
	}
}
?>

