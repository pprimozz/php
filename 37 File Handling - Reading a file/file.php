<?php

     if(isset($_POST['name'])) {
      $name = $_POST['name'];
           if(!empty($name)){
                
                 $handle = fopen('names.txt', 'a');
                 fwrite($handle, $name ."\n");
                 fclose($handle);

                 $count=1;
                 $readin = file('names.txt');
                 $readin_count = count($readin);

                 foreach($readin as $fname) {
                  echo trim($fname);
                       if($count < $readin_count){
                        echo ', ';
                       }
                       $count++;
                 }
           }

     }




?>


<form action="file.php" method ="POST">
      <input type="text" name="name">
      <br> <br>
      <input type="submit" name="submit" value="Submit">
      </form>