<style>
h3
{
color: red;
font-size: 35px;
}
kk
{
	float: left;
	width: 590px;
	padding: 50px 0px 0px 0px;
}

</style>

<script type="text/javascript">
	function nekaj(){
		alert("Uspešno ste se prijavili na spletno stran");	
	}

</script>

<?php


if (($_GET['stran'] == "prijava") && (isset($_POST['submit'])))
    {
    $ime = $_POST['ime'];
    $vpisano_geslo = md5($_POST['geslo']);
    $sql = mysql_query("SELECT id_uporabnik, geslo FROM uporabniki WHERE ime='$ime'");
    list($id_uporabnik, $geslo) = mysql_fetch_row($sql);
    if (mysql_num_rows($sql) == 1)
        {
        if ($geslo == $vpisano_geslo)
            {
            $_SESSION['uporabnik'] = $ime;
			include 'arhiv.php';
			
				 if (isset($_POST['pomni']))
               		 {
						 session_start();
              			 setcookie("MojKuki", $ime, time()+3600, "/");
						
          			 }
            
       	   }
        else
            {
            echo "Nepravilno geslo.";
		
       		}
        
       }
	   
    else
        {
        echo "Uporabnisko ime je napacno.";
		
    }
}
?>

<?php

if (!isset($_SESSION['uporabnik'])) {
	
		?>

<h3><?php echo "Prijava na spletno stran"; ?></h3>

<form method="POST" action="index.php?stran=prijava">
Ime:<br />
<input type="text" name="ime" />
<br />
Geslo:<br />
<input type="password" name="geslo" />
<br />
<input type="checkbox" name="pomni" value="pomni" />zapomni si mojo prijavo <br/>
<input type="submit" value="Prijava" name="submit" />
</form>
<?php } else

{ ?>
		<script type="text/javascript">
			nekaj();
		</script>
<?php	}
?>