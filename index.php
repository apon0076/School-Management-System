<?php include 'header&footer/header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Alliance Francaise</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <style>
	      .container {width: 100%;
	              margin: 0;
	              padding: 0;}
	      #carouselExampleIndicators
	      {
	        width: 118%;
	        margin: 0;
	        padding: 0;
	      }
	    
	    </style>
</head>

<body>
	<div class="container">

	      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	        <ol class="carousel-indicators">
	          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	        </ol>
	        <div class="carousel-inner">
	          <div class="carousel-item active">
	            <img class="d-block w-100" src="photos/slider1.jpg" alt="First slide">
	          </div>
	          <div class="carousel-item">
	            <img class="d-block w-100" src="photos/slider2.jpg" alt="Second slide">
	          </div>
	          <div class="carousel-item">
	            <img class="d-block w-100" src="photos/slider3.jpg" alt="Third slide">
	          </div>
	        </div>
	        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	          <span class="sr-only">Previous</span>
	        </a>
	        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	          <span class="carousel-control-next-icon" aria-hidden="true"></span>
	          <span class="sr-only">Next</span>
	        </a>
	      </div>
	    
	    </div>
</body>

</html>
<?php include 'header&footer/footer.php';?>