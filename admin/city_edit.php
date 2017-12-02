<?php
error_reporting(0);
session_start();
include("includes/config.php");

$oper = $_REQUEST['op'];
if($oper =='editcity')
{

	$cityid = $_REQUEST['getcityid'];
	$fetchstateid = "select ts.fld_id as state_id,tc.fld_id as country_id, tcc.fld_id as city_id,tcc.fld_name as city_name,tc.fld_name as country_name,ts.fld_name as state_name from tbl_cities tcc join tbl_states ts on tcc.fld_state_id=ts.fld_id join tbl_countries tc on tc.fld_id= ts.fld_country_id where tcc.fld_id =$cityid";
        echo "select ts.fld_id as state_id,tc.fld_id as country_id, tcc.fld_id as city_id,tcc.fld_name as city_name,tc.fld_name as country_name,ts.fld_name as state_name from tbl_cities tcc join tbl_states ts on tcc.fld_state_id=ts.fld_id join tbl_countries tc on tc.fld_id= ts.fld_country_id where tcc.fld_id =$cityid";
	$fetchstateidsql = mysql_query($fetchstateid);	
	$row=mysql_fetch_array($fetchstateidsql);	
		$id = $row['city_id'];
		$state_name = $row['state_name'];
                $country_name = $row['country_name'];
                $city_name = $row['city_name'];
                $state_id = $row['state_id'];
                $country_id = $row['country_id'];
                

                              
             
	    echo '<div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit/Update City Details</h4>
                    </div>
                    <div class="modal-body">     
                        <form role="form" class="form-horizontal" autocomplete="off">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-6">Country name <span class="required"></span></label>
                                <div class="col-sm-6">
                                
                                    <input class="flexdatalist country_allresults_edit" data-data="country.json" data-search-in="country" data-selection-required="true" data-value-property="country" data-text-property="{country}" data-min-length="1" name="country" placeholder="Enter The country name"  type="text"  value="'.$country_name.'">
                                    <input type="hidden" value="" id="country_id" name="country_id">
                                    <span class="err_txt help-block" id="err3" style="display:none;">This field is required</span>
                               
                               
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    
                                    <label class="col-sm-6">State Name *</label>
                                        <div class="col-sm-6">

                                        <select id="state_name" name="state" class="questions-category form-control state_allresults_edit" data-placeholder="Select state" >';

                                $state_ids=[];
                                $state_names=[];
                                $sql="SELECT * FROM tbl_states WHERE fld_country_id ='$country_id'";
                                echo $sql;
                                        $res=mysql_query($sql);
                                            while($rows=mysql_fetch_assoc($res))
                                {   
                                                array_push($state_ids, $rows['fld_id']);
                                                array_push($state_names, $rows['fld_name']);
                                        
                                }
                                                 foreach($state_names as $state_name_list)
                                                {  
                                                
//                                $roles=explode(",", $rows['fld_name']);
                                ?>
                                

                                        
<option <?php if(trim($state_name_list) == $state_name){echo("selected = selected");} ?>  value="<?php echo $state_name_list;?>" ><?php echo $state_name_list;?></option>

                                    
                                    <?php

                                        }

                                       echo '

                                        </select>
                                        <input type="hidden" value="'.$state_id.'" id="state_id_num" name="state_id" >
                                        <span class="err_txt help-block" id="err2" style="display:none;">This field is required</span>

                                        </div>

                                    </div>
                                    
                                



                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-6">City name<span class="required"></span></label>
                                <div class="col-sm-6">
                               <input id="cityname_edit" placeholder="Enter the city name" class="form-control" type="text" value="'.$city_name.'">
                                  <span class="err_txt help-block" id="err4" style="display:none;">This field is required</span> 
                                </div>
                            </div>
                            </div>
                            
</div>
                            </div>
                                                  
                    </form>
                    </div>
            <div class="modal-footer">
            <input id="edit_city"  type="button" class="btn btn-success" value ="Save" > 
            </div>                    
                </div>
				</div>';
}



?>
<link href="../scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
<link href="../scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
<script src="../scripts/ddl/jquery.flexdatalist.min.js"></script>
<script src="../scripts/ddl/jquery.flexdatalist.js"></script>

<script>
 $('.country_allresults_edit').flexdatalist({
     minLength: 1,
     valueProperty: '*',
     selectionRequired: true, 
     textProperty: '{country}',
     searchIn: 'country',
     data: 'country.json'
});

</script>
<script>
  $('#edit_city').click(function(){  
    
    var country = $(".country_allresults_edit").val();
                       if(country == " " ){
                           $('#err3').show();
                           $('#err3').fadeOut(3000);
                }
    
   var city = $("#cityname_edit").val();
                       if(city == " " ){
                           $('#err4').show();
                           $('#err4').fadeOut(3000);
                }
    var state = $("#state_name").val();
                       if(state == " " ){
                           $('#err2').show();
                           $('#err2').fadeOut(3000);
                }
    
    
    if(country != '' && city !='' && state !='' ){


var countryid = $("#country_id").val();
var countryname = $(".country_allresults_edit").val();

var cityname = $("#cityname_edit").val();
var id = '<?php echo $cityid; ?> ';
var state_id = $('#state_id_num').val();

var dataString = '&state_id='+ state_id +'&cityname='+cityname+'&countryname='+countryname+ '&city_id='+id;
 
$.ajax({
type: "POST",
url: "edit_city.php",
data: dataString,
cache: false,
success: function(result){
    var result1=$.trim(result);
    
       
    alert("Updated Successfully");

    location.reload();
   //alert(result);

}
});

return false;

//}

    }
     });

            $('.country_allresults_edit').change(function () {
  
                    var value = $(this).val();
                    var items = [];

                              $.getJSON('country.json',function(data){
                        var data_length = Object.keys(data).length;
                                for(var j=0; j < data_length ; j++){
                                    if (data[j].country == value) {
                                      items.push(data[j].id);
                            }
                          }
                        var country_id = items.join(",");
//                       alert(country_id);
                        $('#country_id').val(country_id);
                       
                    $.ajax({
                        type: "POST",
                        url: "ajaxdel.php?op=editstate",
                        data: ({country_id: country_id}),
                        success: function (data) {
//                            alert(data);
                            $("#state_name").html(data);
                        }
                    });
                    });

                });
                
                
                $('.state_allresults_edit').change(function () {
                    var value = $(this).val();
                    var items = [];

                              $.getJSON('state.json',function(data){
                        var data_length = Object.keys(data).length;
                                for(var j=0; j < data_length ; j++){
                                    if (data[j].state == value) {
                                      items.push(data[j].id);
                            }
                          }
                        var state_id = items.join(",");
                        $('#state_id_num').val(state_id);

                    });

                });

</script>