function initStyle(){if($(".alert")){$(".alert").slideToggle(1e3);setTimeout(function(){$(".alert").slideToggle(1e3)},5e3)}}loggedIn=function(){if(sentry_check=="1"){return true}else{return false}};$.fn.serializeObject=function(){var e={};var t=this.serializeArray();$.each(t,function(){if(e[this.name]!==undefined){if(!e[this.name].push){e[this.name]=[e[this.name]]}e[this.name].push(this.value||"")}else{e[this.name]=this.value||""}});return e};isMain=function(){if($.inArray(_path,[".","devs","orgs","eventts","projects","stories"])>-1){return true}return false};clickLogger=function(){$(document).bind("click",function(e){console.log("Clicked: "+e.target.tagName+"#"+e.target.id+" ."+e.target.className)})};gitData=function(e){var t=[],n=0,r=0,i=0,s=0,o=0,u=false,a=0,f=0,l=0;e.forEach(function(e){n+=e[1];if(e[1]!==0){r++;s++;if(e[1]>i)i=e[1]}else{if(s>o)o=s;s=0}var t=(new Date(e[0])).getDay();if(t===6||t===7){u=true;if(e[1]!==0){l++;a++;if(a>f)f=a}else{a=0}}else{u=false}});t.push(n+" Commits. ");t.push("Active Days: "+r+"/365. ");t.push("Longest Streak: "+o+" days.");t.push("Peak: "+i+" Commits/Day.");t.push("Weekends: "+l+"/52.");t.push("Weekends in a row: "+f);return t};_alert=function(e){$("._alert").remove();_blinker1=_blinker.clone();_blinker1.appendTo("._alerts");_blinker1.append(e);$("._alert._data").css("display","inline-block");$("._alert._bg-pink").css("display","block");$("._dismiss").click(function(){$("._alert").remove()});setTimeout(function(){_height=parseInt($("._alert").css("height"));$("._alert._bg-pink").css("margin-top",-_height+"px")},1e3);setTimeout(function(){},2e4)};loadMap=function(e,t){myIcon=L.icon({iconUrl:pin_pink,iconSize:[20,20],iconAnchor:[10,10],labelAnchor:[6,0]});map=L.map(e,{scrollWheelZoom:false,zoomControl:true,attributionControl:false}).setView([51.505,-.09],5);L.tileLayer("http://{s}.tile.cloudmade.com/5e9427487a6142f7934b07d07a967ba3/997/256/{z}/{x}/{y}.png",{maxZoom:18}).addTo(map);marker_cluster=new L.MarkerClusterGroup;lc=L.control.locate().addTo(map)};fetchMapData=function(){$.get("/"+_path+"/api/",function(e){_record=e;if(_record==""){console.log("No _record here yet... "+_record)}else{afterFetch(_record)}}).fail(function(){console.log("check your db bro...")})};domFetch=function(){_record=$.parseJSON($(".page_data").html());afterFetch(_record)};afterFetch=function(e){if(e[0]){$.each(e,function(e,t){_record=t;$("."+t.model_path+" span").html("("+t.model_count+")");mapRecord(t)})}else{mapRecord(e)}};mapRecord=function(e){coords=e.map;mlat=parseFloat(coords.substr(0,coords.indexOf(", ")));mlng=parseFloat(coords.substr(coords.indexOf(", ")+2,coords.length));if(e.map==""){mlat=lat;mlng=lng}else{_recordName=e.name;marker=L.marker([mlat,mlng],{icon:myIcon});var t=L.popup().setContent('<a href="/'+e.model_path+"/"+e.id+'">'+_recordName+"</a>").openOn(marker);marker.bindPopup(t);marker_cluster.addLayer(marker)}markersgroup.push([mlat,mlng]);setTimeout(function(){afterMapping()},1e3)};_locate=function(){window.location.pathname=="/"?lc.locate():true};window.alert=function(){_alert("TheDevs.Org needs location. Check your location settings.")};afterMapping=function(){b=L.latLngBounds(markersgroup);lat=b.getCenter().lat;lng=b.getCenter().lng;if(markersgroup.length==1){map.setZoom(5);map.panTo([lat,lng]);map.panBy([-100,0])}else{_locate();bindLabel(marker,_record);map.fitBounds(markersgroup)}map.addLayer(marker_cluster)};bindLabel=function(e,t){e.bindLabel('<a href="/'+t.model_path+"/"+t.id+'"> Latest '+t.model+"</a>",{noHide:true,direction:"auto"})};prefillForm=function(){$(".createTemplate form :input").not("input[name=_token], input[type=submit]").each(function(){this.value=LS.post[this.name]})};richEditor=function(){tinymce.init({selector:"textarea.rich",height:"200px",width:"100%",content_css:"/css/content.css",theme_advanced_font_sizes:"10px,12px,13px,14px,16px,18px,20px",font_size_style_values:"10px, 12px,13px,14px,16px,18px,20px",plugins:["advlist autolink lists link image charmap print preview anchor","searchreplace wordcount visualblocks code fullscreen","insertdatetime media table contextmenu paste jbimages"],toolbar:"insertfile undo redo | fontselect | fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages emoticons preview",relative_urls:false});$("#start_time, #end_time").datetimepicker({dateFormat:"dd M yy",timeFormat:"hh:mm tt z",addSliderAccess:true,sliderAccessArgs:{touchonly:false}});$(document).on("focusin",function(e){if($(e.target).closest(".mce-window").length){e.stopImmediatePropagation()}})};fetchPostForm=function(){$.get("/"+model+"/createpop",function(e){$(".createTemplate").html(e);$("img.preload").hide();setTimeout(function(){richEditor()},1e3);titl=$(".createTemplate h2").clone();$(".createTemplate h2").remove();$("._creates .modal-title").html(titl);$("._creates .modal-footer").remove();if(LS.status=="posting"){prefillForm()}else{LS.status="posting"}LS.lat=lat;LS.lng=lng;LS.model=model;saving=setInterval(function(){saveToLS()},5e3);all_data={};createPostEvent();$("._clearLS").on("click",function(){localStorage.removeItem("thedevsorg");$("._alert").remove()})}).fail(function(e){console.log(e)})};saveToLS=function(){tinyMCE.triggerSave();all_data=$.extend({},map_data,$(".createTemplate form").serializeObject());LS.post=$.extend(LS.post,all_data);localStorage.thedevsorg=JSON.stringify(LS)};createPostEvent=function(){$(".createTemplate input[type='submit']").on("click",function(e){e.preventDefault();$('.createTemplate input[type="submit"]').attr("disabled","on");saveToLS();_creator="undefined"==typeof all_data["start_time"]?"creator":"organizer";if(loggedIn()){all_data[_creator]=user_id}else{all_data[_creator]=2;all_data["status"]=session_id;all_data["public"]="off";$(".modal").modal("hide");$("._sign-in-modal").modal("show");$("._sign-in-modal .modal-title").html("Log in to complete...");$("._sign-up-modal .modal-title").html("Sign Up to complete...")}postData()})};postData=function(){$("img.preload").show();var e=$.post("/"+model,all_data,function(e){console.log("Posted temporarily.");$("img.preload").hide();clearInterval(saving);localStorage.removeItem("thedevsorg");LS.status="posted";LS.id=e;if(loggedIn()){window.location.pathname=model+"/"+LS.id}}).fail(function(e){console.log("Error: "+JSON.stringify(e))})};onMapClick=function(e){$("button._step3").removeAttr("disabled");if($("._alert")[0]){_alert('Click "Next" to give a few more details....')}lat=e.latlng.lat;lng=e.latlng.lng;pin2map(lat,lng);lng=lng>180?lng%360:lng;lng=lng>180?lng-360:lng;lng=lng<-180?lng%360:lng;lng=lng<-180?lng+360:lng;console.log(lat);console.log(lng);if($("#single-map input")[0]){$("#single-map input")[0].value=lat+", "+lng}};pin2map=function(e,t){var n=L.icon({iconUrl:pin_green,iconSize:[20,20],iconAnchor:[10,10],labelAnchor:[6,0]});marker_new.setLatLng({lat:e,lng:t}).setIcon(n).addTo(map);if(!$("#single-map")[0]){popup_new=L.popup().setContent('<a href="#" class="_step3">Creating here...</a>').openOn(marker_new);$("._addbtn").html('<span class="_blade _aqua2pink _step3">Complete>></span>');marker_new.bindPopup(popup_new).openPopup();markersgroup.push([e,t]);map_data["map"]=e+", "+t}setTimeout(function(){_step3()},500);$("._clearLS").show()};pinLS=function(){pin2map(lat,lng);map.on("click",onMapClick);var e=$(".panel-group label input#"+LS.model).parent()[0];e.className="cats btn panel _aqua-hover active";$("button._step3").removeAttr("disabled")};getNewMarkers=function(e){$.post("/api",e,function(e){console.log(e)})};window.onload=initStyle;var _path=window.location.pathname;_path=_path.substr(1,_path.length);if(_path==""){_path="."}var _model=_path.substr(0,_path.indexOf("/"));var _id=_path.substr(_path.indexOf("/")+1,_path.length1);var _url=window.location.href;var _host=window.location.host;var markersgroup=[];var map_data={};var LS=localStorage.thedevsorg?JSON.parse(localStorage.thedevsorg):{};var all_data=LS.post?LS.post:{};var saving=0;var lat="";var lng="";var model=LS.model;var _record={};var marker={};var marker_new=L.marker();var lc={};window.setInterval(function(){$("._alert._bg-pink").show().fadeOut(1e3)},1500);var _blinker=$("._alert").clone();$("._alert").remove();"undefined"!=typeof myalert?_alert(myalert):true;var ressp={};var sentry_check="{{ Sentry::check() }}";var pin_pink='{{ asset("images/mapping/bubble-pink.png") }}';var pin_green='{{ asset("images/mapping/left-dex-green.png") }}';var session_id="{{ session_id() }}";var api_url="{{ URL::to('api/search') }}";$(document).ready(function(){lat=LS.lat;lng=LS.lng;richEditor();var e=$(".mason-stacks");e.imagesLoaded(function(){e.masonry({columnWidth:10,itemSelector:".item",isFitWidth:true})});$(function(){$("._alert").pulse({backgroundColor:"#55ffAA",color:"#333"},{returnDelay:200,interval:500,pulses:5})});$(".slide-out-div").tabSlideOut({tabHandle:".handle",pathToTabImage:"/images/devs/contact.png",imageHeight:"130px",imageWidth:"40px",tabLocation:"right",speed:600,action:"click",topPos:"200px",leftPos:"20px",fixedPosition:true});$(".slide-out-div").show();$("a._demo").click(function(e){e.preventDefault();$("#demo").joyride({autoStart:true})});if($("#thedevsmap")[0]!=undefined){loadMap("thedevsmap",_path);domFetch();map.on("focus",function(){map.scrollWheelZoom.enable()})}if($("#single-map")[0]!=undefined){loadMap("single-map",_path);domFetch();map.on("focus",function(){map.scrollWheelZoom.enable()});setTimeout(function(){if(_path.indexOf("/edit")>-1){map.on("click",onMapClick);if(_record.map==""){mlat=-1.3;mlng=36.75+Math.random()*.1;pin2map(mlat,mlng);markersgroup.pop();markersgroup.push([mlat,mlng]);map.fitBounds(markersgroup)}}},2e3)}if(LS.status=="posting"&&isMain()){pinLS();_name=LS.post.name?LS.post.name:LS.post.first_name;$("._addbtn").html('<span class="_blade _aqua2pink _step3">Complete>></span>');$("a._step2").attr("class","_step3");_alert('<u class="_step3">Complete creating "'+LS.post.name+'"</u>');$("._clearLS").show()}if(!isMain()){$("span.links").show()}$("._clearLS").on("click",function(){localStorage.removeItem("thedevsorg");$("._alert").remove()});_git=[];if(_model=="devs"){$.get("/devs/"+parseInt(_id)+"/api/github",function(e){_git=gitData(JSON.parse(e));_git.map(function(e){return e[1]});$("._git").append('<a href="'+_gitlink+'">Github Year: </a>');for(var t=0,n=_git.length;t<n;t++){$("._git").append(' <span class="_in-block">'+_git[t]+"</span>")}})}$("._step1").click(function(e){e.preventDefault();$("._cats").modal("show")});$("._step2").on("click",function(e){function t(){map.addLayer(marker_cluster);$(this).one("click",n);$(this).text("Hide Markers")}function n(){map.removeLayer(marker_cluster);$(this).one("click",t);$(this).text("Show Markers")}"undefined"!=typeof map?e.preventDefault():console.log("Please create from a different page.");$("._pin-map .modal-body").css("height",$(window).height()*.7+"px");$("._pin-map .modal-dialog").css("margin","0px");$("._hide-markers").one("click",n);$("._pin-map").modal("show");setTimeout(function(){loadMap("pinmap",_path);domFetch();map.on("click",onMapClick);if(lc._circle){lat=lc._circle._latlng.lat;lng=lc._circle._latlng.lng}},1e3)});$("label.cats").on("click",function(){model=$(".btn-group").find("label.active input").prop("value");$("button._step2").removeAttr("disabled")});_step3=function(){$("._step3").on("click",function(e){e.preventDefault();$("._pin-map").modal("hide");$(".createTemplate").append($("img.preload").show());fetchPostForm();$("._creates").modal("show")})};$("._get-sign-in").click(function(e){e.preventDefault();$("._sign-up-modal").modal("hide");$("._sign-in-modal").modal("show")});$("._get-sign-up").click(function(e){e.preventDefault();$("._sign-in-modal").modal("hide");$("._sign-up-modal").modal("show")});$("._sign-up-modal form").on("submit",function(e){e.preventDefault();$.post($(this).attr("action"),$(this).serializeArray(),function(e){if(e["success"]){_alert(e["success"]);$("._sign-up-modal").modal("hide")}else{$("p._pink").remove();$.each(e["errors"],function(e,t){$('<p class="_pink _top10">'+t+"</p>").insertBefore($('._sign-up-modal form input[name="'+e+'"]'))})}})});$("._sign-in-modal form").on("submit",function(e){e.preventDefault();$('._sign-in-modal form input[type="submit"]').attr("disabled","on");$("img.preload").show();$.post($(this).attr("action"),$(this).serializeArray(),function(e){if(e["success"]){_alert(e["success"]);window.location.pathname=model&&LS.id?model+"/"+LS.id:e["redirect"]}else{$('._sign-in-modal form input[type="submit"]').removeAttr("disabled");$("p._pink").remove();$.each(e["errors"],function(e,t){$('<p class="_pink _top10">'+t+"</p>").insertBefore($('._sign-in-modal form input[name="'+e+'"]'))});$('<p class="_pink _top10">Please check your details...</p>').insertBefore($('._sign-in-modal form input[name="email"]'))}});$("img.preload").hide()});$("._search").autocomplete({source:function(e,t){$.ajax({url:api_url,type:"GET",cache:false,dataType:"json",success:function(e){var n=[];for(var r in e){e[r].location=e[r].location==""?"unknown location":e[r].location;n.push({label:e[r].model+': "'+e[r].name+'" from '+e[r].location,value:e[r].name,id:e[r].id,"class":e[r].model_path})}t(n)},data:{term:e.term}})},select:function(e,t){window.location.href="/"+t.item.class+"/"+t.item.id}});_holder='Search "JavaScript", "Android", "Developer", "Tech Hub", "TEDx", "Conf" etc near you...';$("._search").click(function(){if(this.value==_holder)this.value=""}).blur(function(){if(this.value=="")this.value=_holder}).val(_holder);$("._search").click(function(e){e.preventDefault()});if(document.getElementById("doublescroll")){function t(e){var t=document.createElement("div");t.appendChild(document.createElement("div"));t.style.overflow="auto";t.style.overflowY="hidden";t.firstChild.style.width=e.scrollWidth+"px";t.firstChild.style.paddingTop="1px";t.firstChild.appendChild(document.createTextNode(" "));t.onscroll=function(){e.scrollLeft=t.scrollLeft};e.onscroll=function(){t.scrollLeft=e.scrollLeft};e.parentNode.insertBefore(t,e)}t(document.getElementById("doublescroll"))}if($.fn.confirmation!=undefined&&_path.indexOf("/create")==-1){$(".btn-danger, ._del").click(function(e){e.preventDefault()});$(".btn-danger, ._del").not(".btn-danger.fileupload-exists").confirmation({href:"./delete",onCancel:function(){$(".popover").fadeOut(200)}})}if("undefined"!=typeof addthis){addthis.layers({theme:"transparent",share:{position:"left",services:"facebook,twitter,google_plusone_share,linkedin,email,more"},responsive:{maxWidth:"550px",minWidth:"0px"}})}$("html").niceScroll({styler:"fb",cursorcolor:"#55ffaa",cursorwidth:"6",cursorborderradius:"10px",background:"#666",spacebarenabled:false,cursorborder:"",zindex:"1000"})})