<?php

if (isset($_POST['roll'])){
   $rand = rand(1, 6);
   echo 'You rolled a ' .$rand;
}

echo '<br><br><br><br>' .rand().' / '. getrandmax();

?>


<form action ="index.php" method ="POST">
      <input type="submit" name ="roll" value ="Roll Dice">
      </form>