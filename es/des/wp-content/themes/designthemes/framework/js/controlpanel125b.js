if (typeof dttheme_urls === 'undefined') {
    var dttheme_urls = "";
}
$patterns = "";
var $rtl = dttheme_urls.isRTL;

for(var i=1; i<= 10; i++){
	$img = dttheme_urls.theme_base_url + "/images/style-picker/pattern"+i+".jpg";
	$patterns += '<li>';
	$patterns += '<a id="pattern'+i+'"  href="" title="">';
	$patterns += '<img src="'+ $img +'" alt="pattern'+i+'" title="pattern'+i+'" width="30" height="30" />';
	$patterns += '</a>';
	$patterns += '</li>'; 
}

$color = ["blue","brown","cadetblue","chillipepper","cyan","darkgolden","deeporange","darkpink","deeppurple","green","lime","magenta","orange","purple","red", "skyblue","teal","turquoise","wisteria","pink"];
$colors = "";
for(var i=0; i<$color.length; i++){
	$img = dttheme_urls.theme_base_url + "/images/style-picker/"+$color[i]+".jpg";
	$colors += '<li>';
	$colors += '<a id="'+$color[i]+'" href="" title="">';
	$colors += '<img src="'+ $img +'" alt="color-'+$color[i]+'" title="color-'+$color[i]+'" width="30" height="30" />';
	$colors += '</a>';
	$colors += '</li>';
}



