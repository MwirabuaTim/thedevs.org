<script type="text/javascript">

  $.fn.serializeObject = function() // creates serialized object method for forms
  {
      var o = {};
      var a = this.serializeArray();
      $.each(a, function() {
          if (o[this.name] !== undefined) {
              if (!o[this.name].push) {
                  o[this.name] = [o[this.name]];
              }
              o[this.name].push(this.value || '');
          } else {
              o[this.name] = this.value || '';
          }
      });
      return o;
  };

    //   function random_hover_color() {
  //       var letters = '0123456789ABCDEF'.split('');
  //       var color = '#';
  //       for (var i = 0; i < 6; i++ ) {
  //           color += letters[Math.round(Math.random() * 15)];
  //       }
  //       // var colors_array = ['#ff0000', '#00ff00', '#0000ff'];
  //       // var color = colors_array[Math.floor(Math.random() * colors.length)];
  //       $(this).on('hover', function(){
  //         $(this).css('color', color);
  //       })
  //   }
  // $('._pink2aqua').random_hover_color();
  _alert = function(msg){
    $('._alert').each(function(){ 
      this.innerHTML = msg
    })
    $('._alert').css('display', 'inline-block') 
    $('._blink-pink').css('display', 'block') 
    _blind = setInterval(function(){
      $('._blink-pink').show().fadeOut(1000)
    }, 1200);
  }

  loadMap = function(_div, _path){
    console.log('Loading map for: ' + _path)
    myIcon = L.icon({ // needs to be initialized globally so that it can be referred
      iconUrl: window.location.origin + '/images/left-dex-green.png',
      iconSize: [20, 20],
      iconAnchor: [10, 10],
      labelAnchor: [6, 0] // as I want the label to appear 2px past the icon (10 + 2 - 6)
    });
    map = L.map(_div, { // needs to be initialized globally so that it can be referred
      scrollWheelZoom: true,
      zoomControl: true,
      doubleClickZoom: true,
      attributionControl: false,
      }).setView([51.505, -0.09], 5); 
    
    L.tileLayer('http://{s}.tile.cloudmade.com/5e9427487a6142f7934b07d07a967ba3/997/256/{z}/{x}/{y}.png', {
        attribution: 'EuroHackTrip',
        maxZoom: 18,
        opacity: 0.5
      }).addTo(map);

    $.get('/api/'+_path, function(data){ //create markers for all
      if(data ==''){
         console.log('No data here yet... '+ data)
      }else{
        $.each(data, function(key, record){
          // console.log(record);
          coords = record.map;
          mlat = parseFloat(coords.substr(0, coords.indexOf(', ')))
          mlng = parseFloat(coords.substr(coords.indexOf(', ')+2, coords.length))

          // console.log(mlat);
          // console.log(mlng);
          var marker = L.marker([mlat, mlng], {
                icon: myIcon
                })
                .bindLabel('<a href="'
                  +window.location.origin+'/'+_path+'/'+record.id+'">'
                      +record.name+'</a>', { 
                //label markers
                noHide: true,
                direction: 'auto'
                }).addTo(map);
          var popup = L.popup()
              // .setLatLng(latlng)
              .setContent('<a href="'
                +window.location.origin+'/'+_path+'/'+record.id+'/edit">Edit</a><br />'+record.description+'</p>')
              .openOn(marker);
          marker.bindPopup(popup)

          markersgroup.push([mlat, mlng])
          // console.log(marker.getLatLng());

        })
        map.fitBounds(markersgroup);
        b = L.latLngBounds(markersgroup);
        lat = b.getCenter().lat
        lng = b.getCenter().lng
      }

    }).done(function() { // has to happen when the map is done loading baby!
      
    }).fail(function() {
      console.log('check your db bro...');
    })
    
  }

  prefillForm = function(){
    $(".createTemplate form :input").not( "input[name=_token], input[type=submit]" ).each(function(){
      this.value = ls[this.name]
    })
  }
  richeditor = function(){
     tinymce.init({
        selector: "textarea.rich",
        height : '300px',
        width : '100%',
        
        // ===========================================
        // INCLUDE THE PLUGIN
        // ===========================================
        
        plugins: [
          "advlist autolink lists link image charmap print preview anchor",
          "searchreplace visualblocks code fullscreen",
          "insertdatetime media table contextmenu paste jbimages"
        ],
        
        // ===========================================
        // PUT PLUGIN'S BUTTON on the toolbar
        // ===========================================
        
        toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
        
        // ===========================================
        // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
        // ===========================================
        
        relative_urls: false
        
      });
       // TinyMCE
       //datepicker
      $('#start_time, #end_time').datetimepicker({
        dateFormat: 'dd M yy',
        timeFormat: 'hh:mm tt z',
        addSliderAccess: true,
        sliderAccessArgs: { touchonly: false }
      });

  }
  fetchPostForm = function(){
    //fetches and writes create form
    // setTimeout(function(){
      $.get( '/'+selected_model+'/createpop', function(createForm) {
      // console.log(createForm);
      $('.createTemplate').html(createForm)
      ls ? prefillForm() : true;
      all_data = {} //clean all_data so as not to post old data but the edited data

      // tinymce.init({selector:'textarea', height : 300, plugins: "code"});
      // TinyMCE 4.x 
       
     richeditor()

      createPostEvent()

      }).done(function(p) {
          console.log( "done");
          $('img.preload').hide()
        })
        .fail(function(p) {
          console.log( "error");
        })
        .always(function(p) {
          console.log( "finished");
        });
    // }, 10000);
    
  }
  _loadls = function(){
    localStorage.setItem('thedevsorgpost', JSON.stringify(all_data));
    localStorage.lat = lat
    localStorage.lng = lng
    localStorage.selected_model = selected_model
    localStorage.status = 'pending'
  }
  createPostEvent = function(){
      $( ".createTemplate input[type='submit']" ).on('click', function(e){
      // $('.createTemplate form').on('submit', function(){
        e.preventDefault()
        tinyMCE.triggerSave();
        all_data = $.extend(map_data, $('.createTemplate form').serializeObject());
        _loadls()  //whether guy is logged in or not, update the data in the ls
        if('{{ Sentry::check() }}' == ''){ 
          $('.modal').modal('hide')//hide the createpost form
          $('._sign-in-modal').modal('show')
        }
        else{
          console.log('Already logged in')
          postData()
        }
 
      })
  }
  postData = function(){
    // var Posting = Backbone.Model.extend({
    //   url: selected_model
    // });
    
    // posting = new Posting(all_data);
    // posting.save()
    console.log('post data is: ' + all_data)
    console.log('posting to ' + selected_model)

    $.ajax({
      url:selected_model,
      type:'POST',
      dataType:"json",
      data: all_data,
      success:function(dd){ 
        console.log(dd.statusText)
        localStorage.status = 'posted'

      },
      error:function(dd){ 
        console.log(dd.statusText)
      }
    });
    $('img.preload').show()

    setTimeout(function(){
       afterPosting()
    }, 3000);

    // $.get( '/'+selected_model, function(all_records) {;
    //   $('._content').html(all_records)
    // })
  }
  afterPosting = function(){
    $('img.preload').hide()
    $('.modal').modal('hide')
    // loadMap('map', selected_model)
    window.location.pathname = selected_model
    //working on making this happen after Bacbone save is complete! damnit!
  }



  onMapClick = function(e) {
    
    _alert('Click "Next" to give a few more details...')
    clearInterval(_blind);

    lat = e.latlng.lat
    lng = e.latlng.lng

    pin2map(lat, lng)

  }

  pin2map = function(lat, lng){
    // console.log('into pin2map');
    var myIcon = L.icon({
      iconUrl: '../images/bubble-pink.png',
      iconSize: [20, 20],
      iconAnchor: [10, 10],
      labelAnchor: [6, 0] // as I want the label to appear 2px past the icon (10 + 2 - 6)
    });
    // console.log('the lat is: ' + lat + ' and the lng is: '+ lng);
    marker_new
      .setLatLng({'lat': lat, 'lng': lng})
      .setIcon(myIcon)
      .addTo(map);
    // console.log('marker created: ' + marker_new);

    
    popup_new = L.popup()
      .setContent('<a href="#" class="_step2">Creating here...</a>')
      .openOn(marker_new)
    marker_new.bindPopup(popup_new).openPopup()

    markersgroup.push([lat, lng])
    map.fitBounds(markersgroup)


    $('a._step1').html('Next>>').attr('class', '_blade _aqua2pink _step2')
    $('div._step1').html('Next>>').attr('class', '_addbtn _blade _pink2aqua _step2')

    $("._step2").each(function(){
      $(this).on('click', function(e){
        e.preventDefault()
        $('._cats').modal('show')
         _alert('Click "Next" to give a few more details....')
      })
    })
   map_data['map'] = lat + ', ' + lng;  //setting map var for both onmapclick and lazy ls posting

  }

  pinls = function(){  // $('._addbtn').html('Complete>>').attr('class', '_addbtn _blade _aqua-hover _step2')
    pin2map(lat, lng)
    map.on('click', onMapClick)

    var x = $('.panel-group label input#'+localStorage.selected_model).parent()[0]
    x.className = 'cats btn panel _aqua-hover active'
    $('button._step3').removeAttr('disabled')
  }

