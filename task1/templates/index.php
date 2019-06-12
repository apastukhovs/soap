<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo TITLE; ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>
  <h1 class="bg-primary text-center">Continent Information</h1>
  <div class="container">
    <form action="#" method="post">	
		<button type="submit" name="ListOfContinentsByNameResult" class="btn btn-primary btn-lg btn-block">Get Continet Name</button>
	</form>
	<form action="#" method="post">	
		<div class="form-group">
			<label for="countryCurrency">Country Currency</label>
			<input type="text" class="form-control" id="resultSoapClient" name="resultSoapClient" placeholder="Enter Country ISOCode">
		</div>
	    <button type="submit" name="btnCountryCurrency" class="btn btn-primary">Submit</button>
	</form>
	<?php if($list) : foreach($list as $k => $v) : ?>
	<div><p><b>Country Name:</b> <?php echo $v->sName; ?> <b>Country Code:</b> <?php echo $v->sCode; ?></p></div>
	<?php endforeach; endif; ?>
	<?php if($currency) : ?>
	<div><p><b>Currency:</b> <?php echo $currency; ?></p></div>
	<?php endif; ?>
  </div> 
</body>
</html>