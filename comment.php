
<?php 

require_once 'header.php';



  if(count($_POST) > 1){

  	

  	$city = $_POST['city'];

  	$aCity = explode('-', $city);
  	$cord = explode(',', $aCity[1]);
  	$_POST['lat'] = $cord[0];
  	$_POST['lon'] = $cord[1];
  	$_POST['city'] = $aCity[0];

  	//print_r($_POST);

  	$queryBuilder = $conn;

  	$queryBuilder->insert('wp_bribery_report', $_POST);

    echo '<div class="alert alert-success">  submission successful</div>

      <script type="text/javascript">alert("submission successful");</script>';
  }

?>

<div class="col-12">

	<form method="post" action="">

		

		<div class="row">

			<div class="col-sm-6">

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

			<div class="col-sm-12">

				<div class="col-sm">

					<div class="form-group ">
					    <label for="staticEmail" class="form-label">Email</label>
					    
					    <input type="email" class="form-control" id="staticEmail"  name="email" >
					    
					</div>

				</div>

				<br>
			</div>



			
		</div>

	</form>
</div>	

<script type="text/javascript">
	
	$('.select2').select2( {
				placeholder: 'Select city',
				//width: '100%',
				//containerCssClass: ':all:'
			} );

	$('.select2sector').select2( {
				placeholder: 'Select sector',
				//width: '100%',
				//containerCssClass: ':all:'
			} );

  $('.select2currency').select2( {
        placeholder: 'Currency',
        //width: '100%',
        //containerCssClass: ':all:'
      } );

	$('.date').datetimepicker({format: 'DD/MM/YYYY'});
</script>
<?php

	require_once 'foot.php';
?>