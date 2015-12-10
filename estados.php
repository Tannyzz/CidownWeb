<?php 	 
	header('Content-Type: text/html; charset=UTF-8');
	$estado = utf8_decode($_GET["estado"]);
	include("connector.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Instituciones</title>
	<link rel="shortcut icon" href="ico-cidown.ico">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<meta content="text/html;" http-equiv="content-type" charset="utf-8"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
    <link rel="stylesheet" type="text/css" href="font/naveli.css">
</head>
<body>

	<div class="header-md purple darken-1 hide-on-small-only section scrollspy" id="inicio">
			<img src="images/logocidown.png" class="left logo responsive-img" height="150px" width="150px">
			<h2 class="left logo white-text"><?php echo utf8_encode($estado) ?></h2>
		</div>
		<nav>
		    <div class="nav-wrapper purple darken-3">
		      <a href="index.html" class="brand-logo"><i class="material-icons left">arrow_back</i>Directorio</a>
	    	</div>
    	</nav>
    	<!--Boton flotante-->
    	<div class="fixed-action-btn" id="boton" style="bottom: 45px; right: 24px;" class="row container">
			<a class="btn-floating btn-large red darken-5"><i class="material-icons">add</i></a>
			   <ul>
				      <li><a target="blank" href="http://www.twitter.com/uacm_cidown" class="btn-floating light-blue"><img style="padding-top: 5px; height:30px; wigth=30px" src="images/twitter.png"></a></li>
				      <li><a target="blank" href="https://www.facebook.com/uacm.cidown" class="btn-floating blue darken-4"><img style="height:35px; wigth=35px" src="images/facebook.png" ></a></li>
			    </ul>
		</div>



    	<?php 
	 
	$conexion = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_DATABASE);
	@mysql_query("SET NAMES 'utf8'",$conexión);
                                
            if (mysqli_connect_errno()) {
                echo "Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error();
            }else{                                
                $result = mysqli_query($conexion,"SELECT * FROM directorio_cidown WHERE estado='$estado'");            
            while($row = mysqli_fetch_array($result)){ ?>
					<div class="container">
						<div class="container">
							<div class="card">
						    	<div class="card-content section scrollspy" id="contacto">
							      <span class="card-title activator red-text text-darken-4">Institución
								      <a href="data_set_cidown.php?nombre=<?php echo utf8_encode($row["nombre"]) ?>" class="secondary-content">
								      <i class="material-icons red-text">send</i></a>
								   </span>
							      <div class="purple divider"></div>
							      <p><?php echo utf8_encode($row["nombre"]) ?></p>
							      
							    </div>
					    	</div>
				    	</div>
			    	</div>



            <?php }
            } ?>

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
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/cdwn.js"></script>

</body>
</html>