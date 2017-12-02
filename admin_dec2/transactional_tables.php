<?php
error_reporting(0);

include "admin_session.php";

if (isset($_POST['submit'])) {

    $indus_type = $_POST['indus_type'];

    $e_query = mysql_query("select fld_id from tbl_industry_type where fld_industrytype='$indus_type'");
    $e_sq = mysql_num_rows($e_query);

    if ($indus_type == "") {
        $err_industype = "Enter Industry type";
    } else if (!$e_sq == '') {
        $err_industype = "$indus_type is already in use.";
    }

    $errors .= $err_industype;

    $validation_form1 = "";
    if (isset($errors))
        $validation_form1 .= $errors;

    if (!$validation_form1) {

        $indus_query = mysql_query("INSERT INTO tbl_industry_type(fld_industrytype)VALUES('" . $indus_type . "')");
        ?>
        <script>
            alert("Transactiobal tables added Successfully");
            window.location = "industype_master.php";
        </script>
        <?php
    }
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <style>

            .editbox
            {
                display:none;
            }
            th 
            {
                text-align:center;
                padding:1%;
            }

            td 
            {
                text-align:center;
                padding:1%;
            }
            .editbox
            {
                font-size:14px;
                width:340px;
                background-color:#ffffcc;
                border:solid 1px #000;
                padding:1%;
            }
            .edit_tr:hover
            {
                background:url(edit.png) right no-repeat #80C8E5;
                cursor:pointer;
            }
            .err_txt{
                color: red;
            }
        </style>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php include "includes/header.php"; ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include "includes/side_menu.php"; ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Database Management
<!--                        <small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li>                        
			<li class="active">Database Management</li>
                        <li class="active">Transactional Tables</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Transactional Tables</h3></div>
                        <div class="panel-body">
			   
			    <form class="form_split_tables" action="" method="post">
				
                            <div class="col-md-10" style="margin-top:45px;">
				
                                <table id="split_tables" class="table table-bordered table-responsive" align="center" width="100%" height="30px" border="1px" cellpadding="0" cellspacing="0">
                                    <th width="10%"><input type="button" id="selectAll" class="main" value="check/uncheck"></th>
				    <th width="10%">SI NO</th><th>TABLE NAME</th>
                                    <?php
                                    $sql = mysql_query("SELECT * FROM tbl_split_tables WHERE fld_status=0");
                                    $a = 0;
                                    while ($fetch_array = mysql_fetch_array($sql)) {
                                        $a++;
                                        $industry = $fetch_array['fld_tables_name'];
                                        ?>

                                        <tr id="<?php echo $id; ?>" class="edit_tr">
					    <td class="splittables">
												
					<input type="checkbox" class="test" id="splittables" name="checkbox[]" value="<?php echo $industry; ?>" ><br>
						
					    </td>
                                            <td class="edit_td"><?php echo $a; ?></td>


                                            <td class="edit_td"><span id="first" class="text"><?php echo $industry; ?></span>
                                                <input type="text" value="<?php echo $industry; ?>" name="all_tables" class="editbox" id="first_input_<?php echo $id; ?>" data-id="<?php echo $id; ?>" /></td>
                                            
                                            <!--<td class="edit_td"><a href="#" id="<?php echo $industry; ?>" class="del_tables"><i class="fa fa-trash-o"></i></a></td>-->
                                        </tr>

<?php } ?>
					
                                </table>
				<input type="button" class="btn btn-warning tables" name="submit_tables" value="Truncate"/>
                            </div>
				</form>
                        </div>
                    </div>







                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
	<script>
$(document).ready(function () {
   $('body').on('click', '#selectAll', function () {
      if ($(this).hasClass('allChecked')) {
         $('input[type="checkbox"]', '#split_tables').prop('checked', false);
      } else {
	  
       $('input[type="checkbox"]', '#split_tables').prop('checked', true);
      
       }
       $(this).toggleClass('allChecked');
     })
}); 
	</script>
	
	
        <script type="text/javascript">
  $(document).ready(function ()
  {
      $(function () {
          $(".tables").click(function () {
	      
	      
                var chkd = [];

                $.each($("input[name='checkbox[]']:checked"), function () {

                    chkd.push($(this).val());

                });
                var value = chkd.join();
		
       
		
		
		var dataString = '&val='+ value;
			
                        $.ajax({				
                                type: "POST",
                                url: "db_update.php?op=truncate",
                                data: dataString,
				cache: false,
                               success: function (response) {
                                    //alert(response);
                                    response = $.trim(response);
                                    if (response == 1)
                                    {
                                       alert("Changes made successfully");
				       location.reload();
                                    }
                                   
                                }
			    });

       
	    });
      });
      
      
  });
 
  
  
        </script>
       
    </body>
</html>
