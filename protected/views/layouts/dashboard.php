<!doctype html>

<html class="no-js">
<!--<![endif]-->

<head>
    <!--link rel="shortcut icon" type="image/ico" href="<?php echo Yii::app()->request->baseUrl?>/css/images/favicon.ico" /-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Time Keeping System ::</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<?php header("Expires: Sat, 01 Jan 2015 00:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: post-check=0, pre-check=0",false);
session_cache_limiter("must-revalidate");?>
<!-- Include Bootstrap Minified CSS-->


<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/bootstrap.css?version=<?php echo TKSConstants::VERSION; ?>">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/fontawesome.css?version=<?php echo TKSConstants::VERSION; ?>">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/charcount.css?version=<?php echo TKSConstants::VERSION; ?>">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/custom.css?version=<?php echo TKSConstants::VERSION; ?>">
 <link href="<?php echo Yii::app()->request->baseUrl?>/spellcheck/css/jquery.spellchecker.css?version=<?php echo TKSConstants::VERSION; ?>" rel="stylesheet" />
  <link href="<?php echo Yii::app()->request->baseUrl?>/css/bootstrap-timepicker.min.css?version=<?php echo TKSConstants::VERSION; ?>" type="text/css" rel="stylesheet" />
<!--[if lt IE 8]>
		<link href="<?php echo Yii::app()->request->baseUrl?>/css/bootstrap-ie7.css?version=<?php echo TKSConstants::VERSION; ?>" rel="stylesheet">
<![endif]-->


<!--link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"-->
<!-- / Include Bootstrap Minified CSS-->

<!-- Include Custom CSS-->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/theme.css?version=<?php echo TKSConstants::VERSION; ?>">
<!--  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/js/bootstrap-datetimepicker.min.js">-->
<!-- / Include Custom CSS-->

<!-- Include Java Scripts Libraries -->
    <script>window.jQuery || document.write('<script src="<?php echo Yii::app()->request->baseUrl?>/js/vendor/jquery-1.10.2.min.js?version=<?php echo TKSConstants::VERSION; ?>"><\/script>')</script>
    <!--  <script src="<?php echo Yii::app()->request->baseUrl?>/js/vendor/jquery-1.10.2.min.js"></script> -->
  
    <script src="<?php echo Yii::app()->request->baseUrl?>/js/bootstrap.min.js?version=<?php echo TKSConstants::VERSION; ?>"></script> 
    <!--  <script src="<?php echo Yii::app()->request->baseUrl?>/js/bootstrap-datetimepicker.min.js"></script>--> 

    <!-- / Include Java Scripts -->

<!-- Include Modernizr JS-->
<script src="<?php echo Yii::app()->request->baseUrl?>/js/vendor/modernizr-2.6.2.min.js?version=<?php echo TKSConstants::VERSION; ?>"></script>
<!-- 
<script src="<?php echo Yii::app()->request->baseUrl?>/js/bootstrap.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/bootstrap.min.js"></script>
-->
<script src="<?php echo Yii::app()->request->baseUrl?>/js/utilities.js?version=<?php echo TKSConstants::VERSION; ?>"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/custom.js?version=<?php echo TKSConstants::VERSION; ?>"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/review.js?version=<?php echo TKSConstants::VERSION; ?>"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl?>/js/bootstrap-timepicker.js?version=<?php echo TKSConstants::VERSION; ?>"></script>
<!-- / Include Modernizr JS-->

<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); 
Yii::app()->clientScript->registerCssFile(
        Yii::app()->clientScript->getCoreScriptUrl().
        '/jui/css/base/jquery-ui.css'
);?>
</head>

<body >
    
<!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]--> 

<!-- Site Header -->
<header>

  <div class="row header-bg"> 
    
   
    <div class="container" > 
      
    	<div class="col-lg-4 col-xs-4 col-md-4 logo"> 
    		<img alt="" src="<?php echo Yii::app()->request->baseUrl?>/images/logo.jpg"> 
			  
	 	 </div>
    
	
        <?php 
  		 		$ntlogin = isset(Yii::app()->session[TKSConstants::KEY_NTLOGIN]) ? 
  		 					Yii::app()->session[TKSConstants::KEY_NTLOGIN]:""; 
  		 		$name = isset(Yii::app()->session[TKSConstants::KEY_NAME]) ?
  		 		Yii::app()->session[TKSConstants::KEY_NAME]:"";
  		 		$name = "".trim($name);
  		 		if($name!="")
				{	
  		 			$username =$name;
  		 		}else{
  		 			$username = $ntlogin;	
  		 		}
				  		 		
		?>
	 	 <div class=" col-lg-8 col-xs-8 col-md-8">
						<ul class="list-inline UserTrackLinks ">
						  <li> <a href="<?php echo $this->createUrl('/dashboard/permission') ?>"> <i class="perIco TopMenuIco"></i> Permission form</a> </li>
						  <li> <a href="<?php echo $this->createUrl('/dashboard') ?>"> <i class="userIco TopMenuIco"></i> Welcome <?php echo $username?><i class="downIco TopMenuIco"></i></a> </li>
						</ul>
		</div>
 


    </div>
    <!-- / Include Header--> 
  </div>


  <!-- / Current Date --> 
  <div class="row DateSection">
  			
            <div class="container">
            	
            		
            			
						  		
						
            		
            	
			  <div class="col-lg-12 col-xs-12 col-md-12 text-right">
			  		
			  		
			  		Today <span class="LightColor"><?php echo date('F j, Y');?></span> </div>
			</div>
        </div>      
    </div>
</header>

	<?php echo $content; ?>

	<div class="clear">
	</div>

	<div id="footer">
		
	</div>
        <!-- footer -->



</body>
</html>
 	 