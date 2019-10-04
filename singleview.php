<?php
	require_once 'header.php';

	$queryBuilder = $conn;

	$array = [];
  $viewcount = 0;


  	$item = $queryBuilder->fetchAssoc("SELECT * FROM wp_bribery_report WHERE id=?", array($_GET['id']));

    $count = $queryBuilder->fetchAssoc("SELECT * FROM wp_bribery_view WHERE wp_bribery_report_id=?", array($_GET['id']));

   

      if(!empty($count)){

        $viewcount = $count['count'];

        if(count($_POST) < 1)
          $queryBuilder->update("wp_bribery_view", ['count' => ($count['count']+1)], ['wp_bribery_report_id' => $_GET['id']]);
      }else {

        $queryBuilder->insert("wp_bribery_view", ['wp_bribery_report_id' => $_GET['id'], 'count' => 1]);
      }
    
    

  	$cord = json_encode($array, JSON_PRETTY_PRINT);

    if(count($_POST) > 1){

      $_POST['wp_bribery_report_id'] = $_GET['id'];

      $queryBuilder = $conn;

      $_POST['date'] = date('d/m/Y H:i:s');

      $queryBuilder->insert('wp_bribery_comment', $_POST);

      echo '

        <script type="text/javascript">alert("submission successful");</script>';
    }

    $comments = $queryBuilder->fetchAll("SELECT * FROM wp_bribery_comment WHERE wp_bribery_report_id=? ORDER BY id DESC", array($_GET['id']));

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


<hr>

<div class="container" >

  <div class="card mb-3">
  <h3 class="card-header"><?php echo $item['category'];?> <span class="float-right">Amount ₦<?php echo $item['amount']?> </span></h3>

 
  <div class="card-body">

    <h5 class="card-title">Description</h5>
    <p class="card-text"><?php echo $item['description'];?></p>

    <br><br>
    <h5 class="card-title text-muted">Other Information</h5>
    <table class="table">

      <tr>
        <td>Name of the accused person</td>
        <td><?php echo $item['name_of_accused']?></td>
      </tr>
       <tr>
        <td>Name of the bribery reporter</td>
        <td><?php echo $item['name_of_reporter']?></td>
      </tr>
       <tr>
        <td>Name of Company, Organisation, Ministry, Department, Agency, Institution</td>
        <td><?php echo $item['name_of_company']?></td>
      </tr>
       <tr>
        <td>Sector</td>
        <td><?php echo empty($item['sector'])? $item['other_sector'] : $item['sector']?></td>
      </tr>
       <tr>
        <td>Form of bribe</td>
        <td><?php echo $item['form_of_bribe']?></td>
      </tr>

      <tr>
        <td>Currency</td>
        <td><?php echo $item['currency']?></td>
      </tr>
    </table>
  </div>



  <div class="card-footer text-muted">
    <i class="mdi mdi-map-marker"></i> <?php echo $item['city']; ?> &emsp; <i class="mdi mdi-clock"></i> <?php echo $item['date']; ?> &emsp;   <i class="mdi mdi-comment"></i> <?php echo count($comments); ?>  &emsp; <i class="mdi mdi-eye"></i>  <?php echo $viewcount; ?> 
  </div>
</div>




<br>




<h3>Comments</h3>
<hr>

<?php foreach($comments as $comment): ?>

  <h5>Name: <span class="text-muted"><?php echo empty($comment['name'])?'Anonymous':$comment['name']; ?></span></h5>
  Email: <i><span class="text-muted"><?php echo $comment['email']; ?></i></span>
  <p>Comment: <span class="text-muted"><?php echo $comment['comment']; ?></span></p>
  <p><small><i class="mdi mdi-clock"></i> <?php echo $comment['date']; ?></small></p>
  <hr>

<?php endforeach; ?>
<div class="alert alert-primary"><h2>Post Comment</h2></div>

