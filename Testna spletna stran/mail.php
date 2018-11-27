<?php
$ip = $_SERVER['REMOTE_ADDR'];
$to= 'primozxy@gmail.com';
$subject='support moja stran';
$headers = 'From: '.$_POST['useremail'];


      if (isset($_POST['submit'])) {
      $body= $_POST['mailc'];

              if( mail($to, $subject, $body, $headers)){
              echo	'Poslano!';
              }
              else { 
                echo 'Prislo je do napake. Mail ni bil poslan!';
                      }
       }
	   


?>


 <h2> Posiljanje e-mail sporocila</h2>
<?php  if(!isset($_POST['mailc'])) { ?>
 <br><br>
<form method ="POST" action="index.php?stran=mail">Vsebina sporocila:
<br><br>
        <textarea type="text" name="mailc" rows="10" cols="70px"></textarea>
        <br>
        Vnesite svoj e-mail naslov:<br>
        <input type="text" name ="useremail">
        <br><br>
        <input type ="submit" value="Poslji" name="submit" >
</form>
<?php }else {
echo "<br/>Mail je bil uspešno poslan";
	
}?>