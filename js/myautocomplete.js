// JavaScript Document
$(document).ready(function() {
	/*$('#country').on('change',function(){
		var country = $('#country').val();
	});*/
	
	
		$('#drop_1').on('keyup',function(e){
		
		var country = $('#country').val();
		var searchbox = $(this).val();
		var dataString = 'searchword='+ searchbox+'&country='+ country;
		if( e.keyCode ==38 ){
			
			
            if( $('#search_suggestion_holder').is(':visible') ){
                if( ! $('.selected').is(':visible') ){
                    $('#search_suggestion_holder li').last().addClass('selected');
					
                }else{
                    var i =  $('#search_suggestion_holder li').index($('#search_suggestion_holder li.selected')) ;
                    $('#search_suggestion_holder li.selected').removeClass('selected');
                    i--;
                    $('#search_suggestion_holder li:eq('+i+')').addClass('selected');
					
                }
            }
        }else if(e.keyCode ==40){
			
            if( $('#search_suggestion_holder').is(':visible') ){
				
                if( ! $('.selected').is(':visible') ){
					
                    $('#search_suggestion_holder li').first().addClass('selected');	
					
                }else{
                    var i =  $('#search_suggestion_holder li').index($('#search_suggestion_holder li.selected')) ;
                    $('#search_suggestion_holder li.selected').removeClass('selected');
                    i++;
                    $('#search_suggestion_holder li:eq('+i+')').addClass('selected');
					
                }
            }
        }else if(e.keyCode ==13){
            if( $('.selected').is(':visible') ){
                var value   =   $('.selected').text();
				var zipcode = $('.selected').attr('zipattr');
	 			$('#drop_1').val(zipcode);
                $('#drop_2').val(value);
                $('#search_suggestion_holder').hide();
            }
        } else if(searchbox==''){
		
	 	$('#drop_2').val('');	
		} else {
		
		$.ajax({
			type: "POST",
			url: "includes/zipcode.php",
			data: dataString,
			beforeSend: function(){
					$("#loader-image img").removeClass('hidden');
					$("#loader-image img").addClass('show');		
			},
			success: function(getcity)	
			{
			$('.ac_results').slideDown();	
			$('.displaycity').html(getcity).show();
			$("#loader-image img").removeClass('show');
			$("#loader-image img").addClass('hidden');
			}});	
			}
			return false;	
			});
		
		
	 		
		
	
   	
	
	
			$('html').click(function() {
 			$('.ac_results').slideUp('fast');
 			});

 			$('.ac_results').on("click", "li", function(event){
     		event.stopPropagation();
	 		var cities = $(this).text();
	 		var zipcode = $(this).attr('zipattr');
	 		$('#drop_2').val(cities);
	 		$('#drop_1').val(zipcode);
	 		$('.ac_results').slideUp('fast');
 			});	
	
});

	
	
	
	



