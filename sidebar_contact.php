<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);


?>
<html>
    <head>
        <link href="css/style1.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 

	var _scroll = true, _timer = false, _floatbox = $("#contact_form"), _floatbox_opener = $(".contact-opener") ;
	_floatbox.css("right", "-300px"); //initial contact form position
	
	//Contact form Opener button
	_floatbox_opener.click(function(){
		if (_floatbox.hasClass('visiable')){
            _floatbox.animate({"right":"-300px"}, {duration: 300}).removeClass('visiable');
        }else{
           _floatbox.animate({"right":"0px"},  {duration: 300}).addClass('visiable');
        }
	});
	
	//Effect on Scroll
	$(window).scroll(function(){
		if(_scroll){
			_floatbox.animate({"top": "30px"},{duration: 300});
			_scroll = false;
		}
		if(_timer !== false){ clearTimeout(_timer); }           
			_timer = setTimeout(function(){_scroll = true; 
			_floatbox.animate({"top": "10px"},{easing: "linear"}, {duration: 500});}, 400); 
	});
	
	
	//Ajax form submit
        
        
    $("#submit_form").click(function() { 
        //alert("123456");
       var proceed = true;
//        simple validation at client's end
//        loop through each field and we simply change border color to red for invalid fields       
       $("#contact_form input[required=true], #contact_form textarea[required=true]").each(function(){
            $(this).css('border-color',''); 
           if(!$.trim($(this).val())){ //if this field is empty 
                $(this).css('border-color','red'); //change border color to red   
               proceed = false; //set do not proceed flag
           }
//            //check invalid email
            var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
            if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                $(this).css('border-color','red'); //change border color to red   
                proceed = false; //set do not proceed flag              
            }   
        });
        if(proceed)
	   {	
                   //alert("123456");	  
                   
		   var user_name=$("#username").val();
		   var user_email=$("#useremail").val();
		   var phone_number=$("#userphone").val();
		   var subject=$("#sub").val();
                   var msg=$("#messages").val();
		   
		  $.ajax({
		    type: "POST",
		    url: "contact_me.php",
			data: "user_name="+user_name+"&user_email="+user_email+"&phone_number="+phone_number+"&subject="+subject+"&msg="+msg,
                        
		    success: function(response){ 
//                        alert(response);
                        var htmlsuccess = $.trim(response);
                        alert ("Thanks for Contacting us");
                        location.reload();
                        }
                });
            }
            
 
   
  });   
    //reset previously set border colors and hide all message on .keyup()
    $("#contact_form  input[required=true], #contact_form textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#result").slideUp();
    });
	
});
</script>
<script language=Javascript>
      
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
     
   </script>
        
    </head>
    
    <body>
        <div class="floating-form" id="contact_form">
    <div class="contact-opener">Open Contact Form</div>
    <div class="floating-form-heading">Please Contact Us</div>
    <div id="contact_results"></div>
    <div id="contact_body">
        <label><span>Name <span class="required">*</span></span>
        	<input type="text" name="name" id="username" required="true" class="input-field">
        </label>
        <label><span>Email <span class="required">*</span></span>
        	<input type="email" name="email" id="useremail" required="true" class="input-field">
        </label>
        <label><span>Phone <span class="required">*</span></span>
        	<input type="text" name="phone1" maxlength="4" placeholder="+91" required="true" class="tel-number-field">-
        	<input type="text" name="phone2" maxlength="15" id = "userphone" required="true" onkeypress="return isNumberKey(event)" class="tel-number-field long">

        </label>
        <label for="subject"><span>Regarding</span>
  
            <select name="subject" id="sub" class="select-field">
                    <option value="General Question">General</option>
                    <option value="Advertise">Advertisement</option>
                    <option value="Partnership">Package</option>
            </select>
        </label>
        	<label for="field5"><span>Message <span class="required">*</span></span></label>
        	<textarea name="message" id="messages" class="textarea-field" required="true"></textarea>
        
        <label>
        	<span>&nbsp;</span><input type="submit" id="submit_form"  value="Submit">
        </label>
    </div>
</div>
        
        
        
        
    </body>
</html>