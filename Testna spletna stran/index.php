<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<?php 
session_start();
include_once "baza.inc.php";
if (isset($_COOKIE['MojKuki']))
    {
    $_SESSION['uporabnik'] = $_COOKIE['MojKuki'];
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Primož Pucko spletna stran</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.php?stran=arhiv">Primož Pucko </a></h1>
			<p>Testna spletna stran</p>
		</div>
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="#">Homepage</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Photos</a></li>
				<li><a href="#">About</a></li>
							</ul>
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
    	<div id="content">	
		
       
        <?php
                if (isset($_GET['stran']))
                    {
                    $stran = $_GET['stran'];
                        include_once $stran . ".php";

                }
                else
                    {
                    include_once "arhiv.php";
                }
                ?>
  
        </div>
		<!-- end #content -->
		<div id="sidebar">
			<ul>
				<li>
					<div id="search" >
						<form method="get" action="#">
							<div>
								<input type="text" name="s" id="search-text" value="" />
								<input type="submit" id="search-submit" value="GO" />
							</div>
						</form>
					</div>
					<div style="clear: both;">&nbsp;</div>
				</li>
				<li>
					<h2>Menu</h2>
                    <?php	
					if 	(isset($_SESSION['uporabnik']))
					{	?>
					<p style="color:red">Pozdravljen: <?php	echo $_SESSION['uporabnik']	?><div id="user"></div> </p>
                    <?php	}
					else
					{	?>
                    
                  	<p>V spodnjem menuju izberite navedene možnosti. Za dodajanje in urejanje novic je potrebna registracija.</p>
                    <?php
					}
					?>
                    
				</li>
				<li>
					<h2>Novice</h2>
                    <?php
                if (isset($_SESSION['uporabnik']))
                    {
                    ?>
					<ul>
						<li><a href="index.php?stran=dodaj">Dodaj novico</a></li>
						<li><a href="index.php?stran=uredi">Uredi novico</a></li>
						<li><a href="index.php?stran=arhiv">Arhiv novic</a></li>

                  					</ul>
                    <?php
					}
					else
					{
					?>
                    	<ul>
                        <li><a href="index.php?stran=arhiv">Arhiv novic</a></li>
					</ul>
                    <?php }
					?>
				</li>
				<li>
					<h2>Uporabniki</h2>
                    <?php
                if (isset($_SESSION['uporabnik']))
                    {
                    ?>
					<ul>    <li><a href="index.php?stran=mail">Poslji email administratorju</a></li>
						<li><a href="index.php?stran=odjava">Odjava</a></li>

					</ul>
                    <?php
                    }
					else
					{
                    ?>
                    <ul>
                    <li><a class="hover" href="index.php?stran=registracija" hovertext="Registrirajte se na strani">Registracija</a></li>
						<li><a href="index.php?stran=prijava">Prijava</a></li>
											
                    </ul>
                     
                    <?php
					}	?>
				</li>
				
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
<div id="footer-content">
	<div id="footer-bg" class="container">
		<div id="column1">
			<h2>Welcome to my website</h2>
			<p>Welcome to my website. In the page above this section you can see the news.<br />Have fun fuckers!</p>
		</div>
		
		<div id="column3">
			<h2>Recommended Links</h2>
			<ul>
				<li><a href="#">Consectetuer adipiscing elit</a></li>
				<li><a href="#">Metus aliquam pellentesque</a></li>
				<li><a href="#">Suspendisse iaculis mauris</a></li>

			</ul>
		</div>
	</div>
</div>
<div id="footer">
	<p>Copyright (c) 2011 pprimozztestsite50.net All rights reserved. Design by <a href="http://www.freecsstemplates.org/">Primož Pucko</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
