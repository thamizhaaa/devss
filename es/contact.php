

<?php
/* .---------------------------------------------------------------------------.

|  Software: Areevu - Homepage                                   |

|  Version: 1.0                                                   |

|  Contact: via http://www.vinformax.com/                         |

| ------------------------------------------------------------------------- |

|  Admin: S.R.Rama Krishna (Project Admininistrator)              |

|  Copyright (c) 20014-2017, Vinformax. All rights reserved.     |

| ------------------------------------------------------------------------- |

*/
include ("config.php")

?><?php

     $validate = new Validation();
     if (isset($_POST['submit']) && ($_POST['submit'] == 'submit')) {
        
if (isset($_POST['submit']) && $_POST['submit'] != '')
	{
	//$_SESSION['form'] = $_POST;
    $validate->addRule($_POST['name'], '', 'Name', true);
    $validate->addRule($_POST['phone'], '', 'Phone', true);
    $validate->addRule($_POST['email'], '', 'Email', true);
    $validate->addRule($_POST['company_name'], '', 'Company Name', true);
    $validate->addRule($_POST['message'], '', 'Message', true);
     if ($validate->validate()) {
  
         $subject1 = "Vintrax.com Reply Contact Newsletter: " . $_POST['company_name'] . "\r\n";
	$es1 = 'User Enquiry mail' . "\r\n";
	//$es1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $body1 = "<p> Hi , </p>";
        $body1.= "<p> Name:" . trim($_POST['name']);
        $body1.= "<p> Phone:" . trim($_POST['phone']);
        $body1.= "<p> Email:" . trim($_POST['email']);
	$body1.= "<p> Company Name:" . trim($_POST['company_name']);
        $body1.= "<p> Message:" . trim($_POST['message']);
	$body1.= "<p><p>";
	$body1.= "Thanks & Regard:" 
                . $_POST['name'] . "\r\n";
	$body1.= "<p><p>";
	$to1 = 'eswarphp90@gmail.com ' . '' . "\r\n";
       // print_r($to1);exit;
	$check1 = mail_template_or($to1, $body1 ,$es1 );
	unset($_POST);
        $_SESSION['success'] = "Thanks!
The reply has been send.";
       // unset($_POST['name']);
        //unset($_POST['email']);

        if (!is_null($flgIn)) {
            $_SESSION['success'] = 'Thanks!
The reply has been send.';
            unset($_SESSION['form']);

                }
                
  
     }else {
        $stat["error"] = $validate->errors();
    }
     }

                //unset($_POST);
                $_SESSION['success'] = "Email sent successfully.";

                if (!is_null($flgIn)) {
                    $_SESSION['success'] = 'Email sent successfully';
                   unset($_SESSION['form']);

                }
     
    }
        
     

if (isset($_SESSION['form']))
	{
	$aryForm = $_SESSION['form'];
	unset($_SESSION['form']);
	} ?>
