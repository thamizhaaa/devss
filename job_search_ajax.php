<script src="lib_files/ajax-libs-jqueryui-1.11.2-jquery-ui.min.js"></script>
<script>
function submitform()
{
    document.myform.submit();
}
	$(document).ready(function() {		
		$( ".button-search" ).hover(function() {
			$("#search input").addClass('hover_search');
			$("#search input").removeClass('main_search');
			$(".input_close").css('display', 'block');
		});		
		$( ".input_close" ).click(function() {
			$("#search input").addClass('main_search');
			$("#search input").removeClass('hover_search');
			$(".input_close").css('display', 'none');
		});
	});
</script>
<script type="text/javascript">
$(document).ready(function() {
$('#kwords').autocomplete({
		      	source: function( request, response ) {
		      		$.ajax({
		      			url : 'search.php',
		      			dataType: "json",
						data: {
						   name_startsWith: request.term,
						   type: 'country'
						   
						},
						 success: function( data ) {
							 response( $.map( data, function( item ) {
								return {
									label: item,
									value: item
								}
							}));
						}
		      		});
		      	},
		      	autoFocus: true,
		      	minLength: 0,				  	
		      });			  
			  });
</script>
<script type="text/javascript">
$(document).ready(function() {
$('#location').autocomplete({
		      	source: function( request, response ) {
		      		$.ajax({
		      			url : 'search.php',
		      			dataType: "json",
						data: {
						   name_With: request.term,
						   type: 'zipcode'
						   
						},
						 success: function( data ) {
							 response( $.map( data, function( item ) {
								return {
									label: item,
									value: item
								}
							}));
						}
		      		});
		      	},
		      	autoFocus: true,
		      	minLength: 0,
				    	
		      });			  
			  });
</script>