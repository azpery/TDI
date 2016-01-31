   
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>TP1 - IHM</title>

	<!-- Bootstrap Core CSS -->
	<link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="./bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	<!-- Timeline CSS -->
	<link href="./dist/css/timeline.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="./dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Morris Charts CSS -->
	<link href="./bower_components/morrisjs/morris.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="./bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

    	<div id="wrapper">

    		<!-- Navigation -->
    		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    			<div class="navbar-header">
    				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    					<span class="sr-only">Toggle navigation</span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    				</button>
    				<a class="navbar-brand" href="index.html">TP1 - IHM</a>
    			</div>
    			<!-- /.navbar-header -->


    			<!-- /.navbar-top-links -->

    			<div class="navbar-default sidebar" role="navigation">
    				<div class="sidebar-nav navbar-collapse">
    					<ul class="nav" id="side-menu">
    						<li class="sidebar-search">
    							<div class="input-group custom-search-form">
    								<input type="text" class="form-control" placeholder="Search...">
    								<span class="input-group-btn">
    									<button class="btn btn-default" type="button">
    										<i class="fa fa-search"></i>
    									</button>
    								</span>
    							</div>
    							<!-- /input-group -->
    						</li>
    						<li>
    							<a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Les modèles</a>
    						</li>
    						<li>
    							<a href="ajoutVehicule.php"><i class="fa fa-bar-chart-o fa-fw"></i> Ajouter véhicule</a>

    							<!-- /.nav-second-level -->
    						</li>
    						
    					</ul>
    				</div>
    				<!-- /.sidebar-collapse -->
    			</div>
    			<!-- /.navbar-static-side -->
    		</nav>
    		<div id="page-wrapper">
    			<div class="row">
    				<div class="col-lg-12">
    					<h1 class="page-header">Ajout d'un véhicule</h1>
    				</div>
    				<!-- /.col-lg-12 -->
    			</div>
    			<div class="row">
    				<div class="col-md-12">
                        <form  id="add">
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Propriétaire</div>
                                    <div class="panel-body">
                                        <div class="form-group" >
                                            <label for="exampleInputEmail1">Nom</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Jakie" name="nom">
                                        </div>
                                        <div class="form-group" >
                                            <label for="exampleInputEmail1">Prénom</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="michel" name="prenom">
                                        </div>
                                        <div class="form-group" >
                                            <label for="exampleInputEmail1">Adresse</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="2 rue des michels" name="adresse">
                                        </div>
                                        <div class="form-group" >
                                            <label for="exampleInputEmail1">Ville</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="monqu" name="ville">
                                        </div>
                                        <div class="form-group" >
                                            <label for="exampleInputEmail1">Code postal</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="44000" name="cp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Modèle</div>
                                    <div class="panel-body">

                                        <div class="checkbox">
                                          <label>
                                              <input type="checkbox" value=""role="button" href="#carousel-example-generic" data-slide="next">
                                              Créer un nouveau modèle
                                          </label>
                                      </div>
                                      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active">
                                              <select class="form-control" name="id_modele">
                                                <?php
                                                include_once "db_functions.php";
                                                $function = (new DB_Functions())->useConnexion(); 
                            //print_r($function->get_enum_values( "modele", "carburant" ));
                                                $result = $function->getQuery("SELECT * FROM modele");
                                                $table ="";
                                                foreach ($result as $value){
                                                    $table.= "<option value=".$value["id_modele"].">".$value["modele"]."</td>";
                                                }
                                                echo $table;
                                                ?>
                                            </select>
                                            <select class="form-control" name="carburant">
                                                <option value="diesel">diesel</option>
                                                <option value="essence">essence</option>
                                                <option value="gpl">gpl</option>
                                                <option value="électrique">électrique</option>

                                            </select>
                                        </div>
                                        <div class="item">
                                            <div class="form-group" >
                                                <label for="exampleInputEmail1">Code modèle</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="E345564fd5" name="codeVoiture">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Nom voiture</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Picasso" name="nomVoiture">
                                            </div>
                                            <select class="form-control" name="carburant">
                                                <option value="diesel">diesel</option>
                                                <option value="essence">essence</option>
                                                <option value="gpl">gpl</option>
                                                <option value="électrique">électrique</option>

                                            </select>
                                        </div>
                                        ...
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Imatriculation</div>
                            <div class="panel-body">
                                <div class="form-group" >
                                    <label for="exampleInputEmail1">numéro d'immatriculation</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="23-DC-34" name="na">
                                </div>
                                <select class="form-control" name="couleur">
                                    <option value="claire">claire</option>
                                    <option value="moyenne">moyenne</option>
                                    <option value="foncée">foncée</option>
                                </select>
                                <div class="form-group" >
                                    <label for="exampleInputEmail1">Date première immatriculation</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="AAAA-MM-JJ" name="dateimmat">
                                </div>
                                <div class="form-group" >
                                    <label for="exampleInputEmail1">Date carte grise</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="AAAA-MM-JJ" name="datecg">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <button class="btn btn-success col-md-12" id="ajouter">Ajouter</button>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="./bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./js/tpI.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="./bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Morriss JavaScript -->



<!-- Custom Theme JavaScript -->
<script src="./dist/js/sb-admin-2.js"></script>

</body>

</html>
