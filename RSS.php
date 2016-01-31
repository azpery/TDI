   
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
    						<li>
    							<a href="td2.php"><i class="fa fa-bar-chart-o fa-fw"></i>TD2 XML</a>

    							<!-- /.nav-second-level -->
    						</li>
    						<li>
                                <a href="RSS.php"><i class="fa fa-bar-chart-o fa-fw"></i>TD2 RSS</a>

                                <!-- /.nav-second-level -->
                            </li>
    					</ul>
    				</div>
    				<!-- /.sidebar-collapse -->
    			</div>
    			<!-- /.navbar-static-side -->
    		</nav>
    		<div id="page-wrapper">
    		<button class="btn btn-error" id="export">Exporter la base en XML</button>
    			<div class="row">
    				<div class="col-lg-12">
    					<h1 class="page-header">FLUX RSS</h1>
    				</div>
    				<!-- /.col-lg-12 -->
    			</div>
    			<div class="row" id="body">
    				
    			</div>
    		</div>
    		<!-- jQuery -->
    		<script src="./bower_components/jquery/dist/jquery.min.js"></script>

    		<!-- Bootstrap Core JavaScript -->
    		<script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="./js/tp2.js"></script>
    		<!-- Metis Menu Plugin JavaScript -->
    		<script src="./bower_components/metisMenu/dist/metisMenu.min.js"></script>

    		<!-- Morriss JavaScript -->



    		<!-- Custom Theme JavaScript -->
    		<script src="./dist/js/sb-admin-2.js"></script>

    	</body>

    	</html>
