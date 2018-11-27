<?php
if (isset($_GET['id']) && $_GET['stran']=='uredi' && (!isset($_POST['submit'])))
{
    $id = $_GET['id'];
    $sql = mysql_query("SELECT ime, priimek, telefon FROM demo WHERE id ='$id'");
	
		while($rows = mysql_fetch_array($sql)){
		$ime = $rows['ime'];
		$priimek = $rows['priimek'];
		$telefon = $rows['telefon'];
}
		
?>

<form method="POST" action="index.php?stran=uredi&id=<?php echo $id; ?>">
Ime<br/>
<input type="text" name="ime" value="<?php echo $ime; ?>"/>
<br />
Priimek:<br/>
<input type="text" name="priimek" value="<?php echo $priimek; ?>"/>
<br />
Telefonska številka:<br/>
<input type="text" name="telefon"  value= "<?php echo $telefon; ?>" /><br/>
<input type="submit" value="Uredi" name="submit" />
<br />
</form>

<?php
}

else if ($_GET['stran']=='uredi' && (isset($_POST['submit'])))
    {

    $ime = $_POST['ime'];
    $priimek = $_POST['priimek'];
	$telefon = $_POST['telefon'];
    $iid = $_GET['id'];
    $sql = mysql_query("UPDATE demo SET ime='$ime', priimek='$priimek',telefon ='$telefon' WHERE id='$iid'") or die (mysql_error());

    if ($sql)
        {?>
        <script type="text/javascript"> 
					alert("Kontakt je bil uspešno spremenjen");
				</script>
                <?php
		} 
} 
?>