<?php

include "admin_session.php";

$i = $_REQUEST['id'];
if ($i != "") {

    $query = mysql_query("UPDATE tbl_booster SET fld_delstatus=2 where fld_id= '" . $i . "'");
    if ($query) {
        ?>		
        <script>
            alert("Deleted Successfully");
            window.location = 'booster.php';
        </script>

        <?php

    }
    ?>
    <?php

} else {
    ?>
    <script>
        alert("Error in deleting Booster");
        window.location = 'booster.php';

    </script>
    <?php

}
?>