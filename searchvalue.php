<?php
require_once("config.php");
if(!empty($_POST["citykeyword"])) {                              
 ?>
<ul id="city_list">
<?php
    $sql="SELECT * FROM tbl_cities WHERE fld_name like '" . $_POST["citykeyword"] . "%' ORDER BY fld_name LIMIT 0,7";                            
    $res=mysql_query($sql);  
    while($rows=mysql_fetch_assoc($res))           
    {
?>
<li onClick="selectCity('<?php echo $rows["fld_name"]; ?>');"><?php echo $rows["fld_name"]; ?></li>

<?php } ?>
</ul>
<?php  } ?>