<!DOCTYPE html>
<html lang="en-US">
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script type="text/javascript">document.documentElement.className = document.documentElement.className + ' yes-js js_active js'</script>
        <title> VinTrax</title>
        <style>
            .wishlist_table .add_to_cart, a.add_to_wishlist.button.alt { border-radius: 16px; -moz-border-radius: 16px; -webkit-border-radius: 16px; }			</style>
        <script type="text/javascript">
                    var yith_wcwl_plugin_ajax_web_url = 'wp-admin/admin-ajax.html';
        </script>
        <link href='wp-content/themes/designthemes/images/favicon.ico' rel='shortcut icon' type='image/x-icon' />
        <link href='wp-content/themes/designthemes/images/apple-touch-icon.png' rel='apple-touch-icon'/>
        <link href='wp-content/themes/designthemes/images/apple-touch-icon-114x114.png' sizes='114x114' rel='apple-touch-icon'/>
        <link href='wp-content/themes/designthemes/images/apple-touch-icon-72x72.png' sizes='72x72' rel='apple-touch-icon'/>
        <link href='wp-content/themes/designthemes/images/apple-touch-icon-144x144.png' sizes='144x144' rel='apple-touch-icon'/>
        <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
        <link rel='dns-prefetch' href='http://s.w.org/' />
        <link rel="alternate" type="application/rss+xml" title="Logistics &raquo; Feed" href="feed/index.html" />
        <link rel="alternate" type="application/rss+xml" title="Logistics &raquo; Comments Feed" href="comments/feed/index.html" />
        <link rel="alternate" type="text/calendar" title="Logistics &raquo; iCal Feed" href="events/indexedf3.html?ical=1" />
        
        
       
        
        
        <script type="text/javascript">
            window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.2.1\/72x72\/", "ext":".png", "svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.2.1\/svg\/", "svgExt":".svg", "source":{"concatemoji":"http:\/\/wedesignthemes.com\/themes\/logistics\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.7.4"}};
            !function(a, b, c){function d(a){var b, c, d, e, f = String.fromCharCode; if (!k || !k.fillText)return!1; switch (k.clearRect(0, 0, j.width, j.height), k.textBaseline = "top", k.font = "600 32px Arial", a){case"flag":return k.fillText(f(55356, 56826, 55356, 56819), 0, 0), !(j.toDataURL().length < 3e3) && (k.clearRect(0, 0, j.width, j.height), k.fillText(f(55356, 57331, 65039, 8205, 55356, 57096), 0, 0), b = j.toDataURL(), k.clearRect(0, 0, j.width, j.height), k.fillText(f(55356, 57331, 55356, 57096), 0, 0), c = j.toDataURL(), b !== c); case"emoji4":return k.fillText(f(55357, 56425, 55356, 57341, 8205, 55357, 56507), 0, 0), d = j.toDataURL(), k.clearRect(0, 0, j.width, j.height), k.fillText(f(55357, 56425, 55356, 57341, 55357, 56507), 0, 0), e = j.toDataURL(), d !== e}return!1}function e(a){var c = b.createElement("script"); c.src = a, c.defer = c.type = "text/javascript", b.getElementsByTagName("head")[0].appendChild(c)}var f, g, h, i, j = b.createElement("canvas"), k = j.getContext && j.getContext("2d"); for (i = Array("flag", "emoji4"), c.supports = {everything:!0, everythingExceptFlag:!0}, h = 0; h < i.length; h++)c.supports[i[h]] = d(i[h]), c.supports.everything = c.supports.everything && c.supports[i[h]], "flag" !== i[h] && (c.supports.everythingExceptFlag = c.supports.everythingExceptFlag && c.supports[i[h]]); c.supports.everythingExceptFlag = c.supports.everythingExceptFlag && !c.supports.flag, c.DOMReady = !1, c.readyCallback = function(){c.DOMReady = !0}, c.supports.everything || (g = function(){c.readyCallback()}, b.addEventListener?(b.addEventListener("DOMContentLoaded", g, !1), a.addEventListener("load", g, !1)):(a.attachEvent("onload", g), b.attachEvent("onreadystatechange", function(){"complete" === b.readyState && c.readyCallback()})), f = c.source || {}, f.concatemoji?e(f.concatemoji):f.wpemoji && f.twemoji && (e(f.twemoji), e(f.wpemoji)))}(window, document, window._wpemojiSettings);
        </script>
        <style type="text/css">
            img.wp-smiley,
            img.emoji {
                display: inline !important;
                border: none !important;
                box-shadow: none !important;
                height: 1em !important;
                width: 1em !important;
                margin: 0 .07em !important;
                vertical-align: -0.1em !important;
                background: none !important;
                padding: 0 !important;
            }
        </style>
        <link rel='stylesheet' id='layerslider-css'  href='wp-content/plugins/LayerSlider/static/layerslider/css/layerslider42c6.css?ver=6.1.0' type='text/css' media='all' />
        <link rel='stylesheet' id='ls-google-fonts-css'  href='http://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900%7COpen+Sans:300%7CIndie+Flower:regular%7COswald:300,regular,700&amp;subset=latin%2Clatin-ext' type='text/css' media='all' />
        <link rel='stylesheet' id='contact-form-7-css'  href='wp-content/plugins/contact-form-7/includes/css/styles1c9b.css?ver=4.6.1' type='text/css' media='all' />
        <link rel='stylesheet' id='dt-animation-css-css'  href='wp-content/plugins/designthemes-core-features/shortcodes/css/animations125b.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='dt-sc-css-css'  href='wp-content/plugins/designthemes-core-features/shortcodes/css/shortcodes125b.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='resmap_css-css'  href='wp-content/plugins/responsive-maps-plugin/includes/css/resmap.minf9b8.css?ver=4.0' type='text/css' media='all' />
        <link rel='stylesheet' id='rs-plugin-settings-css'  href='wp-content/plugins/revslider/public/assets/css/settings4ee1.css?ver=5.3.1.5' type='text/css' media='all' />
        <style id='rs-plugin-settings-inline-css' type='text/css'>
            #rs-demo-id {}
        </style>
        <link rel='stylesheet' id='wpsl-styles-css'  href='wp-content/plugins/wp-store-locator/css/styles.min3cae.css?ver=2.2.7' type='text/css' media='all' />
        <link rel='stylesheet' id='wpcargo-styles-css'  href='wp-content/plugins/wpcargo/assets/css/wpcargo-style125b.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='wpcargo-styles-themefy-css'  href='wp-content/plugins/wpcargo/assets/css/themify-icons125b.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='wpcargo-styles-flaticon-css'  href='wp-content/plugins/wpcargo/assets/css/font-awesome125b.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='wpcargo-styles-flaticon-min-css'  href='wp-content/plugins/wpcargo/assets/css/font-awesome.min125b.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='woocommerce_prettyPhoto_css-css'  href='wp-content/plugins/woocommerce/assets/css/prettyPhoto005e.css?ver=3.1.6' type='text/css' media='all' />
        <link rel='stylesheet' id='jquery-selectBox-css'  href='wp-content/plugins/yith-woocommerce-wishlist/assets/css/jquery.selectBox7359.css?ver=1.2.0' type='text/css' media='all' />
        <link rel='stylesheet' id='yith-wcwl-main-css'  href='wp-content/plugins/yith-woocommerce-wishlist/assets/css/style9c6b.css?ver=2.0.16' type='text/css' media='all' />
        <link rel='stylesheet' id='yith-wcwl-font-awesome-css'  href='wp-content/plugins/yith-woocommerce-wishlist/assets/css/font-awesome.minb2f9.css?ver=4.3.0' type='text/css' media='all' />
        <link rel='stylesheet' id='js_composer_front-css'  href='wp-content/plugins/js_composer/assets/css/js_composer.min972f.css?ver=5.0.1' type='text/css' media='all' />
        <link rel='stylesheet' id='bsf-Defaults-css'  href='wp-content/uploads/smile_fonts/Defaults/Defaults125b.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='reset-css'  href='wp-content/themes/designthemes/css/reset4963.html?ver=1.1' type='text/css' media='all' />
        <link rel='stylesheet' id='veda-css'  href='wp-content/themes/designthemes/style4963.css?ver=1.1' type='text/css' media='all' />
        <link rel='stylesheet' id='prettyphoto-css'  href='wp-content/plugins/js_composer/assets/lib/prettyphoto/css/prettyPhoto.min972f.css?ver=5.0.1' type='text/css' media='all' />
        <link rel='stylesheet' id='custom-font-awesome-css'  href='wp-content/themes/designthemes/css/font-awesome.minb2f9.css?ver=4.3.0' type='text/css' media='all' />
        <link rel='stylesheet' id='pe-icon-7-stroke-css'  href='wp-content/themes/designthemes/css/pe-icon-7-stroke125b.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='stroke-gap-icons-style-css'  href='wp-content/themes/designthemes/css/stroke-gap-icons-style125b.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='icon-moon-css'  href='wp-content/themes/designthemes/css/icon-moon125b.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='material-design-iconic-css'  href='wp-content/themes/designthemes/css/material-design-iconic-font.min125b.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='veda.woo-css'  href='wp-content/themes/designthemes/css/woocommerce4963.css?ver=1.1' type='text/css' media='all' />
        <link rel='stylesheet' id='skin-css'  href='wp-content/themes/designthemes/css/skins/blue/style125b.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='veda.customevent-css'  href='wp-content/themes/designthemes/tribe-events/custom4963.css?ver=1.1' type='text/css' media='all' />
        <link rel='stylesheet' id='veda.responsive-css'  href='wp-content/themes/designthemes/css/responsive4963.css?ver=1.1' type='text/css' media='all' />
        <link rel='stylesheet' id='veda-fonts-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C400italic%2C500%2C600%2C700%2C800&amp;subset&amp;ver=1.1' type='text/css' media='all' />
        <link rel='stylesheet' id='veda.custom-css'  href='wp-content/themes/designthemes/css/custom4963.css?ver=1.1' type='text/css' media='all' />
        <style id='veda-combined-inline-css' type='text/css'>
            body, .layout-boxed .inner-wrapper { background-color:#fffff;}.extend-bg-fullwidth-left:after, .extend-bg-fullwidth-right:after{ background:;}.top-bar a, .dt-sc-dark-bg.top-bar a { color:; }.top-bar { color:#000000; background-color:#f7f7f7}.top-bar a:hover, .dt-sc-dark-bg.top-bar a:hover { color:#1874c1; }#main-menu ul.menu > li > a { color:#000; }.menu-active-highlight #main-menu > ul.menu > li.current_page_item > a, .menu-active-highlight #main-menu > ul.menu > li.current_page_ancestor > a, .menu-active-highlight #main-menu > ul.menu > li.current-menu-item > a, .menu-active-highlight #main-menu > ul.menu > li.current-menu-ancestor > a { color:#ffffff; }.footer-widgets.dt-sc-dark-bg { background-color: rgba(42,42,42, 1); }.footer-widgets.dt-sc-dark-bg{ color:#99abb8; }.footer-copyright.dt-sc-dark-bg, .footer-copyright.dt-sc-dark-bg a{ color:#fff; }.footer-widgets.dt-sc-dark-bg a, #footer .footer-widgets.dt-sc-dark-bg a{ color:#99abb8; }#footer .dt-sc-dark-bg h3, #footer .dt-sc-dark-bg h3 a { color:#ffffff; }.footer-copyright.dt-sc-dark-bg {background: rgba(0,0,0, 1);}#main-menu .megamenu-child-container > ul.sub-menu > li > a, #main-menu .megamenu-child-container > ul.sub-menu > li > .nolink-menu { color:; }#main-menu .megamenu-child-container > ul.sub-menu > li > a:hover { color:; }#main-menu .megamenu-child-container > ul.sub-menu > li.current_page_item > a, #main-menu .megamenu-child-container > ul.sub-menu > li.current_page_ancestor > a, #main-menu .megamenu-child-container > ul.sub-menu > li.current-menu-item > a, #main-menu .megamenu-child-container > ul.sub-menu > li.current-menu-ancestor > a { color:; }#main-menu .megamenu-child-container ul.sub-menu > li > ul > li > a, #main-menu ul li.menu-item-simple-parent ul > li > a { color:; }h1, .dt-sc-counter.type1 .dt-sc-counter-number, .dt-sc-portfolio-sorting a, .dt-sc-testimonial .dt-sc-testimonial-author cite, .dt-sc-pr-tb-col.minimal .dt-sc-price p, .dt-sc-pr-tb-col.minimal .dt-sc-price h6 span, .dt-sc-testimonial.special-testimonial-carousel blockquote, .dt-sc-pr-tb-col .dt-sc-tb-title, .dt-sc-pr-tb-col .dt-sc-tb-content, .dt-sc-pr-tb-col .dt-sc-tb-content li, .dt-sc-bar-text, .dt-sc-counter.type3 .dt-sc-counter-number, .dt-sc-newsletter-section.type2 .dt-sc-subscribe-frm input[type="submit"], .dt-sc-timeline .dt-sc-timeline-content h2 span, .dt-sc-model-sorting a, .dt-sc-icon-box.type9 .icon-content h4, .dt-sc-icon-box.type9 .icon-content h4 span, .dt-sc-menu-sorting a, .dt-sc-menu .image-overlay .price, .dt-sc-menu .menu-categories a, .dt-sc-pr-tb-col .dt-sc-price h6, ul.products li .onsale { font-family:Open Sans, sans-serif; }h2 { font-family:Open Sans, sans-serif; }h3, .dt-sc-testimonial.type1 blockquote, .blog-entry.entry-date-left .entry-date, .dt-sc-ribbon-title, .dt-sc-testimonial.type1 .dt-sc-testimonial-author cite { font-family:Open Sans, sans-serif; }h4, .blog-entry .entry-meta, .dt-sc-button { font-family:Open Sans, sans-serif; }h5 { font-family:Open Sans, sans-serif; }h6 { font-family:Open Sans, sans-serif; }h1 { font-size:36px; font-weight:normal; letter-spacing:0.5px; }h2 { font-size:30px; font-weight:normal; letter-spacing:0.5px; }h3 { font-size:18px; font-weight:normal; letter-spacing:0.5px; }h4 { font-size:16px; font-weight:normal; letter-spacing:0.5px; }h5 { font-size:14px; font-weight:normal; letter-spacing:0.5px; }h6 { font-size:13px; font-weight:normal; letter-spacing:0.5px; }body { font-size:14px; line-height:24px; }body, .blog-entry.blog-medium-style .entry-meta, .dt-sc-event-image-caption .dt-sc-image-content h3, .dt-sc-events-list .dt-sc-event-title h5, .dt-sc-team.type2 .dt-sc-team-details h4, .dt-sc-team.type2 .dt-sc-team-details h5, .dt-sc-contact-info.type5 h6, .dt-sc-sponsors .dt-sc-one-third h3, .dt-sc-testimonial.type5 .dt-sc-testimonial-author cite, .dt-sc-counter.type3 h4, .dt-sc-contact-info.type2 h6, .woocommerce ul.products li.product .onsale, #footer .mailchimp-form input[type="email"], .dt-sc-icon-box.type5 .icon-content h5, .main-header #searchform input[type="text"], .dt-sc-testimonial.type1 .dt-sc-testimonial-author cite small, .dt-sc-pr-tb-col.type2 .dt-sc-tb-content li, .dt-sc-team.rounded .dt-sc-team-details h5, .megamenu-child-container > ul.sub-menu > li > a .menu-item-description, .menu-item-description { font-family:Open Sans, sans-serif; }#main-menu ul.menu > li > a, .left-header #main-menu > ul.menu > li > a { font-size:16px; font-weight:normal; letter-spacing:0.5px; }#main-menu ul.menu > li > a, .dt-sc-pr-tb-col .dt-sc-tb-title h5, .dt-sc-timeline .dt-sc-timeline-content h2, .dt-sc-icon-box.type3 .icon-content h4, .dt-sc-popular-procedures .details h3, .dt-sc-popular-procedures .details .duration, .dt-sc-popular-procedures .details .price, .dt-sc-counter.type2 .dt-sc-counter-number, .dt-sc-counter.type2 h4, .dt-sc-testimonial.type4 .dt-sc-testimonial-author cite { font-family:Open Sans, sans-serif; }
        </style>
        <script type='text/javascript' src='wp-content/plugins/LayerSlider/static/layerslider/js/greensockb3a6.js?ver=1.19.0'></script>
        <script type='text/javascript' src='wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
        <script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
        <script type='text/javascript'>
                            /* <![CDATA[ */
                            var LS_Meta = {"v":"6.1.0"};
                            /* ]]> */
        </script>
        <script type='text/javascript' src='wp-content/plugins/LayerSlider/static/layerslider/js/layerslider.kreaturamedia.jquery42c6.js?ver=6.1.0'></script>
        <script type='text/javascript' src='wp-content/plugins/LayerSlider/static/layerslider/js/layerslider.transitions42c6.js?ver=6.1.0'></script>
        <script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min4ee1.js?ver=5.3.1.5'></script>
        <script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min4ee1.js?ver=5.3.1.5'></script>
        <script type='text/javascript'>
                            /* <![CDATA[ */
                            var wc_add_to_cart_params = {"ajax_url":"\/themes\/logistics\/wp-admin\/admin-ajax.php", "wc_ajax_url":"\/themes\/logistics\/contact\/?wc-ajax=%%endpoint%%", "i18n_view_cart":"View Cart", "cart_url":"http:\/\/wedesignthemes.com\/themes\/logistics\/cart\/", "is_cart":"", "cart_redirect_after_add":"no"};
                            /* ]]> */
        </script>
        <script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min32bb.js?ver=2.6.14'></script>
        <script type='text/javascript' src='wp-content/plugins/js_composer/assets/js/vendors/woocommerce-add-to-cart972f.js?ver=5.0.1'></script>
        <script type='text/javascript' src='wp-content/themes/designthemes/framework/js/modernizr.custom125b.js?ver=4.7.4'></script>
        <meta name="generator" content="Powered by LayerSlider 6.1.0 - Multi-Purpose, Responsive, Parallax, Mobile-Friendly Slider Plugin for WordPress." />
        <!-- LayerSlider updates and docs at: https://layerslider.kreaturamedia.com -->
        <link rel='https://api.w.org/' href='wp-json/index.html' />
        <link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.php?rsd" />
        <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wp-includes/wlwmanifest.xml" /> 
        <meta name="generator" content="WordPress 4.7.4" />
        <meta name="generator" content="WooCommerce 2.6.14" />
        <link rel="canonical" href="index.html" />
        <link rel='shortlink' href='indexfa65.html?p=10147' />
        <link rel="alternate" type="application/json+oembed" href="wp-json/oembed/1.0/embeded84.json?url=http%3A%2F%2Fwedesignthemes.com%2Fthemes%2Flogistics%2Fcontact%2F" />
        <link rel="alternate" type="text/xml+oembed" href="wp-json/oembed/1.0/embed214f?url=http%3A%2F%2Fwedesignthemes.com%2Fthemes%2Flogistics%2Fcontact%2F&amp;format=xml" />
        <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
        <meta name="generator" content="Powered by Visual Composer - drag and drop page builder for WordPress."/>
        <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="http://wedesignthemes.com/themes/logistics/wp-content/plugins/js_composer/assets/css/vc_lte_ie9.min.css" media="screen"><![endif]--><meta name="generator" content="Powered by Slider Revolution 5.3.1.5 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
        <style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1491887462092{margin-top: -65px !important;padding-top: 80px !important;padding-bottom: 80px !important;background-image: url(wp-content/uploads/2017/03/contact-bg-22a84.jpg?id=10719) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}
            .vc_custom_1458197080352{margin-top: -65px !important;margin-bottom: -70px !important;}.vc_custom_1456319658712{padding: 0px !important;}.vc_custom_1450706456467{margin-bottom: 0px !important;padding-top: 0px !important;padding-right: 15px !important;padding-bottom: 0px !important;padding-left: 15px !important;}.vc_custom_1450706603389{margin-bottom: 0px !important;}.vc_custom_1490434983966{margin-bottom: 20px !important;}.vc_custom_1455530592380{padding-right: 0px !important;padding-left: 0px !important;}.vc_custom_1455530598756{padding-right: 0px !important;padding-left: 0px !important;}.vc_custom_1490435138839{margin-bottom: 10px !important;}.vc_custom_1490435152009{margin-bottom: 10px !important;}.vc_custom_1490435165124{margin-bottom: 10px !important;padding-right: 0px !important;padding-left: 0px !important;}.vc_custom_1455530605294{padding-right: 0px !important;padding-left: 0px !important;}.vc_custom_1455530612254{padding-right: 0px !important;padding-left: 0px !important;}.vc_custom_1490435202690{margin-bottom: 10px !important;}.vc_custom_1490435220918{margin-bottom: 10px !important;}.vc_custom_1490435235275{margin-bottom: 10px !important;padding-right: 0px !important;padding-left: 0px !important;}.vc_custom_1455530620389{padding-right: 0px !important;padding-left: 0px !important;}.vc_custom_1455530627463{padding-right: 0px !important;padding-left: 0px !important;}.vc_custom_1490435289919{margin-bottom: 10px !important;}.vc_custom_1490435296467{margin-bottom: 10px !important;}.vc_custom_1490435310859{margin-bottom: 10px !important;}.vc_custom_1490008526700{margin-bottom: 0px !important;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript></head>

    <body class="page-template-default page page-id-10147 tribe-no-js layout-wide fullwidth-header header-align-left fullwidth-menu-header standard-header header-with-topbar woo-type4 wpb-js-composer js-comp-ver-5.0.1 vc_responsive">
<!--  <script type="text/javascript" src="Floating-j-Menu/floating-j-menu/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="Floating-j-Menu/floating-j-menu/jquery.easing.1.3.js"></script>
        <link rel="stylesheet" href="Floating-j-Menu/floating-j-menu/floating-j-menu.css" type="text/css">
<script type="text/javascript" src="Floating-j-Menu/floating-j-menu/floating-j-menu.js"></script>-->

        <!-- **Wrapper** -->
        <div class="wrapper">
            <div class="inner-wrapper">

                <!-- **Header Wrapper** -->
                <div id="header-wrapper" class="">
                    <!-- **Header** -->
                    <?php
include 'inc-header.php';
 ?>
                    <!-- **Header - End** -->
                </div><!-- **Header Wrapper - End** -->


                <!-- **Main** -->
                <div id="main"><section class="main-title-section-wrapper default" style="">	<div class="container">		<div class="main-title-section"><h1>Contact</h1>		</div><div class="breadcrumb"></div>	</div></section>            <!-- ** Container ** -->
                    <div class="container">    <section id="primary" class="content-full-width">	<!-- #post-10147 -->
                            <div id="post-10147" class="post-10147 page type-page status-publish hentry">
                                <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid dt-sc-dark-bg vc_custom_1491887462092 vc_row-has-fill">
                                    
                                    
                                    
 
                                    
                                    
                                    
                                    
                                    <div class="wpb_column vc_column_container vc_col-sm-8"><div class="vc_column-inner vc_custom_1456319658712"><div class="wpb_wrapper">
                                                
                                                <div class="wpb_text_column wpb_content_element  vc_custom_1450706456467" >
                                                                                       
                                    <?php
if (isset($stat) && $stat != "") {
    echo msg($stat);
   
}
 
?>
                                                    <div class="wpb_wrapper">
                                                        <h6><strong id="msg">SEND US A MESSAGE</strong></h6>
                                                        <div class='dt-sc-clear '> </div>

                                                    </div>
                                                </div>
                                 
                                                
                                             
                                                    

                                                     
                                                
                                                
                                                
                                                
                                                
                                                
                                                <div role="form" class="wpcf7" id="wpcf7-f7868-p10147-o1" lang="en-US" dir="ltr">
                                                    <div class="screen-reader-response"></div>
                                                   
                                                        <div style="display: none;">
                                                            <input type="hidden" name="_wpcf7" value="7868" />
                                                            <input type="hidden" name="_wpcf7_version" value="4.6.1" />
                                                            <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f7868-p10147-o1" />
                                                            <input type="hidden" name="_wpnonce" value="2f08ee4917" />
                                                        </div>
                                                        <div class="wpb_column vc_column_container vc_col-sm-6">
                                                            <div class="vc_column-inner ">
                                                                <div class="wpb_wrapper">
                                                                    <div class="form-field">
                                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                                           
          <input type="text" id="name" name="name" value="<?php if (isset($_POST['name']) && $_POST['name'] != ''){
	echo $_POST['name']; }?>" size="40" placeholder="Name"/><br>
          <input type="text"  name="phone" value="<?php if (isset($_POST['phone']) && $_POST['phone'] != ''){
              echo $_POST['phone']; } ?>" size="40" placeholder="phone" /><br>
          <input type="email"  name="email" value="<?php if (isset($_POST['email']) && $_POST['email'] != ''){
              echo $_POST['email']; }?>" size="40" placeholder="email" /><br>
           <input type="text"  name="company_name" value="<?php if (isset($_POST['company_name']) && $_POST['company_name'] != ''){
              echo $_POST['company_name']; }?>" size="40" placeholder="Company Name" /><br>
           <textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Message"></textarea>
         
        
          
                                                                        <input type="submit" id="submit"  name="submit" value="submit" size="40"/>   </form>
                                                </div>
          
                                                                    
                                                                   
          
                                                                </div></div></div>
                                                       
                                                        <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                  
                                                                
                                        </div><div class='dt-sc-clear '> </div></div></div>
                                                            
                                        
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                                        <div class="wpb_column vc_column_container vc_col-sm-4"><div class="vc_column-inner "><div class="wpb_wrapper"><div class='dt-sc-hr-invisible-small '> </div><div class='dt-sc-clear '> </div>
                                                <div class="wpb_text_column wpb_content_element  vc_custom_1450706603389" >
                                                    <div class="wpb_wrapper">
                                                        <h6><strong> INTERNATIONAL ENQUIRY HOTLINE </strong></h6>
                                                        <h2 style="font-size: 40px; color: #fcdb34;"><strong> (+91) 1234 567 890 </strong></h2>
                                                        <p style="color: rgba(255, 255, 255, 0.3);"><strong> Timing: 09:30 am to 06:30 pm <br /> Saturday – Subday: Holiday </strong></p>
                                                        

                                                    </div>
                                                </div>
                                            </div></div></div></div>
                                
                                
                                
                                <div class="vc_row-full-width vc_clearfix"></div>
                                            <div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12">
                                                    <div class="vc_column-inner "><div class="wpb_wrapper"><div class='dt-sc-hr-invisible-medium '> </div></div></div>
                                                                
                                                </div></div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner ">
                                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element  vc_custom_1490434983966" >
                                                    <div class="wpb_wrapper">
                                                        <h2>Branches</h2>

                                                    </div>
                                                </div>
                                            </div></div></div></div><div class="vc_row wpb_row vc_row-fluid">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner "><div class="wpb_wrapper">
                                                <div class='dt-sc-hr-invisible-xsmall '> </div>
                                                <div class='dt-sc-tabs-horizontal-frame-container dt-sc-faq'>

                                                    <ul class='dt-sc-tabs-horizontal-frame'><li>
                                                            <a href="javascript:void(0);">India</a></li>
                                                        <li><a href="javascript:void(0);">America</a></li>
                                                        <li><a href="javascript:void(0);">London</a></li>
                                                        <li><a href="javascript:void(0);">Sweden</a></li>
                                                    </ul><div class='dt-sc-tabs-horizontal-frame-content'>
                                                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                                <div class="vc_column-inner vc_custom_1455530592380">
                                                                    <div class="wpb_wrapper">
                                                                        <div class="wpb_text_column wpb_content_element  vc_custom_1490435138839" >
                                                                            <?php
