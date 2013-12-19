<script type="text/javascript">
  
    var myIcon = L.icon({
      iconUrl: window.location.origin + '/images/left-dex-green.png',
      iconSize: [20, 20],
      iconAnchor: [10, 10],
      labelAnchor: [6, 0] // as I want the label to appear 2px past the icon (10 + 2 - 6)
    });
    var map = L.map('map', {
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

    loadMap = function(_path){
        // map.load()
        console.log('Loading map for: ' + _path)

        
        $.get('/api/'+_path, function(data){ //create markers for all
          if(data ==''){
             console.log('No data here yet... '+ data)
          }else{
            var markersgroup = []
            $.each(data, function(key, record){
              // console.log(record);
              coords = record.map;
              lat = parseFloat(coords.substr(0, coords.indexOf(', ')))
              lng = parseFloat(coords.substr(coords.indexOf(', ')+2, coords.length))
              // console.log(lat);
              // console.log(lng);
              var marker = L.marker([lat, lng], {
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

              markersgroup.push([lat, lng])
              // markersgroup.push(marker.getLatLng())
              // console.log(marker.getLatLng());
            })
            map.fitBounds(markersgroup);
          }

        }).fail(function() {
          console.log('check your db bro...');
        })
    }

  fetchPostForm = function(){
    //fetches and writes create form
    
    $.get( '/'+selected_model+'/createpop', function(createForm) {
      // console.log(createForm);
      $('.createTemplate').html(createForm)
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
  }
  createPostEvent = function(){
      $( ".createTemplate input[type='submit']" ).on('click', function(e){
      // $('.createTemplate form').on('submit', function(){
        e.preventDefault()
        all_data = $.extend({}, map_data, $('.createTemplate form').serializeObject());
        if('{{ Sentry::check() }}' == ''){ 
          $('.modal').modal('hide')
          $('._sign-in-modal').modal('show')
        }
        else{
          console.log('Already logged in')
          postData()
        }
 
      })
  }
  postData = function(){
    var Posting = Backbone.Model.extend({
      url: selected_model
    });
    
    posting = new Posting(all_data);
    console.log('post data is: ' + all_data)
    console.log('posting to ' + selected_model)

    
    $('img.preload').show()

    posting.save()
    // $.ajax({
    //   url:selected_model,
    //   type:'POST',
    //   dataType:"json",
    //   data: all_data,
    //   success:function(dd){ 
    //     console.log(dd.statusText)

    //   },
    //   error:function(dd){ 
    //     console.log(dd.statusText)
    //   }
    // });
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
    // loadMap(selected_model)
    window.location.pathname = selected_model
    //working on making this happen after Bacbone save is complete! damnit!
  }

  $.fn.serializeObject = function()
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
var map_data = {}
var all_data = {}
// var _blink = function(){}


$(document).ready(function(){

  //mapping for home, /posts[blog] and /countries pages
  // if(window.location.pathname == '/' 
  //   || window.location.pathname ==  '/posts'
  //   || window.location.pathname ==  '/countries'){ 
  $(document).bind('click', function(e) {
    // console.log(this.className + ' clicked')
    // console.log(this)
    // console.log($(this))
    // console.log(e)
    // console.log(e.target)
    console.log('Clicked: '+e.target.tagName +'#' + e.target.id + ' .' + e.target.className)

  })   

    loadMap(_path)
  
    $('._step1').click(function(e){

      
      e.preventDefault();
      _alert('Click on the map to add an organisation, project, event or story...')
      map.on('click', onMapClick)
      

      // $('._cats').modal('show')

      // var data = {
      //   'name': 'tim',
      //   'description': 'learner'
      // };
      // $('.result').html('Click on the map to add an organisation, project, event or story...')
          // .css({'color': 'white', 'font-weight': 700}) 
      
      // $.post("/orgs", data);
      // org1.save();
      // $.ajax({
      //   url:'/orgs',
      //   type:'POST',
      //   dataType:"json",
      //   data: data
      //   // success:function (data) {             
      //   // if(data.error) {  // If there is an error, show the error messages
      //   //         $('.alert-error').text(data.error.text).show();
      //   //     }            
      //   // }
      // });

    })

  // } //end if(window.location.pathname == '/'  ...


    var marker_new = L.marker()
    var lat = ''
    var lng = ''

    onMapClick = function(e) {
      clearInterval(_blind);
      _alert('Now click "Next" to give a few more details...')
      
      lat = e.latlng.lat
      lng = e.latlng.lng
      // console.log(e);
      // console.log(lng);

      var myIcon = L.icon({
        iconUrl: '../images/bubble-pink.png',
        iconSize: [20, 20],
        iconAnchor: [10, 10],
        labelAnchor: [6, 0] // as I want the label to appear 2px past the icon (10 + 2 - 6)
      });

      marker_new
        .setLatLng(e.latlng)
        .setIcon(myIcon)
        .addTo(map);

      var popup_new = L.popup()
            // .setLatLng(latlng)
            .setContent('<a href="#" class="_step2">Creating here...</a>')
            .openOn(marker_new);
      marker_new.bindPopup(popup_new)


      // $('.result').html('2. Click \'Next>>\' when you are done...')
      // $('.result-alert').show().fadeOut(2000)
      $('a._step1').html('Next>>').attr('class', '_blade _aqua2pink _step2')
      $('div._step1').html('Next>>').attr('class', '_addbtn _blade _pink2aqua _step2')
 
      $("._step2").each(function(){
        $(this).on('click', function(e){
          e.preventDefault()
          $('._cats').modal('show')
        })
      })

    }
    
  
    // $('._step2').attr({'data-toggle': 'modal', 'data-target': '._cats'})
      $("._step2").on('click', function(e){
        e.preventDefault()
        $('._cats').modal('show')
      }) 

     
    $('label.cats').on('click', function(){
      $('button._step3').removeAttr('disabled').attr('class', '_step3 btn _pink2aqua') //add _pink2aqua
      $('div._step2').html('Complete>>').attr('class', '_addbtn _blade _aqua-hover _step3')
      $('a._step2').html('Complete>>').attr('class', '_blade _aqua2pink _step3')
      $('.leaflet-popup-content a._step2').html('Complete>>').attr('class', '_step3')
    })

    $('._step3').on('click', function(e){ 
      e.preventDefault()
      selected_model = $(".btn-group").find("label.active input").prop('value');
      map_data['map'] = lat + ', ' + lng; 

      $('img.preload').show()
      fetchPostForm($('._creates').modal('show'))

     
    })

    _step4 = function(){ // after log in
      if(all_data.map){//there is data being posted
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