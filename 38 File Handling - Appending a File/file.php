<?php

                
     $handle = fopen('names.txt', 'a');
     fwrite($handle, "\n" .'Steven'. "\n");

     fclose($handle);
