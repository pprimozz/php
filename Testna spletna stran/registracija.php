<style>
h3
{
color: red;
font-size: 35px;
}

</style>

<?php


if (($_GET['stran'] == "registracija") && (isset($_POST['submit'])))
        {
            $geslo = md5(strip_tags($_POST['geslo']));
            $geslo_ponovitev = md5($_POST['geslo_ponovitev']);
            $imev = $_POST['ime'];
            $imee = mysql_query("SELECT ime FROM uporabniki where ime = '$imev' ");
			list($ime) = mysql_fetch_row($imee);
			if ($imev != $ime) {
          	  if ($geslo == $geslo_ponovitev)
                {
                
                $sql = mysql_query("INSERT INTO uporabniki (ime, geslo) VALUES ('$imev', '$geslo')") or die (mysql_error());
				 echo "Registracija je uspela.";
				 include_once 'arhiv.php';
            }
            else
                {
                echo "Gesli nista enaki";
            }
			} else {
				echo 'Uporabnik s tem uporabniškim imenom že obstaja.';
			}
}

?>

<h3><?php echo "Registracija"; ?></h3>
<html>
<head>
</head>
<body>
<form method="POST" action="index.php?stran=registracija">
Ime:<br />
<input type="text" name="ime" />
<br />
Geslo:<br />
<input type="password" name="geslo" />
<br />
Ponovite geslo:<br />
<input type="password" name="geslo_ponovitev" /><br /><br />
<input type="submit" value="Registracija" name="submit"/>
</form>

<script type="text/javascript" src="js/jquery.js">	</script>
    <script type="text/javascript" src="js/ext.js"> </script>
</body>
</html>