//$(window).load(function(){
window.onload = initStyle;
//window.unload = initStyle;
    
function initStyle() {

  if($('.alert')){
  $('.alert').slideToggle(1000); 
  // setTimeout(function(){$('.alert').slideToggle(1000)}, 5000);
  // <div class="alert alert-success alert-block" style="display: block;">
  // <button type="button" class="close" data-dismiss="alert">×</button>
  // You have successfully logged out!
  // </div>
  }

  //$("img.preload").fadeOut(500, function() {});
};
//});​

var _path = window.location.pathname;
_path = _path.substr(1, _path.length)
if(_path ==''){_path = 'orgs'}
var selected_model = _path
// console.log(_path);
var _url = window.location.href;
var _host = window.location.host;
var markersgroup = []
var map_data = {}
var ls = JSON.parse(localStorage.getItem('thedevsorgpost')); ///what if not set ?
var all_data = ls ? ls : {}
var lat = ''
var lng = ''
var selected_model = localStorage.selected_model


// var _blink = function(){}

var marker_new = L.marker() 


$(document).ready(function(){
  // lat = localStorage.lat
  lng = localStorage.lng
  richeditor()//for form textareas

  //mapping for home, /posts[blog] and /countries pages
  // if(window.location.pathname == '/' 
  //   || window.location.pathname ==  '/posts'
  //   || window.location.pathname ==  '/countries'){ 
  // } //end if(window.location.pathname == '/'  ...
  $(document).bind('click', function(e) {
    // console.log(this.className + ' clicked')
    // console.log(this)
    // console.log($(this))
    // console.log(e)
    // console.log(e.target)
    console.log('Clicked: '+e.target.tagName +'#' + e.target.id + ' .' + e.target.className)

  })


  if($('#map')[0] != undefined){
    loadMap('map', _path)
    //these need to be created just once 
  }
    
  if(localStorage.status == 'pending'){// local storage
    pinls()
  }


  $('._step1').click(function(e){
    if(map){e.preventDefault()}    
    _alert('Click on the map to add an organisation, project, event or story...')
    map.on('click', onMapClick)
    console.log('step 1 done');
    pin2map(lat, lng) // just to load pin on map center first time
  })


  // $('._step2').attr({'data-toggle': 'modal', 'data-target': '._cats'})

   
  $('label.cats').on('click', function(){
    $('button._step3').removeAttr('disabled').attr('class', '_step3 btn _pink2aqua') //add _pink2aqua
    $('div._step2').html('Complete>>').attr('class', '_addbtn _blade _aqua-hover _step3')
    $('_nav li a._step2').html('Complete>>').attr('class', '_blade _aqua2pink _step3')
    $('.leaflet-popup-content a._step2').html('Complete>>').attr('class', '_step3')
  })

  $('._step3').on('click', function(e){ 
    e.preventDefault()
    selected_model = $(".btn-group").find("label.active input").prop('value');
    _alert('Click "Complete>>" to publish your post...')
    fetchPostForm($('._creates').modal('show'))
    $('.createTemplate').append($('img.preload').show());
   
  })

  _step4 = function(){ // after log in
    if(localStorage.status == 'pending'){//there is data that has not been posted
      postData()
    }
    else{
      location.reload()
    }
  }




    // $('button._step3').click( function(e){ 
    //   e.preventDefault()
    //   console.log('message');
    //   $('._sign-in-modal .modal-title').html('Sign In to Complete...') 
    //   $('._sign-up-modal .modal-title').html('Sign Up to Complete...') 
    // })

    $('._get-sign-in').click(function(e){ 
      e.preventDefault()
      $('._sign-up-modal').modal('hide')
      $('._sign-in-modal').modal('show')
    })

    $('._get-sign-up').click(function(e){ 
      e.preventDefault()
      $('._sign-in-modal').modal('hide')
      $('._sign-up-modal').modal('show')
    })

    $('._sign-up-modal form').on('submit', function(e){
      e.preventDefault()
      $.post($(this).attr('action'), $(this).serializeArray(), function(ddd){
        if(ddd['success']){
          _alert(ddd['success']);
          $('._sign-up-modal').modal('hide')
          // _step4() //no point of reloading after sign-up
        }
        else{
          // console.log(ddd)
          $('._sign-up-modal form').children().remove()
          $('._sign-up-modal form').append(ddd)
        }
      })
    })

    // $('._oauth').on('click', function(e){
    //   e.preventDefault()
    //   $.get($(this).attr('href'), function(ddd){
    //     if(ddd['success']){
    //       _alert(ddd['success']);
    //       $('._sign-up-modal').modal('hide')
    //       _step4()
    //     }
    //     else{
    //       console.log(ddd)
    //     }
    //   })
    // })

    $('._sign-in-modal form').on('submit', function(e){
      e.preventDefault()
      $('img.preload').show()
      $.post($(this).attr('action'), $(this).serializeArray(), function(ddd){
        if(ddd['success']){
          _alert(ddd['success']);
          console.log(ddd['success']);
          _step4()

        }
        else{
          // console.log(ddd)
          $('._sign-in-modal form').children().remove()
          $('._sign-in-modal form').append(ddd)
        }
      })
      $('img.preload').hide()
      // modal('show')
    })


  //autocomplete for colleges search 
  $(".searchcolleges").autocomplete({
      source: function (request, response) {
        $.ajax({
            url: "{{ URL::to('colleges/ajax') }}",
            type: "GET",
            cache: false,
            dataType: "json",
            success: function (data) {
                //console.log(data[0] ? data[0].name : "No results");
                var arr = [];
                //var ids = [];
                $(data).each(function( index ) {
                  arr.push({label:this.name, value:this.name, id:this.id });
                  //ids.push({value:this.id});
                });
                //console.log(arr);
                //arr = arr.reverse();
                response(arr);
            },
            data: {
                term: request.term
            }
        });
      },
    select: function( event, ui ) {
    window.location.href = "{{ URL::to('colleges/"+ ui.item.id +"') }}";
    }
  });


  //doublescroll
  if(document.getElementById('doublescroll')){
      function DoubleScroll(element) {
          var scrollbar= document.createElement('div');
          scrollbar.appendChild(document.createElement('div'));
          scrollbar.style.overflow= 'auto';
          scrollbar.style.overflowY= 'hidden';
          scrollbar.firstChild.style.width= element.scrollWidth+'px';
          scrollbar.firstChild.style.paddingTop= '1px';
          scrollbar.firstChild.appendChild(document.createTextNode('\xA0'));
          scrollbar.onscroll= function() {
              element.scrollLeft= scrollbar.scrollLeft;
          };
          element.onscroll= function() {
              scrollbar.scrollLeft= element.scrollLeft;
          };
          element.parentNode.insertBefore(scrollbar, element);
      }

      DoubleScroll(document.getElementById('doublescroll'));

  }

  jQuery('.btn-danger').click(function(evnt) {
      evnt.preventDefault();
      var title = "Confirm";
      var message = "Are you sure you want to delete?";
      var btn = $(this);
      console.log(btn);

      function formSubmit(){
          btn.parent('form').submit();
      }

      if (!jQuery('#dataConfirmModal').length) {
          jQuery('body').append('<div id="dataConfirmModal" \
           class="modal fade" role="dialog" aria-labelledby="dataConfirmLabel" \
           aria-hidden="true"><div class="modal-header"> \
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">× \
           </button><h3 id="dataConfirmLabel">'+title+'</h3></div><div class="modal-body"> \
           '+message+'</div><div class="modal-footer"><button class="btn btn-success" \
            data-dismiss="modal" aria-hidden="true">No</button><a class="btn btn-danger"  \
            data-dismiss="modal" id="dataConfirmOK">Yes</a></div> \
            </div>');
      } 

      jQuery('#dataConfirmModal').find('.modal-body').text(message);
      jQuery('a#dataConfirmOK').on('click', function(){
          formSubmit();
      });
      jQuery('#dataConfirmModal').modal({show:true});

  })

})


    // var Org = Backbone.Model.extend({
    // defaults:{
    //   name: 'John Doe',
    //   description: 'dev'
    // }
    // , url: '/orgs'
    // });
    // org1 = new Org({
    //   'logo': 'comming soon',
    //   'video': ' this vid',
    //   'creator': 'creator1'
    // });



  // $('.nextbtn').on('click', function(data){
  //   $(this).attr({'data-toggle': "modal", 'data-target': '._cats'})
  // });


  // $('#map').on('click', function(data){

  //   $('.result').html('Click object that your want to add');

  //   console.log(data);
  //   // $.post("/orgs", data);
  //   org1.save();

   
  // })


// var CreateView = Backbone.View.extend({ //extends backbone view, 
//   template: _.template(createForm)

//   // , template: '#createTemplate'


//   , initialize: function(){ // automatically runs when a class is instantiated
    
//     console.log(this.model);
//     this.render();
//   }

//   , render: function(){//takes your template and groups together with the associated data

//     this.$el.html(this.template(this.model.toJSON()))
//     $(document.body).append(this.el);

//   }

// })
// // if(createForm.error) {  // If there is an error, show the error messages
// //     $('.alert-error').text(data.error.text).show();
// // }   



</script>