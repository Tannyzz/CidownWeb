<?php 
	header('Content-Type: text/html; charset=UTF-8');
	include('connector.php');
	$latitud = $_GET['latitud'];
	$longitud = $_GET['longitud'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cidown Maps</title>
	<link rel="shortcut icon" href="ico-cidown.ico">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<meta content="text/html;" http-equiv="content-type" charset="utf-8"/>
  	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
    <link rel="stylesheet" type="text/css" href="font/naveli.css">    
    <script src="http://maps.googleapis.com/maps/api/js"></script>

	<script type="text/javascript">
	<?php $conexion = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_DATABASE);
			mysql_set_charset('utf8');
                                
            if (mysqli_connect_errno()) {
                echo "Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error();
            }else{                                
                $result = mysqli_query($conexion,"SELECT * FROM directorio_cidown WHERE lat='$latitud' && lng='$longitud'");            
            while($row = mysqli_fetch_array($result)){ ?>

		var myCenter=new google.maps.LatLng(<?php echo $row['lat']  ?>,<?php echo $row['lng'] ?>); 

		function initialize()
		{
		var mapProp = {
		  center:myCenter,
		  zoom:17,
		  mapTypeId:google.maps.MapTypeId.ROADMAP
		  };

		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

		var marker=new google.maps.Marker({
		  position:myCenter,
		  });

		marker.setMap(map);

		var infowindow = new google.maps.InfoWindow({
		  content:"<?php echo utf8_encode($row['nombre']).'<br>'.utf8_encode($row['direccion']) ?>" 
		  });

		infowindow.open(map,marker);
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	
</head>
<body>

	<div class="header-md purple darken-1 hide-on-small-only section scrollspy" id="inicio">
		<img src="images/logocidown.png" class="left logo responsive-img" height="150px" width="150px">
		<h2 class="left logo white-text"><?php if($row["deleg"] == "No aplica"){echo utf8_encode($row["estado"]);}else{echo utf8_encode($row["deleg"]);}?></h2>
	</div>
	<nav>
    <div class="nav-wrapper purple darken-3">
      <a href="data_set_cidown.php?nombre=<?php echo utf8_encode($row['nombre']); }}?>" class="brand-logo"><i class="material-icons left">arrow_back</i>Institución</a>
    </div>
  </nav>
	<div id="googleMap" style="width:100%;height:500px;"></div>

	<footer class="page-footer purple darken-2">
          <div class="container">
          <div class="row center">
          		<div class="col s12 m4 l4"><h6 align="left" class="white-text">Apoyado por:</h6><img width="160px" height="10px" class="img-uacm responsive-img" src="images/logos/logo-uacm.png">
          		<div class="row">
							<div class="col s12">
								<a href="http://www.uacm.edu.mx" class="waves-effect waves-light btn-flat white-text" target="blank"><i class="material-icons left">public</i>Web UACM</a>
							</div>
						</div>

					
          		</div>
          		<div class="col s12 m4 l4"><h6 align="left" class="white-text">Desarrolladores:</h6><img width="220px" height="100px" class="img-moba responsive-img" src="images/logos/logo-moba.png">
								<div class="row">
							<div class="col s3 m3 l3"><p></p></div>						
							<div class="col s3 m3 l3"><a target="blank" href="https://facebook.com/mobauacm"><img height="60px" width="60px" class="responsive img" src="images/logos/facebook.png"></a></div>
							<div class="col s3 m3 l3"><a target="blank" href="https://www.twitter.com/mobauacm"><img height="60px" width="60px" class="responsive-img" src="images/logos/twitter.png"></a></div>
								<div class="col s3 m3 l3"><p></p></div>
						</div>
          		</div>
          		<div class="col s12 m4 l4"><h6 align="left" class="white-text">Powered by:</h6><img width="220px" height="100px" class="img-nav responsive-img" src="images/logos/logo-naveli.png">
						<div class="row">
							<div class="col s3 m3 l3"><p></p></div>						
							<div class="col s3 m3 l3"><a target="blank" href="https://facebook.com/navelimx"><img height="60px" width="60px" class="responsive img" src="images/logos/facebook.png"></a></div>
							<div class="col s3 m3 l3"><a target="blank" href="https:/www.twitter.com/naveli_mx"><img height="60px" width="60px" class="responsive-img" src="images/logos/twitter.png"></a></div>
								<div class="col s3 m3 l3"><p></p></div>
						</div>
          		</div>
          	</div>
            
          </div>
          <div class="footer-copyright">
          	<div class="container">
            © 2015 <span class="hide-on-small-only">Centro de Información a Favor de las Personas con Síndrome de Down - </span>Cidown
            </div>
          </div>
        </footer>
</body>
</html>