(function($){
  "use strict";
	
	// on ready function
	jQuery(document).ready(function($) {
		var $this = $(window);
		// on load function
		$this.on("load",function(){
			jQuery("#status").fadeOut();
			jQuery("#preloader").delay(350).fadeOut("slow");	
		});
		
		// on scroll function
		$this.on("scroll",function(){
			//chat window show/hide
			if ($(this).scrollTop() > 500) {
				$('.lms_chat_window').fadeIn();
			} else {
				$('.lms_chat_window').fadeOut();
			}
			
			
			//Check to see if the window is top if not then display button
			if ($(this).scrollTop() > 100) {
				$('.scrollToTop').fadeIn();
			} else {
				$('.scrollToTop').fadeOut();
			}
			
			
			//active menu on scroll one page
			var windscroll = $this.scrollTop();
			if (windscroll >= 100) {
				$('.lms_section').each(function(i) {
					if ($(this).position().top <= windscroll + 10 ) {
						$('.one_page_nav ul li').removeClass('active');
						$('.one_page_nav ul li').eq(i).addClass('active');
					}
				});
			} else {

				$('.one_page_nav ul li').removeClass('active');
				
			}
			
		});
		
		// on resize function
		$this.on("resize",function() {
			// course-detail-list-view --- sorting on mobile
			var width = $(document).width();
			if (width < 767) {
				$('.lms_sort_language h3').on("click",function(){
					$('.lms_sort_language').children('ul').slideToggle();
					});
				$('.lms_sort_skill_level h3').on("click",function(){
					$('.lms_sort_skill_level').children('ul').slideToggle();
					});
				$('.lms_sort_software h3').on("click",function(){
					$('.lms_sort_software').children('ul').slideToggle();
					});
				$('.lms_sort_author h3').on("click",function(){
					$('.lms_sort_author').children('ul').slideToggle();
					});
				$('.lms_sort_other h3').on("click",function(){
					$('.lms_sort_other').children('ul').slideToggle();
					});			
			}
			else if(width > 767){
				$('.lms_sort_language h3').unbind( "click" );
			}
			
		});
		
		//on bind scroll 
		$this.bind("scroll", function() {
			// fixed menu on scroll
			var width = $(document).width();
			if (width < 991) {
				if ($this.scrollTop() > 30) {
					 $('#lms_header').addClass('lms_mobile_header');
					 $('#lms_header').removeClass('lms_fixed_header');
				 }
				 else {
					 $('#lms_header').removeClass('lms_mobile_header');
				 }
				
			}else{
				 if ($this.scrollTop() > 30) {
					 $('#lms_header').addClass('lms_fixed_header');
				 }
				 else {
					 $('#lms_header').removeClass('lms_fixed_header');
				 }
			}
		});
		
		// mail function
		$('#em_sub').on("click",function(){
			var un=$('#uname').val();
			var em=$('#uemail').val();
			var wsite=$('#web_site').val();
			var meesg=$('#message').val();
			$.ajax({
				type: "POST",
				url: "ajaxmail.php",
				data: {
					'username':un,
					'useremail':em,
					'website':wsite,
					'mesg':meesg
					},
				success: function(msg) {
			var full_msg=msg.split("#");
					if(full_msg[0]=='1')
					{
						$('#uname').val("");
						$('#uemail').val("");
						$('#web_site').val("");
						$('#message').val("");
						$('#err').html( full_msg[1] );
					}
					else
					{
						$('#uname').val(un);
						$('#uemail').val(em);
						$('#web_site').val(wsite);
						$('#message').val(meesg);
						$('#err').html( full_msg[1] );
					}
				}
			});
		});
		
		//chat window slide 
		$('.lms_chat_header h4').on("click",function(){
			$('.lms_chat_body').slideToggle(200);
		});
	
		//Click event to scroll to top
		$('.scrollToTop').on("click",function(){
			$('html, body').animate({scrollTop : 0},800);
			return false;
		});
	
//		//video background full screen
//		$('video').mediaelementplayer({
//		  videoWidth: '100%',
//		  videoHeight: '100%',
//		  enableAutosize: true
//		});
	
		// simple slider
		$('#lms_simple_slider').carousel({
			interval: 3000
		});
	
		// Portfolio mixitup
		if ($.fn.mixitup) {
			$('#grid').mixitup( {
				filterSelector: '.filter-item'
			} );
			$(".filter-item").click(function(e) {
				e.preventDefault();
			});
		}
	
		// one page service popup
		$('.lms_service_link').on("click",function(){
			$('.lms_service_popup').fadeIn();
		});

		$('.lms_service_popup_close').on("click",function(){
			$('.lms_service_popup').slideUp();
		});
	
		// one page
		$("#lms_onepage").single({
			speed: 1000
		});
	
		//pretty Photo
		$("a[data-gal^='prettyPhoto']").prettyPhoto({
			animation_speed: 'fast', 
			slideshow: 5000, 
			autoplay_slideshow: false, 
			opacity: 0.9,
			show_title: true, 
			allow_resize: true,
			theme: 'dark_square',
			horizontal_padding: 20,
			hideflash: false,
			wmode: 'opaque', 
			autoplay: true, 
			modal: false, 
			deeplinking: true, 
			overlay_gallery: true,
			keyboard_shortcuts: true
		});
	
		// video js mediaelementplayer	
//		$('video').mediaelementplayer({
//			success: function(media, node, player) {
//				$('#' + node.id + '-mode').html('mode: ' + media.pluginType);
//			}
//		});
	
		// cources view change
		$('.lms_list_view').on("click",function(){
			$('.lms_cource > div').addClass('lms_cource_list');
			$('.lms_cource > div').removeClass('animated fadeInDown');
			$('.lms_cource > div').addClass('animated fadeInLeft');
			$('.lms_cource > div').removeClass('lms_cource_grid');
		});
		
		$('.lms_grid_view').on("click",function(){
			$('.lms_cource > div').removeClass('animated fadeInLeft');
			$('.lms_cource > div').addClass('animated fadeInDown');
			$('.lms_cource > div').addClass('lms_cource_grid');
			$('.lms_cource > div').removeClass('lms_cource_list');
		});	
		
		$('.lms_grid_list_icon a').on("click",function(){
			$('.lms_grid_list_icon a').removeClass('active');
			$(this).addClass('active');
		});
	
		//sidebar category dropdown
		$('.lms_sidebar_category ul li').on("click",function(){
			$(this).children('ul').slideToggle();
			
			if ($(this).find("ul").length) {
			  $(this).children('a').children('i').toggleClass('fa-angle-right').toggleClass('fa-angle-down');
			} 
		});
	
		// skills animation on apear
		$('.progress').children('.progress-bar').css('display','none');
		$('.progress').each(function() {
			$(this).appear(function(){
				$(this).children('.progress-bar').css('display','block');
			});	
		});
		
		// revolution slider
		var revapi;
		revapi = jQuery('.lms_revslider').revolution({
			autoPlay:"off", 
			startwidth:1024,
			startheight:786,
			hideThumbs:10,
			fullWidth:"on",
			fullScreen:"off",
			touchenabled:"on",
			onHoverStop: "on",
			fullScreenOffsetContainer: "1170",
			navigationType:"none"
		});

		//Our Success in Numbers count
		$('.appear-count').appear(function(){
			$('.count').countTo();
		});
	
	
		// parallax effect
		$(function () {
			$.stellar({
				horizontalScrolling: false,
				verticalOffset: -300
			});
		});

		//View & Learn tabs
		$('.lms_view_learn_tab > ul').each(function () {
			// For each set of tabs, we want to keep track of
			// which tab is active and it's associated content
			var $active, $content, $links = $(this).find('a');
		
			// If the location.hash matches one of the links, use that as the active tab.
			// If no match is found, use the first link as the initial active tab.
			$active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
			$active.addClass('active');
		
			$content = $($active[0].hash);
		
			// Hide the remaining content
			$links.not($active).each(function () {
				$(this.hash).hide();
			});
		
			// Bind the click event handler
			$(this).on('click', 'a', function (e) {
				// Make the old tab inactive.
				$active.removeClass('active');
				$content.hide();
		
				// Update the variables with the new link and content
				$active = $(this);
				$content = $(this.hash);
		
				// Make the tab active.
				$active.addClass('active');
				$content.fadeIn();
		
				// Prevent the anchor's default click action
				e.preventDefault();
			});
		});
	
		// Our Top Experts Team
		$('.lms_experts_team_image').hide();
		$('.lms_experts_team_detail').hide();
		$('#lms_experts_team_image11').show();
		$('#lms_experts_team_detail11').show();
		$('.lms_experts_team_slider_item .lms_image_link').on("click",function(){
			var itm =$(this).attr("id");
			$('#lms_experts_team_image'+itm).show().addClass('animated fadeInDown');
			$('#lms_experts_team_detail'+itm).show().addClass('animated fadeIn');
			
			var cur_id='lms_experts_team_image'+itm;
			$('.lms_experts_team_image').each(function(){
				if($(this).attr("id")!=cur_id)
				{
					$(this).hide();
				}
			});
					
			var cur_id_new='lms_experts_team_detail'+itm;
			$('.lms_experts_team_detail').each(function(){
				if($(this).attr("id")!=cur_id_new)
				{
					$(this).hide();
				}
			});		
		});
				
				
		// Our Popular Courses
		$('.lms_popular_courses_item_detail').hide();
		$('#courses_item_detail1').show();
		$('.lms_popular_courses_item .lms_image_link').on("click",function(){
			var itm =$(this).attr("id");
			$('#courses_item_detail'+itm).show().addClass('animated fadeInDown');
			var cur_id='courses_item_detail'+itm;
				$('.lms_popular_courses_item_detail').each(function(){
					if($(this).attr("id")!=cur_id)
					{
						$(this).hide();
					}
				});
		});
		
		// wow js
		var wow = new WOW(
		  {
			animateClass: 'animated',
			offset:       100
		  }
		);
		wow.init();
	
		// tooltip
		$('[data-toggle="tooltip"]').tooltip();
	
		//accordion single-collapse
		var $active = $('#accordion .panel-collapse.in').prev().addClass('active');
		$active.find('a').prepend('<i class="fa fa-angle-up"></i>');
		$('#accordion .panel-heading').not($active).find('a').prepend('<i class="fa fa-angle-down"></i>');
		$('#accordion').on('show.bs.collapse', function (e) {
			$('#accordion .panel-heading.active').removeClass('active').find('.fa').toggleClass('fa-angle-down').toggleClass('fa-angle-up');
			$(e.target).prev().addClass('active').find('.fa').toggleClass('fa-angle-down').toggleClass('fa-angle-up');
		});
		
	
		//accordion multi-collapse
		var $activemulti = $('#multi_collapse_accordion .panel-collapse.in').prev().addClass('active');
		$activemulti.find('a').prepend('<i class="fa fa-angle-up"></i>');
		$('#multi_collapse_accordion .panel-heading').not($activemulti).find('a').prepend('<i class="fa fa-angle-down"></i>');
		$('#multi_collapse_accordion').on('show.bs.collapse', function (e) {
			$('#multi_collapse_accordion .panel-heading.active').addClass('active').find('.fa').toggleClass('fa-angle-down').toggleClass('fa-angle-up');
			$(e.target).prev().addClass('active').find('.fa').toggleClass('fa-angle-down').toggleClass('fa-angle-up');
		});
		
		//Some open
		$('#multi_collapse_accordion .collapse').collapse({
			toggle: false
		});
	
		// search toggle
		$('.lms_search_toggle').on("click",function(){
			$('.lms_search_wrapper').slideToggle(200);
		});
	
		// menu toggle
		$('.lms_menu_toggle a').on("click",function(){
			$('.lms_menu').slideToggle(200);
		});
	
		// Submenu Check Visible Space
		$("#mainMenu li.dropdown-submenu").on('hover',function() {
			if($this.width() < 767) { return ;  } 
			var subMenu = $(this).find("ul.dropdown-menu");
			if(!subMenu.get(0)) { return ;  } 
			var screenWidth = $this.width(),
				subMenuOffset = subMenu.offset(),
				subMenuWidth = subMenu.width(),
				subMenuParentWidth = subMenu.parents("ul.dropdown-menu").width(),
				subMenuPosRight = subMenu.offset().left + subMenu.width();

			if(subMenuPosRight > screenWidth) {
				subMenu.css("margin-left", "-" + (subMenuParentWidth + subMenuWidth + 10) + "px");
			} else {
				subMenu.css("margin-left", 0);
			}
		});

		// Responsive Menu Events
		var addActiveClass = false;
		$("#mainMenu li.dropdown > a, #mainMenu li.dropdown-submenu > a").on("click", function(e) {
			if($this.width() > 979)  { return ;  } 
			e.preventDefault();
			addActiveClass = $(this).parent().hasClass("resp-active");
			$("#mainMenu").find(".resp-active").removeClass("resp-active");
			if(!addActiveClass) {
				$(this).parents("li").addClass("resp-active");
			}

			return;

		});

		// Mobile Redirect
		$(".mobile-redirect").on("click", function() {
			if($this.width() < 991) {
				self.location = $(this).attr("href");
			}
		});
		
		// login popup
		var loginpopup = $('.lms_login');
			loginpopup.isShowed = false;
		 
		 $(".lms_login_btn").hover(function (event) {
			showloginpopup();
		  }, function (event) {
			hideloginpopup();
		  });    
		
		function showloginpopup() {
			loginpopup.stop(true, true);
			loginpopup.isShowed = true;
			loginpopup.slideDown(200);
		}
		
		function hideloginpopup() {
			var divHovered = '0';
			$('.lms_login').hover(function (event) {
				divHovered = '1';
				showloginpopup();
			}, function (event) {
				loginpopup.stop(true, true);
				loginpopup.delay(100).slideUp('fast', function () {
					loginpopup.isShowed = false;
				});
			});
		
			if (divHovered == '0') {
				loginpopup.stop(true, true);
				loginpopup.delay(100).slideUp('fast', function () {
					loginpopup.isShowed = false;
				});
			}
		}					
	
	
		// register popup
		var registerpopup = $('.lms_register');
			registerpopup.isShowed = false;
		 
		 $(".lms_register_btn").hover(function (event) {
			showregisterpopup();
		  }, function (event) {
			hideregisterpopup();
		  }); 
		
		function showregisterpopup() {
			registerpopup.stop(true, true);
			registerpopup.isShowed = true;
			registerpopup.slideDown(200);
		}
		
		function hideregisterpopup() {
			var divHovered = '0';
			$('.lms_register').hover(function (event) {
				divHovered = '1';
				showregisterpopup();
			}, function (event) {
				registerpopup.stop(true, true);
				registerpopup.delay(100).slideUp('fast', function () {
					registerpopup.isShowed = false;
				});
			});
		
			if (divHovered == '0') {
				registerpopup.stop(true, true);
				registerpopup.delay(100).slideUp('fast', function () {
					registerpopup.isShowed = false;
				});
			}
		}		
		
		//slider height
		var h = $('.lms_revslider').innerHeight;
		$('.lms_slider').css('height', h);    	
		
	
		//Our popular courses slider
		var owl = $("#lms_popular_courses_slider");
		owl.owlCarousel({
		  itemsCustom : [
			[0, 1],
			[450, 1],
			[600, 1],
			[700, 2],
			[1000, 2],
			[1200, 2],
			[1400, 2],
			[1600, 2]
		  ],
		  pagination:false
		});
		// Custom Navigation Events
		$(".lms_popular_courses .next").on("click",function(){
		owl.trigger('owl.next');
		});
		$(".lms_popular_courses .prev").on("click",function(){
		owl.trigger('owl.prev');
		});
	
		//Our top experts team slider
		var owl2 = $("#lms_experts_team_slider");
		owl2.owlCarousel({
		  itemsCustom : [
			[0, 1],
			[450, 1],
			[600, 2],
			[700, 2],
			[1000, 3],
			[1200, 3],
			[1400, 3],
			[1600, 3]
		  ],
		  pagination:false
		});
		// Custom Navigation Events
		$(".lms_experts_team .next").on("click",function(){
		owl2.trigger('owl.next');
		});
		$(".lms_experts_team .prev").on("click",function(){
		owl2.trigger('owl.prev');
		});
		
		//Our testimonials slider
		var owl3 = $("#lms_testimonials_slider");
		owl3.owlCarousel({
		  itemsCustom : [
			[0, 1],
			[450, 1],
			[600, 1],
			[700, 1],
			[1000, 1],
			[1200, 1],
			[1400, 1],
			[1600, 1]
		  ],
		  autoPlay : true,
		  pagination:false
		});
		// Custom Navigation Events
		$(".lms_testimonials .next").on("click",function(){
		owl3.trigger('owl.next');
		});
		$(".lms_testimonials .prev").on("click",function(){
		owl3.trigger('owl.prev');
		});
		
		
		//Our Partners slider
		var owl4 = $("#lms_our_partner_slider");
		owl4.owlCarousel({
		  itemsCustom : [
			[0, 1],
			[450, 1],
			[600, 2],
			[700, 2],
			[1000, 3],
			[1200, 3],
			[1400, 3],
			[1600, 3]
		  ],
		  autoPlay : true,
		  pagination:false
		});
		// Custom Navigation Events
		$(".lms_our_partner .next").on("click",function(){
		owl4.trigger('owl.next');
		});
		$(".lms_our_partner .prev").on("click",function(){
		owl4.trigger('owl.prev');
		});

		//related course slider
		var owl5 = $("#lms_related_course_slider");
		owl5.owlCarousel({
		  itemsCustom : [
			[0, 1],
			[450, 1],
			[600, 2],
			[700, 3],
			[1000, 4],
			[1200, 4],
			[1400, 4],
			[1600, 4]
		  ],
		  autoPlay : false
		});
		// Custom Navigation Events
		$(".lms_related_course .next").on("click",function(){
		owl5.trigger('owl.next');
		});
		$(".lms_related_course .prev").on("click",function(){
		owl5.trigger('owl.prev');
		});

		/*==============================
            PROGRESS BAR
        ==============================*/
        $('.current-progress').appear(function () {
            $('.current-progress .progress-run').addClass('progress-run-add');
            var percent = $('.current-progress .count').text();
            $('.progress-run-add').width(percent);
        });


        /*==============================
            PERCENT LEARN
        ==============================*/
        $('.percent-learn').appear(function () {
            $(this)
                .siblings('.percent-learn-bar')
                    .find('.percent-learn-run')
                        .addClass('percent-learn-run-add');
            var percentLearn = $(this).text();
            var context = $(this).siblings('.percent-learn-bar').find('.percent-learn-run-add');
            context.width(percentLearn);
        });

        /*==============================
            TABS STYLE LINE
        ==============================*/
        if ($('.nav-tabs').length) {
            $.each($('.nav-tabs'), function() {
                var tabsItem = $(this).find('a'),
                    tabs = $(this),
                    leftActive = tabs.find('.active').children('a').position().left,
                    widthActive = tabs.find('.active').children('a').width();
                tabs.append('<li class="tabs-hr"></li>');
                $('.tabs-hr').css({
                    left: leftActive,
                    width: widthActive
                });
                tabsItem.on('click', function() {
                    var left = $(this).position().left,
                        width = $(this).width();
                    $('.tabs-hr').animate({
                        left: left,
                        width: width
                    }, 500, 'easeInOutExpo');
                });
            });
        }

        

		//course gallery slider
		$("#lms_course_gallery_slider").owlCarousel({
		  navigation : false, 
		  slideSpeed : 300,
		  paginationSpeed : 400,
		  singleItem:true,
		  transitionStyle : "backSlide",
		  pagination:true,
		  autoPlay: true
		});
	 
		//career slider
		$("#lms_career_slider").owlCarousel({
		  navigation : false, // Show next and prev buttons
		  slideSpeed : 300,
		  paginationSpeed : 400,
		  singleItem:true,
		  transitionStyle : "backSlide",
		  pagination:true,
		  autoPlay: true
		});
		

	
	});
})(); 

