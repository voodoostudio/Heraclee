function activateResetFiltser(e){var t=0,o=e,i=$("#cities_select option:selected").attr("value"),n=$("#property_type_select option:selected").attr("value"),r=$('input[type="checkbox"]:checked').length;$(this).parent().find("select option:selected"),$(".search_section .input_container input").each(function(){$(this).val()&&(t=1)}),t>0||o||"35970"!==i||"1"!==n||0!==r?$(".reset_filters_btn").addClass("active"):$(".reset_filters_btn").removeClass("active")}function contactMapInit(){var e,t;t={lat:43.25745,lng:6.633978},e=new google.maps.Map(document.getElementById("contact_map"),{zoom:14,center:t,scrollwheel:!1,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.HORIZONTAL_BAR,position:google.maps.ControlPosition.TOP_RIGHT},zoomControlOptions:{position:google.maps.ControlPosition.LEFT_CENTER},streetViewControlOptions:{position:google.maps.ControlPosition.LEFT_CENTER}});var o={url:"/img/map_pin.svg",scaledSize:new google.maps.Size(70,70)};new google.maps.Marker({position:t,map:e,icon:o,optimized:!1})}function resultsCarouselInit(){$(".results_carousel").slick({infinite:!0,lazyLoad:"progressive",slidesToShow:2,slidesToScroll:1,prevArrow:'<button type="button" class="slick-prev"><i class="icn icon-arrow_big_left"></i></button>',nextArrow:'<button type="button" class="slick-next"><i class="icn icon-arrow_big_right"></i></button>',dots:!0,responsive:[{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1}}]})}function resultsMapInit(){if("index"===$("body").attr("id")){var e={lat:43.281306,lng:6.565533};if($(window).width()<576)var t=new google.maps.Map(document.getElementById("results_map"),{zoom:10,center:e,scrollwheel:!1,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.HORIZONTAL_BAR,position:google.maps.ControlPosition.TOP_RIGHT},zoomControlOptions:{position:google.maps.ControlPosition.LEFT_TOP},streetViewControlOptions:{position:google.maps.ControlPosition.LEFT_TOP}});else var t=new google.maps.Map(document.getElementById("results_map"),{zoom:12,center:e,scrollwheel:!1,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.HORIZONTAL_BAR,position:google.maps.ControlPosition.TOP_RIGHT},zoomControlOptions:{position:google.maps.ControlPosition.LEFT_TOP},streetViewControlOptions:{position:google.maps.ControlPosition.LEFT_TOP}})}else var e={lat:46.207389,lng:6.155903},t=new google.maps.Map(document.getElementById("results_map"),{zoom:5,center:e,scrollwheel:!1,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.HORIZONTAL_BAR,position:google.maps.ControlPosition.TOP_RIGHT},zoomControlOptions:{position:google.maps.ControlPosition.LEFT_TOP},streetViewControlOptions:{position:google.maps.ControlPosition.LEFT_TOP}});var o=new google.maps.InfoWindow({maxWidth:"300px"}),i=locations.map(function(e){var i;i={url:"/img/map_pin_multi.svg",labelOrigin:new google.maps.Point(21,21),scaledSize:new google.maps.Size(42,60)};var n=new google.maps.Marker({position:e,icon:i,optimized:!1,label:{text:""+e.counter,color:"white",fontSize:"14px",fontWeight:"400"}});return e.hasOwnProperty("info")?n.setVisible(!0):n.setVisible(!1),google.maps.event.addListener(n,"click",function(){o.setContent(e.info),o.open(t,n),t.setCenter(n.getPosition()),infowindow_objectsInit()}),google.maps.event.addListener(t,"click",function(){o.close(t,n)}),n}),n={gridSize:50,styles:[{url:"/img/map_markerclusterer/claster_img_sm.svg",height:30,width:30,anchor:[0,0],textColor:"#000000",textSize:12},{url:"/img/map_markerclusterer/claster_img_md.svg",height:40,width:40,anchor:[0,0],textColor:"#000000",textSize:12},{url:"/img/map_markerclusterer/claster_img_lg.svg",width:52,height:52,anchor:[0,0],textColor:"#000000",textSize:12}],maxZoom:15};new MarkerClusterer(t,i,n);google.maps.event.addListener(o,"domready",function(){var e=$(".gm-style-iw"),t=e.prev();t.children(":nth-child(2)").css({display:"none"}),t.children(":nth-child(4)").css({display:"none"}),e.parent().parent().css({left:"-5px"}),t.children(":nth-child(1)").attr("style",function(e,t){return t+"left: -5px !important;"}),t.children(":nth-child(3)").attr("style",function(e,t){return t+"left: -5px !important;"}),t.children(":nth-child(3)").find("div").children().css({"background-color":"#272727","box-shadow":"none"}),e.next().css({display:"none"})})}function listView_galleryInit(){$(".result_preview_gallery").slick({slidesToShow:1,slidesToScroll:1,lazyLoad:"progressive",fade:!0,speed:100,prevArrow:'<button type="button" class="slick-prev"><i class="icn icon-arrow_big_left"></i></button>',nextArrow:'<button type="button" class="slick-next"><i class="icn icon-arrow_big_right"></i></button>'})}function infowindow_objectsInit(){$(".infowindow_container").slick({slidesToShow:1,slidesToScroll:1,lazyLoad:"progressive",autoplay:!0,pauseOnFocus:!0,fade:!1,speed:100,dots:!0,swipe:!0,prevArrow:'<button type="button" class="slick-prev tooltip" title="Précédent"><i class="icn icon-arrow_big_left"></i></button>',nextArrow:'<button type="button" class="slick-next tooltip" title="Suivant"><i class="icn icon-arrow_big_right"></i></button>'}),$(".infowindow_container button.tooltip").tooltipster({animation:"fade",delay:100,repositionOnScroll:!0,theme:"tooltipster-punk",side:"bottom"})}function dpe_ges_pointer(e,t){$("section.object_info_section .outer_block_container .inner_block_container .object_details_container .energy_block.dpe .energy_block_diagram .energy_block_diagram_right .energy_block_diagram_pointer").css("top",function(){if($(window).width()<576){if(e<=50)return 22;if(e>=51&&e<=90)return 48;if(e>=91&&e<=150)return 75;if(e>=151&&e<=230)return 101;if(e>=231&&e<=330)return 128;if(e>=331&&e<=450)return 154;if(e>450)return 180}else{if(e<=50)return 22;if(e>=51&&e<=90)return 57;if(e>=91&&e<=150)return 92;if(e>=151&&e<=230)return 127;if(e>=231&&e<=330)return 162;if(e>=331&&e<=450)return 197;if(e>450)return 232}}),$("section.object_info_section .outer_block_container .inner_block_container .object_details_container .energy_block.dpe .energy_block_diagram .energy_block_diagram_right .energy_block_diagram_pointer_line").css("top",function(){if($(window).width()<576){if(e<=50)return 33;if(e>=51&&e<=90)return 59;if(e>=91&&e<=150)return 86;if(e>=151&&e<=230)return 112;if(e>=231&&e<=330)return 139;if(e>=331&&e<=450)return 165;if(e>450)return 191}else{if(e<=50)return 36;if(e>=51&&e<=90)return 71;if(e>=91&&e<=150)return 106;if(e>=151&&e<=230)return 141;if(e>=231&&e<=330)return 176;if(e>=331&&e<=450)return 211;if(e>450)return 246}}),$("section.object_info_section .outer_block_container .inner_block_container .object_details_container .energy_block.ges .energy_block_diagram .energy_block_diagram_right .energy_block_diagram_pointer").css("top",function(){if($(window).width()<576){if(t<=5)return 22;if(t>=6&&t<=10)return 48;if(t>=11&&t<=20)return 75;if(t>=21&&t<=35)return 101;if(t>=36&&t<=55)return 128;if(t>=56&&t<=80)return 154;if(t>80)return 180}else{if(t<=5)return 22;if(t>=6&&t<=10)return 57;if(t>=11&&t<=20)return 92;if(t>=21&&t<=35)return 127;if(t>=36&&t<=55)return 162;if(t>=56&&t<=80)return 197;if(t>80)return 232}}),$("section.object_info_section .outer_block_container .inner_block_container .object_details_container .energy_block.ges .energy_block_diagram .energy_block_diagram_right .energy_block_diagram_pointer_line").css("top",function(){if($(window).width()<576){if(t<=5)return 33;if(t>=6&&t<=10)return 59;if(t>=11&&t<=20)return 86;if(t>=21&&t<=35)return 112;if(t>=36&&t<=55)return 139;if(t>=56&&t<=80)return 165;if(t>80)return 191}else{if(t<=5)return 36;if(t>=6&&t<=10)return 71;if(t>=11&&t<=20)return 106;if(t>=21&&t<=35)return 141;if(t>=36&&t<=55)return 176;if(t>=56&&t<=80)return 211;if(t>80)return 246}})}function tallestArticleBlock(){var e=-1;$("section.news_list_section .article_info_block").each(function(){e=e>$(this).height()?e:$(this).height()}),$("section.news_list_section .article_info_block").each(function(){$(this).height(e)})}function setBodyPaddingBottom(){var e=$("footer").height()+90;$("body").css({"padding-bottom":e})}function showSelectedFileName(){$(".input_file").each(function(){var e=$(this),t=e.next("label"),o=t.html();e.on("change",function(e){var i="";this.files&&this.files.length>1?i=(this.getAttribute("data-multiple-caption")||"").replace("{count}",this.files.length):e.target.value&&(i=e.target.value.split("\\").pop()),i?t.find("span").html(i):t.html(o)}),e.on("focus",function(){e.addClass("has-focus")}),e.on("blur",function(){e.removeClass("has-focus")})})}function setCookie(e,t,o){var i=new Date;i.setTime(i.getTime()+24*o*60*60*1e3);var n="expires="+i.toUTCString();document.cookie=e+"="+t+";"+n+";path=/"}function getCookie(e){for(var t=e+"=",o=document.cookie.split(";"),i=0;i<o.length;i++){for(var n=o[i];" "==n.charAt(0);)n=n.substring(1);if(0==n.indexOf(t))return n.substring(t.length,n.length)}return""}function disableSearchFields(){$(".search_input input").val()?($(".search_section .input_container input").not(".search_input input").each(function(){$(this).attr("disabled","disabled")}),$(".search_section select").each(function(){$(this).multiselect("disable")}),$(".multiselect.btn_default").attr("disabled","disabled")):($(".search_section .input_container input").not(".search_input input").each(function(){$(this).prop("disabled",!1)}),$(".search_section select").each(function(){$(this).multiselect("enable")}))}function orderSelectOptions(){var e=$(".search_section select#cities_select option"),t=e.map(function(e,t){return{t:$(t).text(),v:t.value}}).get();t.sort(function(e,t){return e.t>t.t?1:e.t<t.t?-1:0}),e.each(function(e,o){o.value=t[e].v,$(o).text(t[e].t)}),$(".search_section select#cities_select").multiselect("rebuild")}function minimizeSearchBlock(){$(window).width()<576&&($("section.search_section form").hasClass("minimized")?$("section.search_section form").removeClass("minimized"):$("section.search_section form").addClass("minimized"))}$(document).ready(function(){setBodyPaddingBottom(),minimizeSearchBlock(),function(){function e(){return Object.getOwnPropertyNames(i)}function t(t){for(var o=t.name.toLowerCase(),n=e(),r=(t.version,0);r<n.length;r++){var s=i[n[r]];if(o==s.name)return t.version<=s.version}return!0}function o(){var e,t=navigator.userAgent,o=t.match(/(opera|chrome|safari|firefox|msie|ie|trident(?=\/))\/?\s*(\d+)/i)||[];return/trident/i.test(o[1])?(e=/\brv[ :]+(\d+)/g.exec(t)||[],{name:"msie",version:e[1]||""}):"Chrome"===o[1]&&null!=(e=t.match(/\bOPR\/(\d+)/))?{name:"Opera",version:e[1]}:(o=o[2]?[o[1],o[2]]:[navigator.appName,navigator.appVersion,"-?"],null!=(e=t.match(/version\/(\d+)/i))&&o.splice(1,1,e[1]),{name:o[0],version:o[1]})}var i={GoogleChrome:{name:"chrome",version:53},MozillaFirefox:{name:"firefox",version:46},InternetExplorer:{name:"msie",version:10},InternetExplorerElse:{name:"ie",version:10},AppleSafari:{name:"safari",version:5},Opera:{name:"opera",version:38}};!function(e){var t=window.onload;"function"!=typeof window.onload?window.onload=e:window.onload=function(){t&&t(),e()}}(function(){t(o())&&$("#outdatedBrowser").show()})}(),$(window).resize(function(){setBodyPaddingBottom(),$(window).width()>576&&$("section.search_section form").hasClass("minimized")&&$("section.search_section form").removeClass("minimized")}),$(window).on("orientationchange",function(){setBodyPaddingBottom()}),$(".scroll_to_top a").click(function(){return $("html, body").animate({scrollTop:0},800),!1}),$(document).on("scroll",function(){$(document).scrollTop()>10?($("header").addClass("minimized"),$("section.page_title_section").addClass("minimized")):($("header").removeClass("minimized"),$("section.page_title_section").removeClass("minimized")),$(document).scrollTop()>500?$("footer .scroll_to_top").fadeIn():$("footer .scroll_to_top").fadeOut()}),document.addEventListener("touchstart",function(e){$(e.target).attr("class").indexOf("active")>=0&&(e.preventDefault(),$('.dropdown-toggle.btn[aria-expanded="true"]').trigger("click")),$(e.target).attr("class").indexOf("dropdown-toggle")>=0||$('.dropdown-toggle.btn[aria-expanded="true"]').trigger("click")},!1),$(".tooltip").tooltipster({animation:"fade",delay:100,repositionOnScroll:!0,theme:"tooltipster-punk",side:"top"}),$("header .menu-icon").on("click",function(){$("header").toggleClass("opened"),$("section.page_title_section").toggleClass("hidden")});var e=window.location.href.substring(window.location.href.lastIndexOf("/")+1),t=[],o=e.substr(0,e.lastIndexOf("?")),i=$("html").attr("lang");t=""===o?[e][0]:[o][0],$("section.search_section ul.nav-tabs li.nav-item a.nav-link").on("click",function(){var o=$("section.search_section input#sell_type_val").val(),n=$(this).closest("form").attr("action");n.indexOf("locations")>=0&&"1"===o?"results"!==t&&"fr"!==e&&"results"!==t&&"en"!==e?$(this).closest("form").attr("action","/"+i+"/achat/results/"+t):$(this).closest("form").attr("action","/"+i+"/achat/results"):n.indexOf("achat")>=0&&"3"===o&&("results"!==t&&"fr"!==e&&"results"!==t&&"en"!==e?$(this).closest("form").attr("action","/"+i+"/locations/results/"+t):$(this).closest("form").attr("action","/"+i+"/locations/results"))}),$(".search_section .input_container input").keyup(function(){activateResetFiltser()}),$(".my_checkbox input[type=checkbox]").change(function(){activateResetFiltser()}),$(".reset_filters_btn").on("click",function(){$(this).hasClass("active")&&($(this).parent().find(".input_container input").val(""),$(this).parent().find("select option:selected").each(function(){$(this).prop("selected",!1)}),$('#cities_select option[value="35970"]').prop("selected",!0),$('#view_select option[value=""]').prop("selected",!0),$('#standing_select option[value=""]').prop("selected",!0),$(this).parent().find("select").multiselect("refresh"),$('.extra_search_options .my_checkbox input[type="checkbox"]').prop("checked",!1),$(this).removeClass("active"),$(".search_section .input_container input").not(".search_input input").each(function(){$(this).prop("disabled",!1)}),$(".search_section select").each(function(){$(this).multiselect("enable")}))}),$("button#submit_search_form").on("click",function(){$(".search_section form").submit()}),$(window).width()<576&&($("#agencyContactModal").on("show.bs.modal",function(e){$("body").css("overflow","hidden"),$("body").css("position","fixed")}),$("#agencyContactModal").on("hide.bs.modal",function(e){$("body").css("overflow","initial"),$("body").css("position","relative")})),disableSearchFields(),$(".search_input input").on("change paste keyup",function(){disableSearchFields()}),$("section.search_section .show_options button").on("click",function(){$(this).closest("form").toggleClass("minimized"),$("html, body").animate({scrollTop:$(".search_section").offset().top-100},300)}),$("section.search_section .show_extra_options button").on("click",function(){$(this).closest("form").toggleClass("minimized_extra_options"),$("html, body").animate({scrollTop:$(".search_section").offset().top-100},300)});var n=$("body").attr("id"),r=$("header .dropdown .dropdown-menu a.active").html();"swiss"!=n&&"usa"!=n&&"mauritius"!=n||$("header .dropdown .dropdown-toggle").text(r)});