$branches = $db->getRows("Select * from branches where branch_country='India'");

foreach($branches as $branches_list)
	{
?>
                                                                                <div class="wpb_wrapper">
                                                                                    <h3><?php
	echo $branches_list['branch_name']; ?></h3>
                                                                                    <p><?php
	echo $branches_list['branch_address']; ?> <br /></p>

                                                                                </div>
                                                                            </div>
                                                                        </div></div>
                                                                </div>

                                                            </div>
                                                        <?php
	} ?>


                                                    </div>
                                                    <div class='dt-sc-tabs-horizontal-frame-content'>
                                                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                                <div class="vc_column-inner vc_custom_1455530592380">
                                                                    <div class="wpb_wrapper">
                                                                        <div class="wpb_text_column wpb_content_element  vc_custom_1490435138839" >
                                                                            <?php
$branches = $db->getRows("Select * from branches where branch_country='America'");

foreach($branches as $branches_list)
	{
?>
                                                                                <div class="wpb_wrapper">
                                                                                    <h3><?php
	echo $branches_list['branch_name']; ?></h3>
                                                                                    <p><?php
	echo $branches_list['branch_address']; ?> <br /></p>

                                                                                </div>
                                                                            </div>
                                                                        </div></div>
                                                                </div>

                                                            </div>
                                                        <?php
	} ?>


                                                    </div><div class='dt-sc-tabs-horizontal-frame-content'>
                                                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                                <div class="vc_column-inner vc_custom_1455530592380">
                                                                    <div class="wpb_wrapper">
                                                                        <div class="wpb_text_column wpb_content_element  vc_custom_1490435138839" >
                                                                            <?php
