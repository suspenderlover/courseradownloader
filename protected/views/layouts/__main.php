<!doctype html>

<html class="no-js">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<!--link rel="shortcut icon" type="image/ico" href="<?php echo Yii::app()->request->baseUrl?>/css/images/favicon.ico" /-->
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


<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/fontawesome.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/charcount.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/custom.css">
 <link href="<?php echo Yii::app()->request->baseUrl?>/spellcheck/css/jquery.spellchecker.css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl?>/css/bootstrap-timepicker.min.css" type="text/css" rel="stylesheet" />

		<!--link href="<?php echo Yii::app()->request->baseUrl?>/css/bootstrap-ie7.css?version=" rel="stylesheet"-->



<!--link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"-->
<!-- / Include Bootstrap Minified CSS-->

<!-- Include Custom CSS-->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/theme.css">
<!--  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/js/bootstrap-datetimepicker.min.js">-->
<!-- / Include Custom CSS-->

<!-- Include Java Scripts Libraries -->
    <script>window.jQuery || document.write('<script src="<?php echo Yii::app()->request->baseUrl?>/js/vendor/jquery-1.10.2.min.js><\/script>')</script>
    <!--  <script src="<?php echo Yii::app()->request->baseUrl?>/js/vendor/jquery-1.10.2.min.js"></script> -->
  
    <script src="<?php echo Yii::app()->request->baseUrl?>/js/bootstrap.min.js></script> 
   

    <!-- / Include Java Scripts -->

<!-- Include Modernizr JS-->
<script src="<?php echo Yii::app()->request->baseUrl?>/js/vendor/modernizr-2.6.2.min.js"></script>
<!-- 
<script src="<?php echo Yii::app()->request->baseUrl?>/js/bootstrap.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/bootstrap.min.js"></script>
-->
<script src="<?php echo Yii::app()->request->baseUrl?>/js/utilities.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/custom.js"></script>
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
      
    
      <div class="col-lg-5 col-xs-5 col-md-5 logo">
		  <img src="<?php echo Yii::app()->request->baseUrl?>/images/logo.jpg" alt="" />
		<div class="UserInfoBlock">Welcome,
			  <span class="UserName timeColor">
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
				  		 		echo $username;
				  		 	?></span>
	 	      </div>  
	  </div>
<div class=" col-lg-7 col-xs-7 col-md-7 pull-right">
<!-- 				<ul class="list-inline UserTrackLinks "> -->
<!-- <!-- 				  <li> <a href="#"> <i class="TksIco TopMenuIco"></i> My Time Keeping Session(s)</a> </li> --> 
<!-- 				  <li> <a href="#"> <i class="TkhIco TopMenuIco"></i> Historical Time Keeping Session(s)</a> </li> -->
<!-- 				  <li> <a href="#"> <i class="mdIco TopMenuIco"></i> My Dispute(s)</a> </li> -->
<!-- 				</ul> -->
			  <ul class="list-inline UserTrackLinks ">
			  	<li> <a  class="searchRestrictIconDisable addSessionLink"  data-url="<?php echo $this->createUrl('dispute/addSession?user_role=agent') ?>" href=''> <i class="AddSessionIco TopMenuIco"></i> Add Session</a> </li>
			  </ul>
			  </div>
 


    </div>
    <!-- / Include Header--> 
  </div>


  <!-- / Current Date --> 
  <div class="row DateSection">
  			
            <div class="container">
            	
            		
            			
						  		
						
            		
            	
			  <div class="col-lg-12 col-xs-12 col-md-12 text-right">
			  		
			  		<?php 
			  		/*
            			if(isset(Yii::app()->session["breadCrumbs"])){
							$breadCrumbs = Yii::app()->session["breadCrumbs"];
							$breadCrumbs = ksort($breadCrumbs);
							?>
							<ul class="BreadCrumb pull-left list-inline ClearMargin">
								<?php 
								$count = 0;
								foreach(Yii::app()->session["breadCrumbs"] as $breadCrumb){
										
										if($breadCrumb!=null){
											if($count>0){
												echo "\\";
											}
									?>
										<li>
											<a class="BackPage" href="<?php echo $breadCrumb["url"];?>"><?php echo $breadCrumb["name"]?></a>
										</li>
									<?php 
										}
								$count++;
								}?>
							</ul>
							<?php 
            			}
            		
            			
            			*/
            		?>
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
 	 