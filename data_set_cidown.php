<?php 
include("connector.php");
	$nombre = utf8_decode($_GET["nombre"]); 
	header('Content-Type: text/html; charset=UTF-8');
	 
	$conexion = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_DATABASE);
	mysql_set_charset('utf8');
                                
            if (mysqli_connect_errno()) {
                echo "Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error();
            }else{                                
                $result = mysqli_query($conexion,"SELECT * FROM directorio_cidown WHERE nombre='$nombre'");            
            while($row = mysqli_fetch_array($result)){ ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cidown</title>
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
		<h2 class="left logo white-text"><?php if($row["deleg"] == "No aplica"){echo utf8_encode($row["estado"]);}else{echo utf8_encode($row["deleg"]);} ?></h2>
	</div>
	<nav>
    <div class="nav-wrapper purple darken-3">
      <a href="index.html" class="brand-logo"><i class="material-icons left">arrow_back</i>Directorio</a>
    </div>
  </nav>
	    <ul id="fixed" class="section table-of-contents left hide-on-small-only">
	        <li><a href="#institucion">Institución</a></li>
	        <li><a href="#contacto">Contacto</a></li>
	        <li><a href="#pob_atiende">Población</a></li>
	        <li><a href="#serv_pro">Servicios</a></li>
	        <li><a href="#redes">Redes Sociales</a></li>
	    </ul>				
			<div class="container">
				<div class="container">
					<div class="card">
			    	<div class="card-content section scrollspy" id="institucion">
				      <span class="card-title activator red-text text-darken-4">Institución</span>
				      <div class="purple divider"></div>
				      <p><?php echo utf8_encode($row["nombre"]) ?></p>
				      <span class="card-title activator red-text text-darken-4">Dirección</span>
				      <p><?php echo utf8_encode($row["direccion"]) ?></p>
				      <span class="card-title activator red-text text-darken-4">Código postal</span>
				      <p><?php echo $row["cp"]?></p>
				      <span class="card-title activator red-text text-darken-4">Estado</span>
				      <p><?php echo utf8_encode($row["estado"]) ?></p>
				      <span class="card-title activator red-text text-darken-4">Delegación</span>
				      <p><?php echo utf8_encode($row["deleg"]) ?></p>
				      <span class="card-title activator red-text text-darken-4">Municipio</span>
				      <p><?php echo utf8_encode($row["municipio"]) ?></p>
				      <span class="card-title activator red-text text-darken-4">Fecha de fundación</span>
				      <p><?php echo utf8_encode($row["fecha_leg"]) ?></p>
				    </div>
			    </div>
				<div class="card">
			    	<div class="card-content section scrollspy" id="contacto">
				      <span class="card-title activator red-text text-darken-4">Teléfonos</span>
				      <div class="purple divider"></div>
				      <p><?php echo $row["tel1"] ?></p>
				      <p><?php echo $row["tel2"] ?></p><br>
				      <span class="card-title activator red-text text-darken-4">Correo electrónico</span>
				      <div class="purple divider"></div>
				      <p><?php echo $row["email1"] ?></p>
				      <p><?php echo $row["email2"] ?></p><br>
				    </div>
			    </div>
				<div class="card">
			    	<div class="card-content section scrollspy" id="pob_atiende">
				      <span class="card-title activator red-text text-darken-4">Población que atiende</span>
				      <div class="purple divider"></div>
				      <p><?php echo utf8_encode($row["pob_atiende"]) ?></p>
				    </div>
			    </div>
			    <div class="card">
			    	<div class="card-content section scrollspy" id="serv_pro">
				      <span class="card-title activator red-text text-darken-4">Servicios que proporciona</span>
				      <div class="purple divider"></div>
				      <p><?php echo utf8_encode($row["serv_pro"]) ?></p>
				    </div>
			    </div>
			    <div class="card">
			    	<div class="card-content section scrollspy" id="redes" >
				      <span class="card-title activator red-text text-darken-4">Redes Sociales</span>
				      <div class="purple divider"></div>
				      <span class="card-title activator red-text text-darken-4">Web</span>
				      <p><?php if($row["web"] == 'No aplica'){ ?>No aplica <?php }else{ ?> <a  target="blank" href="<?php echo $row['web']?>">Ir a pagina Web</a> <?php } ?></p>
				      <span class="card-title activator red-text text-darken-4">Facebook</span>
				      <p><?php if($row["facebook"] == 'No aplica'){ ?>No aplica <?php }else{ ?> <a  target="blank" href="<?php echo $row['facebook']?>">Ir a Facebook</a> <?php } ?></p>
				      <span class="card-title activator red-text text-darken-4">Twitter</span>
				      <p><?php if($row["twitter"] == 'No aplica'){ ?>No aplica <?php }else{ ?> <a  target="blank" href="<?php echo $row['twitter']?>">Ir a Twitter</a> <?php } ?></p>
				      
				    </div>
			    </div>
			    <div class="center hide-on-small-only">
			    	<a href="#inicio" class="waves-effect waves-light btn red darken-5"><i class="material-icons left">expand_less</i>Subir página</a>
			    </div>
				</div><!--Final de 2do container-->
			</div><!--Final de 1er container-->

			<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    			  <a <?php if($row['lat'] == "No aplica" || $row['lng'] == "No aplica"){ ?> onclick="Materialize.toast('Cidown no cuenta con las coordenadas de la Institución.', 5000, 'rounded')"<?php }else{ ?>href="cidown_maps.php?latitud=<?php echo $row['lat'] ?>&amp;longitud=<?php echo $row['lng'] ?>" <?php } ?> class="btn-floating btn-large waves-effect waves-light red darken-5"><i class="material-icons">pin_drop</i></a>
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