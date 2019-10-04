<?php
	require_once 'header.php';

	$queryBuilder = $conn;

	$array = [];

  	$array = $queryBuilder->fetchAll("SELECT lat, lon FROM wp_bribery_report");

  	$cord = json_encode($array, JSON_PRETTY_PRINT);

?>
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 500px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>


<div id="map" ></div>

<div class="offset-8 col-4" style="margin-top: -450px;">

  <div class="card border-primary mb-3">

    <ul class="list-group list-group-flush">

      <li class="list-group-item" ><a data-toggle="collapse" href="#collapseExample" class="all-category-filter">All Category <span class="badge badge-primary all-category" style="float:right;">0</span></a>
            <li class="list-group-item">
              <a href="javascript:;" class="category-filter" value="I paid bribe">
                I paid a bribe 
                <span class="badge badge-primary paid-category" style="float:right;">
                  0
                </span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="javascript:;" class="category-filter" value="I was offered bribe">
                I was offered a bribe
                <span class="badge badge-primary didnt-category" style="float:right;">
                  0
                </span>
              </a>
            </li>

            <li class="list-group-item">
              <a href="javascript:;" class="category-filter" value="I received bribe">
                I received a bribe
                <span class="badge badge-primary honest-category" style="float:right;">
                  0
                </span>
              </a>
            </li>

            <li class="list-group-item">
              <a href="javascript:;" class="category-filter" value="I witness bribe">
                I witnessed a bribe
                <span class="badge badge-primary witness-category" style="float:right;">
                  0
                </span>
              </a>
            </li>
            
          </ul>

    <!--<ul class="list-group list-group-flush  mb-3">
    <li class="list-group-item" ><a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="all-category-filter">All Category <span class="badge badge-primary all-category" style="float:right;">0</span></a>
      <br>

      <div class="collapse p" id="collapseExample" >
        <div class="card " style="border: none;">

          <hr>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <a href="javascript:;" class="category-filter" value="I paid a bribe">
                I paid a bribe 
                <span class="badge badge-primary paid-category" style="float:right;">
                  0
                </span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="javascript:;" class="category-filter" value="I didn't pay a bribe">
                I didn't pay a bribe
                <span class="badge badge-primary didnt-category" style="float:right;">
                  0
                </span>
              </a>
            </li>

            <li class="list-group-item">
              <a href="javascript:;" class="category-filter" value="I meet an honest public official">
                I meet an honest public official
                <span class="badge badge-primary honest-category" style="float:right;">
                  0
                </span>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>-->
  </div>

</div>

<hr>

<div class=" main-row" style="margin-top: 300px;">

  
</div>


<style type="text/css">
  
  .p{

    margin: 0px -.85rem 0px -1.25rem;
  }
