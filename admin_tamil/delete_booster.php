<?php

include "admin_session.php";

$i = $_REQUEST['id'];
if ($i != "") {

    $query = mysql_query("delete from tbl_booster where id= '" . $i . "'");

    if ($query) {
        ?>		
        <script>
            alert("Booster Deleted");
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