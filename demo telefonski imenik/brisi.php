<?php

if (isset($_GET['id']) && ($_GET['stran'] == "brisi")){

            $id = $_GET['id'];
            $sql = mysql_query("DELETE FROM demo WHERE id='$id'");

            if ($sql)
                { ?>
                <script type="text/javascript"> 
					alert("Kontakt je bil izbrisan");
				</script>
            <?php
			
            }

}
?>