jQuery(document).ready(function($){
	$("body > div.wrapper").before($str);
	$picker_container = $("div.dt-style-picker-wrapper");

	//Applying Cookies
	if($rtl == true) {
		if ( $.cookie('control-open') === '1' ) {
			$picker_container.animate({right: 0});
			$('a.style-picker-ico').removeClass('control-open');
		} else {
			$picker_container.animate( { right: -230 } );
			$('a.style-picker-ico').addClass('control-open');
		}
	} else {
		if ( $.cookie('control-open') === '1' ) {
			$picker_container.animate({left: 0});
			$('a.style-picker-ico').removeClass('control-open');
		} else {
			$picker_container.animate( { left: -230 } );
			$('a.style-picker-ico').addClass('control-open');
		}
	}

	//Check Cookies in diffent pages and do the following things
	if($.cookie("designtheme_skin")!= null){
		$href = $("link[id='skin-css']").attr("href");
		$href = $href.substr(0,$href.lastIndexOf("/"));
		$href = $href.substr(0,$href.lastIndexOf("/"))+"/"+$.cookie("designtheme_skin")+"/style.css";
		$("link[id='skin-css']").attr("href",$href);
		$("ul.color-picker a[id='"+$.cookie("designtheme_skin")+"']").addClass("selected");
	}else{
		$("ul.color-picker a:first").addClass("selected");
	}

	//Apply Layout
	if($.cookie("designtheme_layout") == "boxed"){
		$("ul.layout-picker li a").removeAttr("class");
		$("ul.layout-picker li a[id='"+$.cookie("designtheme_layout")+"']").addClass("selected");
		$("div#pattern-holder").removeAttr("style");

		$i = ($.cookie("designtheme_pattern")) ? $.cookie("designtheme_pattern")  : 'pattern1';
		$img = dttheme_urls.theme_base_url + "/images/patterns/"+$i+".jpg";
		$('body').css('background-image', 'url('+$img+')').addClass('layout-boxed').removeClass('layout-wide');
		$("ul.pattern-picker a[id="+$.cookie("designtheme_pattern")+"]").addClass('selected');
	} else if($.cookie("designtheme_layout") == "fullwidth"){
		$("ul.layout-picker li a").removeAttr("class");
		$("ul.layout-picker li a[id='"+$.cookie("designtheme_layout")+"']").addClass("selected");
		$("div#pattern-holder").removeAttr("style");

		$('body').removeClass('layout-boxed');
		$("div#pattern-holder").slideUp();
		$("ul.pattern-picker a").removeAttr("class");
	}

	if($.cookie("designtheme_scheme") != null){
		$("ul.scheme-picker li a").removeAttr("class");
		if( $.cookie("designtheme_scheme") === "dark" ) {
			$("<link id='light-dark-css' href='"+ dttheme_urls.theme_base_url +"/dark/dark-skin.css' rel='stylesheet' media='all' />").insertBefore($('#skin-css'));
			$("ul.scheme-picker a:last").addClass('selected');
		}
		else if( $.cookie("designtheme_scheme") === "light" ) {
			$('#light-dark-css').remove();
			$("ul.scheme-picker a:first").addClass('selected');
		}
	}
	//Applying Cookies End

	//Picker On/Off
	$("a.style-picker-ico").click(function(e){
		$this = $(this);
		if($rtl == true) {
			if($this.hasClass('control-open')){
				$picker_container.animate({right: 0},function(){$this.removeClass('control-open');});
				$.cookie('control-open', 1, { path: '/' });	
			}else{
				$picker_container.animate({right: -227},function(){$this.addClass('control-open');});
				$.cookie('control-open', 0, { path: '/' });
			}
		} else {
			if($this.hasClass('control-open')){
				$picker_container.animate({left: 0},function(){$this.removeClass('control-open');});
				$.cookie('control-open', 1, { path: '/' });	
			}else{
				$picker_container.animate({left: -227},function(){$this.addClass('control-open');});
				$.cookie('control-open', 0, { path: '/' });
			}
		}
		e.preventDefault();
	});//Picker On/Off end

	//Layout Picker
	$("ul.layout-picker a").click(function(e){
		$this = $(this);
		$("ul.layout-picker a").removeAttr("class");
		$this.addClass("selected");
		$.cookie("designtheme_layout", $this.attr("id"), { path: '/' });

		if( $.cookie("designtheme_layout") === "boxed") {
			$("body").removeClass("layout-wide").addClass("layout-boxed");
			$("div#pattern-holder").slideDown();
			
			if( $.cookie("designtheme_pattern") == null ){
				$("ul.pattern-picker a:first").addClass('selected');
				$.cookie("designtheme_pattern","pattern1",{ path: '/' });
			}else{
				$("ul.pattern-picker a[id="+$.cookie("designtheme_pattern")+"]").addClass('selected');
				$img = dttheme_urls.theme_base_url + "/images/patterns/"+$.cookie("designtheme_pattern")+".jpg";
				$('body').css('background-image', 'url('+$img+')');
			}
		} else {
			$("body").removeAttr("style").removeClass("layout-boxed");
			$("div#pattern-holder").slideUp();
			$("ul.pattern-picker a").removeAttr("class");
		}
		window.location.href = location.href;
		e.preventDefault();
	});//Layout Picker End

	//Scheme Picker
	$("ul.scheme-picker a").click(function(e){
		$this = $(this);
		$("ul.scheme-picker a").removeAttr("class");
		$this.addClass("selected");
		$.cookie("designtheme_scheme", $this.attr("id"), { path: '/' });
		if( $.cookie("designtheme_scheme") === "dark" ) {
			$("<link id='light-dark-css' href='"+ dttheme_urls.theme_base_url +"/dark/dark-skin.css' rel='stylesheet' media='all' />").insertBefore($('#skin-css'));
		}
		else if( $.cookie("designtheme_scheme") === "light" ) {
			$('#light-dark-css').remove();
		}
		e.preventDefault();
	});//Scheme Picker End

	//Pattern Picker
	$("ul.pattern-picker a").click(function(e){
		if($.cookie("designtheme_layout") == "boxed"){
			$this = $(this);
			$("ul.pattern-picker a").removeAttr("class");
			$this.addClass("selected");
			$.cookie("designtheme_pattern", $this.attr("id"), { path: '/' });
			$img = dttheme_urls.theme_base_url + "/images/patterns/"+$.cookie("designtheme_pattern")+".jpg";
			$('body').css('background-image', 'url('+$img+')');
		}
		e.preventDefault();
	});//Pattern Picker End

	//Color Picker
	$("ul.color-picker a").click(function(e){
		$this = $(this);
		$("ul.color-picker a").removeAttr("class");
		$this.addClass("selected");
		$.cookie("designtheme_skin", $this.attr("id"), { path: '/' });
		$href = $("link[id='skin-css']").attr("href");
		$href = $href.substr(0,$href.lastIndexOf("/"));
		$href = $href.substr(0,$href.lastIndexOf("/"))+"/"+$this.attr("id")+"/style.css";
		$("link[id='skin-css']").attr("href",$href);
		e.preventDefault();
	});//Color Picker End

});