</style>
    <script>



      function initMap() {

      	
      	$(document).ready(function(){

      		jQuery.ajax ({
	      		url: './',
	      		data: {ajax: 'true'},
	      		method: 'GET',
	      		success: function(res){
	      			 locations = (JSON.parse(res))

               $('.all-category').text(locations.length)
               $('.paid-category').text(locations.filter(lf => lf.category == 'I paid bribe').length)
               $('.didnt-category').text(locations.filter(lf => lf.category == 'I was offered bribe').length)
               $('.honest-category').text(locations.filter(lf => lf.category == 'I received bribe').length)
               $('.witness-category').text(locations.filter(lf => lf.category == 'I witness bribe').length)

	      			 drawMap(locations)


	      		},
	      		error: function(res){

	      			console.log(res);
	      		},
	      	});
      	})

      	

      	

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: {lat: 9.180, lng: 7.170}
        });

        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers ;

        // Add a marker clusterer to manage the markers.
        //var markerCluster = new MarkerClusterer(map, markers,
            //{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

        var markerCluster;

        function drawMap(locations){

          $('.main-row').html("");

          console.log(locations)

      		 var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

  			 for(var i = 0; i < locations.length; i++){

  			 	locations[i]['lat'] = parseFloat(locations[i]['lat'] )
  			 	locations[i]['lng'] = parseFloat(locations[i]['lng'] )

          //$('.main-row').append(bribeList(locations[i]))
  			 }



         


  			 markers = locations.map(function(location, i) {
		          return new google.maps.Marker({
		            position: location,
		            label: labels[i % labels.length]
		          });
		        });

         console.log(markers.length);

	        // Add a marker clusterer to manage the markers.
	        markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      	}

        function drawMap2(locations){

          $('.main-row').html("");

          console.log(locations)

           var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

         for(var i = 0; i < locations.length; i++){

          locations[i]['lat'] = parseFloat(locations[i]['lat'] )
          locations[i]['lng'] = parseFloat(locations[i]['lng'] )

          //$('.main-row').append(bribeList(locations[i]))
         }



         


         markers = locations.map(function(location, i) {
              return new google.maps.Marker({
                position: location,
                label: labels[i % labels.length]
              });
            });

         console.log(markers.length);

          // Add a marker clusterer to manage the markers.
          markerCluster.addMarkers(markers) 
        }

        $(document).ready(function(){

          $('.category-filter').click(function(){

            console.log('clicked')
            markers = [];
            markerCluster.clearMarkers();
            

            drawMap2(locations.filter(lf => lf.category == $(this).attr('value')))
          })

          $('.all-category-filter').click(function(){

            markers = [];
            markerCluster.clearMarkers();
            

            drawMap2(locations)
          })
        })
      }

      

      function bribeList(data){

        var text = `

       

          
            <div class="container" style=" border-radius: 5px;">

              <div class="card  mb-3" style="width: 100%;">
                <div class="card-header">` + data.category + `<span class="float-right">Amount ₦` + data.amount + `</span></div>
                <div class="card-body">
                  <h4 class="card-title">` + data.name_of_company + `</h4>
                  <p class="card-text">` + data.description + `</p>

                  <br>

                  <a href="singleview.php?id=` + data.id + `" target="bribery"  style="float: right; color: ;">Read More</a>

                  <small ><i class="mdi mdi-map-marker"></i> ` + data.city + ` &emsp; <i class="mdi mdi-clock"></i> ` + data.date + ` &emsp; <i class="mdi mdi-cash"></i> ` + data.form_of_bribe + ` &emsp; <i class="mdi mdi-comment"></i> ` + data.comment + ` &emsp; <i class="mdi mdi-eye"></i> ` + data.view + `</small>
                </div>

                
              </div>

              
            </div>
          
        `;

          return text;
      }


      var locations = [
        {lat: -31.563910, lng: 147.154312},
        {lat: -33.718234, lng: 150.363181},
        {lat: -33.727111, lng: 150.371124},
        {lat: -33.848588, lng: 151.209834},
        {lat: -33.851702, lng: 151.216968},
        {lat: -34.671264, lng: 150.863657},
        {lat: -35.304724, lng: 148.662905},
        {lat: -36.817685, lng: 175.699196},
        {lat: -36.828611, lng: 175.790222},
        {lat: -37.750000, lng: 145.116667},
        {lat: -37.759859, lng: 145.128708},
        {lat: -37.765015, lng: 145.133858},
        {lat: -37.770104, lng: 145.143299},
        {lat: -37.773700, lng: 145.145187},
        {lat: -37.774785, lng: 145.137978},
        {lat: -37.819616, lng: 144.968119},
        {lat: -38.330766, lng: 144.695692},
        {lat: -39.927193, lng: 175.053218},
        {lat: -41.330162, lng: 174.865694},
        {lat: -42.734358, lng: 147.439506},
        {lat: -42.734358, lng: 147.501315},
        {lat: -42.735258, lng: 147.438000},
        {lat: -43.999792, lng: 170.463352}
      ]
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdXkxQvFKGmUrizW5XdUbhRpismSKytYw&callback=initMap">
    </script>

<?php require_once 'foot.php'; ?>