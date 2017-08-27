<!doctype html>

<html class="no-js">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Time Keeping System ::</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

<!-- Include Bootstrap Minified CSS-->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/fontawesome.css">
<!--link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"-->
<!-- / Include Bootstrap Minified CSS-->

<!-- Include Custom CSS-->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/theme.css">
<!-- / Include Custom CSS-->

<!-- Include Java Scripts Libraries -->
    <script>window.jQuery || document.write('<script src="<?php echo Yii::app()->request->baseUrl?>/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <!--  <script src="<?php echo Yii::app()->request->baseUrl?>/js/vendor/jquery-1.10.2.min.js"></script> -->
    <script src="<?php echo Yii::app()->request->baseUrl?>/js/custom.js"></script> 
  
    <script src="<?php echo Yii::app()->request->baseUrl?>/js/bootstrap.min.js"></script> 

    <!-- / Include Java Scripts -->

<!-- Include Modernizr JS-->
<script src="<?php echo Yii::app()->request->baseUrl?>/js/vendor/modernizr-2.6.2.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/bootstrap.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/custom.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/utilities.js"></script>
<!-- / Include Modernizr JS-->

<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); 
Yii::app()->clientScript->registerCssFile(
        Yii::app()->clientScript->getCoreScriptUrl().
        '/jui/css/base/jquery-ui.css'
);?>
</head>

<body onload="timer.start(1000)">

<!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]--> 

<!-- Site Header -->
<header>
  <div class="row header-bg"> 
    
    <!-- Include Header-->
    <div class="container" > 
      
      <!-- Ibex Logo-->
      <div class="col-lg-4 col-xs-4 col-md-4 logo"> <img src="<?php echo Yii::app()->request->baseUrl?>/images/logo.png" alt="" /> </div>
      <!-- / Ibex Logo--> 
      
      <!-- User Tracking Links -->
      <div class=" col-lg-8 col-xs-8 col-md-8">
        <ul class="list-inline UserTrackLinks ">
            
            <?php?><!-- Supervisor link disbale code here------------------------------------------------------------------->
            
            <li> <a href="#." > <i class="fa fa-user"></i>My Time Track</a> </li>
             <li>  <a href="<?php Yii::app()->createUrl('loginSessions/index/391')?>">
             			<i class="fa fa-exclamation-circle"></i>
						Historical Time track     </a>        		
             </li>
<!--            <li> <a href="#."> <i class="fa fa-clock-o"></i>Historical Time track</a> </li>-->
             <!--li-->  <!--?php echo CHtml::Link(' My Time Track',Yii::app()->createUrl(''),array('class'=>'fa fa-user')); ?--><!--/li-->
            <!--li-->  <!--?php echo CHtml::Link(' Historical Time track',Yii::app()->createUrl(''),array('class'=>'fa fa-exclamation-circle')); ?--><!--/li-->
            <li> <a href="#."> <i class="fa fa-exclamation-circle"></i>My Dispute(s)</a> </li>
<!--          <li>  ?php echo CHtml::Link(' My Dispute(s)',Yii::app()->createUrl(''),array('class'=>'fa fa-exclamation-circle')); ?</li>-->
         
         <?php if(isset($this->breadcrumbs)):?>
		<?php //$this->widget('zii.widgets.CBreadcrumbs', array(
			//'links'=>$this->breadcrumbs,
		//)); ?><!-- breadcrumbs -->
	<?php endif?>
          <!--?php echo CHtml::ajaxLink('My Dispute (s)', array('ajax'), array('update'=>'#ajax-results'))?-->
      </div>
      <!-- / User Tracking Links --> 
    </div>
    <!-- / Include Header--> 
  </div>

  <!-- Current Date -->
  <div class="row DateSection">
    <!--?php include("includes/inc-timetrack.php");?-->
  </div>
  <!-- / Current Date --> 
  
</header>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		
	</div>
        <!-- footer -->



</body>
</html>