$branches = $db->getRows("Select * from branches where branch_country='London'");

foreach($branches as $branches_list)
	{
?>
                                                                                <div class="wpb_wrapper">
                                                                                    <h3><?php
	echo $branches_list['branch_name']; ?></h3>
                                                                                    <p><?php
	echo $branches_list['branch_address']; ?> <br /></p>

                                                                                </div>
                                                                            </div>
                                                                        </div></div>
                                                                </div>

                                                            </div>
                                                        <?php
	} ?>


                                                    </div>
                                                    <div class='dt-sc-tabs-horizontal-frame-content'>
                                                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                                <div class="vc_column-inner vc_custom_1455530592380">
                                                                    <div class="wpb_wrapper">
                                                                        <div class="wpb_text_column wpb_content_element  vc_custom_1490435138839" >
                                                                            <?php
$branches = $db->getRows("Select * from branches where branch_country='Sweden'");

foreach($branches as $branches_list)
	{
?>
                                                                                <div class="wpb_wrapper">
                                                                                    <h3><?php
	echo $branches_list['branch_name']; ?></h3>
                                                                                    <p><?php
	echo $branches_list['branch_address']; ?> <br /></p>

                                                                                </div>
                                                                            </div>
                                                                        </div></div>
                                                                </div>

                                                            </div>
                                                        <?php
	} ?>


                                                    </div>

                                                    </div></div></div></div>
                                                    <div class="vc_row wpb_row vc_row-fluid">
                                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                                            <div class="vc_column-inner "><div class="wpb_wrapper">
                                                                    <div class='dt-sc-hr-invisible-medium '> </div></div></div></div></div>
 <div  style='display: inline-block;' data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1458197080352 vc_row-no-padding">
     <div class="rs_col_no_btm_space wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element  vc_custom_1490008526700" >
                                                        <div class="wpb_wrapper">

                                                            <div id="responsive_map_1446625592" class="responsive-map" >
                                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.6959727697417!2d80.21950431540081!3d13.055013990801204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526654fffdbe95%3A0xb18827d2e1bce6b4!2sVinformax+Technology+Systems+India+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1494307579902" width="100%" height="450" frameborder="0" style="border:0;padding-bottom: 0px;margin-right:10px;" allowfullscreen></iframe>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class='dt-sc-clear '> </div><div class='dt-sc-clear '> </div></div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper"><div class='dt-sc-clear '> </div></div></div></div></div><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper"><div class='dt-sc-clear '> </div></div></div></div></div>
                                    <d</div>
                            </div><!-- #post-10147 -->
                        </section><!-- **Primary - End** -->        </div><!-- **Container - End** -->

                </div><!-- **Main - End** -->            <!-- **Footer** -->
                <?php
