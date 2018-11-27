<?php

$match = 'pass123';

if (isset($_POST['password'])) {
   $password = $_POST['password'];
   if (!empty($password)) {
   if ($password==$match) {
   echo 'that is correct!';
   }else {
    echo 'that is incorrect';
   }
} else {
       echo 'Please fill in password';
}
   }
?>

<form action="index.php" method="POST">
      Password:<br>
      <input type="password" name ="password"><br><br>
      <input type="submit" name="submit">
</form>