<script type="text/javascript">

//$(window).load(function(){
window.onload = initStyle;
//window.unload = initStyle;
    
function initStyle() {

  var url = window.location.href;
  var host = window.location.host;
  var path = window.location.pathname;
        
  if($('.alert')){
  $('.alert').slideToggle(1000); setTimeout(function(){$('.alert').slideToggle(1000)}, 3000);
  }

  //$("img.preload").fadeOut(500, function() {});
};
//});​


$(document).ready(function(){

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
  // $('._caller').random_hover_color();

  var myIcon = L.icon({
    iconUrl: window.location.origin + '/images/left-dex-green.png',
    iconSize: [20, 20],
    iconAnchor: [10, 10],
    labelAnchor: [6, 0] // as I want the label to appear 2px past the icon (10 + 2 - 6)
  });

  //mapping for home, /posts[blog] and /countries pages
  if(window.location.pathname == '/' 
    || window.location.pathname ==  '/posts'
    || window.location.pathname ==  '/countries'){ 

    map = L.map('map', {
      scrollWheelZoom: false,
      zoomControl: true,
      doubleClickZoom: true,
      attributionControl: false,
      }).setView([51.505, -0.09], 5); 
    var markersgroup = []
         
    L.tileLayer('http://{s}.tile.cloudmade.com/5e9427487a6142f7934b07d07a967ba3/997/256/{z}/{x}/{y}.png', {
      attribution: 'EuroHackTrip',
      maxZoom: 18,
      opacity: 0.5
    }).addTo(map);

    $.get('api/orgs', function(data){ //create markers for all cities in the hacktrip
      if(data ==''){
         console.log('You have no data! '+ data)
      }else{
        $.each(data, function(key, org){
          console.log(org);
          coords = org.map;
          lat = parseFloat(coords.substr(0, coords.indexOf(', ')))
          lng = parseFloat(coords.substr(coords.indexOf(', ')+2, coords.length))
          console.log(lat);
          console.log(lng);
          var marker = L.marker([lat, lng], {
                icon: myIcon
                })
                .bindLabel('<a href="'+window.location.origin+'/orgs/'+org.id+'">'
                      +org.name+'</a>', { 
                //label markers
                noHide: true,
                direction: 'auto'
                }).addTo(map);
          var popup = L.popup()
              // .setLatLng(latlng)
              .setContent('<a href="'+window.location.origin+'/orgs/'+org.id+'/edit">Edit</a><br />'+org.description+'</p>')
              .openOn(marker);
          marker.bindPopup(popup)

          markersgroup.push([lat, lng])
          // markersgroup.push(marker.getLatLng())
          // console.log(marker.getLatLng());
        })
        map.fitBounds(markersgroup);
      }

    })
    .fail(function() {
      console.log('check your db bro...');
    })

     
    


    $('._step1').click(function(e){

      
      e.preventDefault();
      $('._alert').show()
      $('._pink').show().fadeOut(1000)
      map.on('click', onMapClick)
      $(this).html('Next>>').attr('class', '_addbtn _charm _step2')

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

    newdata = {}
    var marker_new = L.marker()
    var lat = ''
    var lng = ''

    onMapClick = function(e) {
      
      lat = e.latlng.lat
      lng = e.latlng.lng
      console.log(e);
      console.log(lng);

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


      // $('._step2').attr({'data-toggle': 'modal', 'data-target': '._cats'})
      $("._step2").on('click', function(){ $('._cats').modal('show') }) 

      // $('.result').html('2. Click \'Next>>\' when you are done...')
      // $('.result-alert').show().fadeOut(2000)
    }
    
     
    $('label.cats').on('click', function(){
      $('button._step3').removeAttr('disabled').attr('class', '_step3 btn _caller')
     
    })
    $('._step3').click(function(e){ 
      e.preventDefault()
      $('._sign-in').modal('show')
    })
    $('button._step3').click( function(e){ 
      e.preventDefault()
      console.log('message');
      $('.modal-title').html('Sign In to Complete...') 
    })

    $('._step4').click(function(e){
      e.preventDefault();
      // var activebtnvalue = $(".btn-group").find("label.active input").prop('value');
      // newdata = {
      //   'path': activebtnvalue,
      //   'map': lat + ', ' + lng
      // } 
      // console.log(newdata);

      // var Posting = Backbone.Model.extend({
      //   url: activebtnvalue
      // });
      // org1 = new Posting({
      //   'map': lat + ', ' + lng
      // });
      // org1.save()
      // $('._sign-in').modal('show')

    })


        


  }


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




</script>