include 'inc-footer.php';
 ?><!-- **Footer - End** -->
            </div><!-- **Inner Wrapper - End** -->
        </div><!-- **Wrapper - End** -->
        <script>
                        
              (function (body) {
            'use strict';
            body.className = body.className.replace(/\btribe-no-js\b/, 'tribe-js');
            })(document.body);
        </script>
       
        
        
        
        
        <script type='text/javascript'> /* <![CDATA[ */var tribe_l10n_datatables = {"aria":{"sort_ascending":": activate to sort column ascending", "sort_descending":": activate to sort column descending"}, "length_menu":"Show _MENU_ entries", "empty_table":"No data available in table", "info":"Showing _START_ to _END_ of _TOTAL_ entries", "info_empty":"Showing 0 to 0 of 0 entries", "info_filtered":"(filtered from _MAX_ total entries)", "zero_records":"No matching records found", "search":"Search:", "pagination":{"all":"All", "next":"Next", "previous":"Previous"}, "select":{"rows":{"0":"", "_":": Selected %d rows", "1":": Selected 1 row"}}, "datepicker":{"dayNames":["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"], "dayNamesShort":["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"], "dayNamesMin":["S", "M", "T", "W", "T", "F", "S"], "monthNames":["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"], "monthNamesShort":["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"], "nextText":"Next", "prevText":"Prev", "currentText":"Today", "closeText":"Done"}}; /* ]]> */</script><script type='text/javascript' src='wp-content/plugins/contact-form-7/includes/js/jquery.form.mind03d.js?ver=3.51.0-2014.06.20'></script>
        <script type='text/javascript'>
                            /* <![CDATA[ */
                            var _wpcf7 = {"recaptcha":{"messages":{"empty":"Please verify that you are not a robot."}}};
                            /* ]]> */
        </script>
        <script type='text/javascript' src='wp-content/plugins/contact-form-7/includes/js/scripts1c9b.js?ver=4.6.1'></script>
        <script type='text/javascript' src='wp-content/plugins/designthemes-core-features/shortcodes/js/jquery.tabs.min125b.js?ver=4.7.4'></script>
        <script type='text/javascript' src='wp-content/plugins/designthemes-core-features/shortcodes/js/jquery.tipTip.minified125b.js?ver=4.7.4'></script>
        <script type='text/javascript' src='wp-content/plugins/designthemes-core-features/shortcodes/js/jquery.inview125b.js?ver=4.7.4'></script>
        <script type='text/javascript' src='wp-content/plugins/designthemes-core-features/shortcodes/js/jquery.animateNumber.min125b.js?ver=4.7.4'></script>
        <script type='text/javascript' src='wp-content/plugins/designthemes-core-features/shortcodes/js/jquery.donutchart125b.js?ver=4.7.4'></script>
        <script type='text/javascript' src='wp-content/plugins/designthemes-core-features/shortcodes/js/shortcodes125b.js?ver=4.7.4'></script>
        <script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70'></script>
        <script type='text/javascript'>
                            /* <![CDATA[ */
                            var woocommerce_params = {"ajax_url":"\/themes\/logistics\/wp-admin\/admin-ajax.php", "wc_ajax_url":"\/themes\/logistics\/contact\/?wc-ajax=%%endpoint%%"};
                            /* ]]> */
        </script>
        <script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min32bb.js?ver=2.6.14'></script>
        <script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min330a.js?ver=1.4.1'></script>
        <script type='text/javascript'>
                            /* <![CDATA[ */
                            var wc_cart_fragments_params = {"ajax_url":"\/themes\/logistics\/wp-admin\/admin-ajax.php", "wc_ajax_url":"\/themes\/logistics\/contact\/?wc-ajax=%%endpoint%%", "fragment_name":"wc_fragments"};
                            /* ]]> */
        </script>
        <script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min32bb.js?ver=2.6.14'></script>
        <script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/prettyPhoto/jquery.prettyPhoto.minc6bd.js?ver=3.1.5'></script>
        <script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/prettyPhoto/jquery.prettyPhoto.init.min32bb.js?ver=2.6.14'></script>
        <script type='text/javascript' src='wp-content/plugins/yith-woocommerce-wishlist/assets/js/jquery.selectBox.min7359.js?ver=1.2.0'></script>
        <script type='text/javascript'>
                            /* <![CDATA[ */
                            var yith_wcwl_l10n = {"ajax_url":"\/themes\/logistics\/wp-admin\/admin-ajax.php", "redirect_to_cart":"no", "multi_wishlist":"", "hide_add_button":"1", "is_user_logged_in":"", "ajax_loader_url":"http:\/\/wedesignthemes.com\/themes\/logistics\/wp-content\/plugins\/yith-woocommerce-wishlist\/assets\/images\/ajax-loader.gif", "remove_from_wishlist_after_add_to_cart":"yes", "labels":{"cookie_disabled":"We are sorry, but this feature is available only if cookies are enabled on your browser.", "added_to_cart_message":"<div class=\"woocommerce-message\">Product correctly added to cart<\/div>"}, "actions":{"add_to_wishlist_action":"add_to_wishlist", "remove_from_wishlist_action":"remove_from_wishlist", "move_to_another_wishlist_action":"move_to_another_wishlsit", "reload_wishlist_and_adding_elem_action":"reload_wishlist_and_adding_elem"}};
                            /* ]]> */
        </script>
        <script type='text/javascript' src='wp-content/plugins/yith-woocommerce-wishlist/assets/js/jquery.yith-wcwl9c6b.js?ver=2.0.16'></script>
        <script type='text/javascript' src='wp-content/themes/designthemes/framework/js/jquery.ui.totop.min125b.js?ver=4.7.4'></script>
        <script type='text/javascript'>
                            /* <![CDATA[ */
                            var dttheme_urls = {"theme_base_url":"http:\/\/wedesignthemes.com\/themes\/logistics\/wp-content\/themes\/designthemes", "framework_base_url":"http:\/\/wedesignthemes.com\/themes\/logistics\/wp-content\/themes\/designthemes\/framework\/", "ajaxurl":"http:\/\/wedesignthemes.com\/themes\/logistics\/wp-admin\/admin-ajax.php", "url":"http:\/\/wedesignthemes.com\/themes\/logistics", "stickynav":"disable", "stickyele":".menu-wrapper", "isRTL":"", "loadingbar":"disable", "nicescroll":"disable", "advOptions":"Show Advanced Options"};
                            /* ]]> */
        </script>
        <script type='text/javascript' src='wp-content/themes/designthemes/framework/js/jquery.plugins125b.js?ver=4.7.4'></script>
        <script type='text/javascript' src='wp-content/themes/designthemes/framework/js/jquery.visualNav.min125b.js?ver=4.7.4'></script>
        <script type='text/javascript' src='wp-content/themes/designthemes/framework/js/custom125b.js?ver=4.7.4'></script>
        <script type='text/javascript' src='wp-content/themes/designthemes/framework/js/jquery.cookie.min125b.js?ver=4.7.4'></script>
        <script type='text/javascript' src='wp-content/themes/designthemes/framework/js/controlpanel125b.js?ver=4.7.4'></script>
        <script type='text/javascript' src='wp-includes/js/wp-embed.min125b.js?ver=4.7.4'></script>
        <script type='text/javascript' src='wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min972f.js?ver=5.0.1'></script>
        <script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?v=3.exp&amp;libraries=places'></script>
        <script type='text/javascript' src='wp-content/plugins/responsive-maps-plugin/includes/js/resmap.minf9b8.js?ver=4.0'></script>
        <script type="text/css" id="tmpl-tribe_customizer_css">.tribe-events-list .tribe-events-loop .tribe-event-featured,
            .tribe-events-list #tribe-events-day.tribe-events-loop .tribe-event-featured,
            .type-tribe_events.tribe-events-photo-event.tribe-event-featured .tribe-events-photo-event-wrap,
            .type-tribe_events.tribe-events-photo-event.tribe-event-featured .tribe-events-photo-event-wrap:hover {
                background-color: #0ea0d7;
            }

            #tribe-events-content table.tribe-events-calendar .type-tribe_events.tribe-event-featured {
                background-color: #0ea0d7;
            }

            .tribe-events-list-widget .tribe-event-featured,
            .tribe-events-venue-widget .tribe-event-featured,
            .tribe-mini-calendar-list-wrapper .tribe-event-featured,
            .tribe-events-adv-list-widget .tribe-event-featured .tribe-mini-calendar-event {
                background-color: #0ea0d7;
            }

            .tribe-grid-body .tribe-event-featured.tribe-events-week-hourly-single {
                background-color: rgba(14,160,215, .7 );
                border-color: #0ea0d7;
            }

            .tribe-grid-body .tribe-event-featured.tribe-events-week-hourly-single:hover {
                background-color: #0ea0d7;
            }</script><style type="text/css" id="tribe_customizer_css">.tribe-events-list .tribe-events-loop .tribe-event-featured,
            .tribe-events-list #tribe-events-day.tribe-events-loop .tribe-event-featured,
            .type-tribe_events.tribe-events-photo-event.tribe-event-featured .tribe-events-photo-event-wrap,
            .type-tribe_events.tribe-events-photo-event.tribe-event-featured .tribe-events-photo-event-wrap:hover {
                background-color: #0ea0d7;
            }

            #tribe-events-content table.tribe-events-calendar .type-tribe_events.tribe-event-featured {
                background-color: #0ea0d7;
            }

            .tribe-events-list-widget .tribe-event-featured,
            .tribe-events-venue-widget .tribe-event-featured,
            .tribe-mini-calendar-list-wrapper .tribe-event-featured,
            .tribe-events-adv-list-widget .tribe-event-featured .tribe-mini-calendar-event {
                background-color: #0ea0d7;
            }

            .tribe-grid-body .tribe-event-featured.tribe-events-week-hourly-single {
                background-color: rgba(14,160,215, .7 );
                border-color: #0ea0d7;
            }

            .tribe-grid-body .tribe-event-featured.tribe-events-week-hourly-single:hover {
                background-color: #0ea0d7;
                }</style></body>
</html>

  

 
 
