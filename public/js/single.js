  mapRecord = function(record){
    coords = record.map;
    mlat = parseFloat(coords.substr(0, coords.indexOf(', ')))
    mlng = parseFloat(coords.substr(coords.indexOf(', ')+2, coords.length))
    if(record.map == ''){
       console.log('Invalid map on record '+ record.id)
       mlat = lat
       mlng = lng
    }
    else{

      // console.log(mlat);
      // console.log(mlng);
      var marker = L.marker([mlat, mlng], {
            icon: myIcon
            })
            .bindLabel('<a href="'
              +window.location.origin+'/'+mymodel+'/'+record.id+'">'
                  +record.name+'</a>', { 
            //label markers
            noHide: true,
            direction: 'auto'
            }).addTo(map);
      var popup = L.popup()
          // .setLatLng(latlng)
          .setContent('<a href="'
            +window.location.origin+'/'+mymodel+'/'+record.id+'/edit">Edit</a><br />'
            +record.description+'</p>')
          .openOn(marker);
      marker.bindPopup(popup)
    }
      markersgroup.push([mlat, mlng])
      // console.log(marker.getLatLng());
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
        // opacity: 0.5
      }).addTo(map);

    $.get('/api/'+_path, function(ddd){ //create markers for all
    data = ddd
      if(data ==''){
         console.log('No data here yet... '+ data)
      }
      else{
          // console.log(data);
        if(data[0]){ //data is an array of more than one json object
          mymodel = _path
          $.each(data, function(key, record){mapRecord(record)})
        }
        else{
          mymodel = _path.substr(0, _path.indexOf('/')) //remove the index after model
          mapRecord(data)
        }
        map.fitBounds(markersgroup)
        b = L.latLngBounds(markersgroup)
        lat = b.getCenter().lat
        lng = b.getCenter().lng
      }

    }).done(function() { // has to happen when the map is done loading
      
    }).fail(function() {
      console.log('check your db bro...');
    })
    
  }
