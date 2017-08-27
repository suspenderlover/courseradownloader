<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

?>
<html>
    <head>
        <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl?>/js/jquery-1.9.1.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!-- Updated stylesheet url -->
        <link rel="stylesheet" href="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.css">

        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>

        <!-- Updated JavaScript url -->
        <script src="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl?>/js/cinestar/kickstart.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl?>/js/cinestar/main.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl?>/css/cinestar/kickstart.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl?>/css/cinestar/style.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl?>/css/cinestar/custom.css" media="all" /> 
        
        <meta charset="UTF-8">
        
        <title></title>
    </head>
    <body>
       <div class="layout1000">
	
	<!-- Start Header -->
		<div class="col_3">
			<div class="logo"></div>
		</div>
	
		<div class="col_12">
			<!-- Menu Horizontal -->
			<ul class="menu">
				<li><a>Now Showing</a>
					<ul>
					<li><a href="<?php echo Yii::app()->request->baseUrl?>/index.php/Admin/MovieList">Movies List</a></li>
					<li><a href="<?php echo Yii::app()->request->baseUrl?>/index.php/Admin/MovieOrder">Set Movie Order</a></li>
					<li class="divider"></li>
					<li><a href="<?php echo Yii::app()->request->baseUrl?>/index.php/Admin/AddMovie1">Add New Movie</a></li>
					</ul>
				</li>

				<li><a>Upcoming Movies</a>
					<ul>
					<li><a href="<?php echo Yii::app()->request->baseUrl?>/index.php/Admin/UpcomingMovieList">Upcoming Movies List</a></li>
					<li class="divider"></li>
					<li><a href="<?php echo Yii::app()->request->baseUrl?>/index.php/Admin/UpcomingMovie">Add Upcoming Movie</a></li>
					</ul>
				</li>

				<li><a>Gallery</a>
					<ul>
					<!--<li><a href="<?php //echo Yii::app()->request->baseUrl?>/index.php/Admin/Gallery">Folder List</a></li>-->
					<li class="divider"></li>
					<li><a href="<?php echo Yii::app()->request->baseUrl?>/index.php/Admin/AddNewFolder">Album List</a></li>
					</ul>
				</li>

				<li><a>Movies Schedule</a>
					<ul>
                                           <?php
                                       $locations=Yii::app()->session['locations'];
                                        for($i=0;$i<count($locations);$i++){
                                            echo '<li><a href="'. Yii::app()->request->baseUrl.'/index.php/Admin/CinemaxLahore?locationid='.$locations[$i]['id'].'">'.$locations[$i]['location_name'].'</a></li>';
                                            
                                        }
                                        ?> 
					
					</ul>
				</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl?>/index.php/Admin/CsvFile">Sms Subscriber List</a>
					
				</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl?>/index.php/Admin/FetchUsers">Add New User</a>
					
				</li>
				<li class="right"><a  href="<?php echo Yii::app()->request->baseUrl?>/index.php/Admin/Logout">Logout</a></li>

			</ul>
		
		</div>
	<!-- End Header -->
	
	<!-- Start Movie List -->
		
	<!-- End Movie List -->
        <?php echo $content; ?>

	</div>
        
    </body>
</html>