<div class="col-12">

  <form method="post" action="">

    

    <div class="row">

      <div class="col-sm-12">

        <div class="col-sm">

          <div class="form-group ">
              <label for="staticEmail" class="form-label">Comment</label>
              
              <textarea type="text" class="form-control" id="staticEmail"  name="comment" required></textarea>
              
          </div>

        </div>

        <br>

      </div>

      <div class="col-sm-6">

        <div class="col-sm">

          <div class="form-group ">
              <label for="staticEmail" class="form-label">Name </label>
              
              <input type="text" class="form-control" id="staticEmail" name="name" >
              
          </div>

        </div>

        <br>

      </div>

      <div class="col-sm-6">

        <div class="col-sm">

          <div class="form-group ">
              <label for="staticEmail" class="form-label">Email</label>
              
              <input type="email" class="form-control" id="staticEmail"  name="email" >
              
          </div>

        </div>

        <br>

        
      </div>

      <div class="col-sm-12">

        <button class="btn btn-primary" type="submit">Post comment</button>

      </div>

      
    </div>

    

  </form>
</div>

<style type="text/css">
  
  .p{

    margin: 0px -.85rem 0px -1.25rem;
  }
</style>
    <script>



      function initMap() {

      	
      	var uluru = {lat: parseFloat("<?php echo $item['lat']?>"), lng: parseFloat("<?php echo $item['lon']?>")};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 8, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
      	}
      



    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdXkxQvFKGmUrizW5XdUbhRpismSKytYw&callback=initMap">
    </script>

<?php require_once 'foot.php'; ?>

<html>
<head></head>
<body>

<div id="pieChart"></div>

<script src="//cdnjs.cloudflare.com/ajax/libs/d3/4.7.2/d3.min.js"></script>
<script src="https://raw.githubusercontent.com/benkeen/d3pie/0.2.1/d3pie/d3pie.min.js"></script>
<script>
var pie = new d3pie("pieChart", {
  "header": {
    "title": {
      "text": "OGP Pledges",
      "fontSize": 24,
      "font": "open sans"
    },
    "subtitle": {
      "text": "Pledges progress",
      "color": "#999999",
      "fontSize": 12,
      "font": "open sans"
    },
    "titleSubtitlePadding": 9
  },
  "footer": {
    "color": "#999999",
    "fontSize": 10,
    "font": "open sans",
    "location": "bottom-left"
  },
  "size": {
    "canvasWidth": 590,
    "pieOuterRadius": "90%"
  },
  "data": {
    "sortOrder": "random",
    "content": [
      {
        "label": "Complete",
        "value": 67706,
        "color": "#470400"
      },
      {
        "label": "Underway",
        "value": 36344,
        "color": "#510600"
      },
      {
        "label": "Pending",
        "value": 32170,
        "color": "#5c0502"
      },
      {
        "label": "Overdue",
        "value": 7000,
        "color": "#3b0300"
      }
    ]
  },
  "labels": {
    "outer": {
      "format": "label-value1",
      "pieDistance": 39
    },
    "inner": {
      "format": "label-value1",
      "hideWhenLessThanPercentage": 3
    },
    "mainLabel": {
      "font": "open sans",
      "fontSize": 14
    },
    "percentage": {
      "color": "#ffffff",
      "decimalPlaces": 0
    },
    "value": {
      "color": "#adadad",
      "font": "open sans",
      "fontSize": 13
    },
    "lines": {
      "enabled": true
    },
    "truncation": {
      "enabled": true
    }
  },
  "tooltips": {
    "enabled": true,
    "type": "placeholder",
    "string": "{label}: {value}, {percentage}%",
    "styles": {
      "fontSize": 17
    }
  },
  "effects": {
    "pullOutSegmentOnClick": {
      "effect": "linear",
      "speed": 400,
      "size": 8
    }
  },
  "misc": {
    "gradient": {
      "enabled": true,
      "percentage": 100
    }
  }
});
</script>

</body>
</html>