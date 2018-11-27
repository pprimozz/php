<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_GET['id']) && ($_GET['stran'] == "brisi"))
        {
            $id = $_GET['id'];
            $sql = mysql_query("DELETE FROM novica WHERE id_novica='$id'");

            if ($sql)
                { ?>
                <script type="text/javascript"> 
					alert("Novica je bila izbrisana");
				</script>
            <?php
			
            }
}
?>
