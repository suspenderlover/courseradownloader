<!doctype html>
<?php
// var_dump(Yii::app()->request->getParam('disputeStatus'));

$startUpDisputeStatus = Yii::app()->request->getParam('disputeStatus');
?>
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

        <!-- Include Bootstrap Minified CSS-->


        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/bootstrap.css?version=<?php echo TKSConstants::VERSION; ?>">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/fontawesome.css?version=<?php echo TKSConstants::VERSION; ?>">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/charcount.css?version=<?php echo TKSConstants::VERSION; ?>">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/custom.css?version=<?php echo TKSConstants::VERSION; ?>">
        <link href="<?php echo Yii::app()->request->baseUrl ?>/spellcheck/css/jquery.spellchecker.css?version=<?php echo TKSConstants::VERSION; ?>" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl ?>/css/bootstrap-timepicker.min.css?version=<?php echo TKSConstants::VERSION; ?>" type="text/css" rel="stylesheet" />
        <!--[if lt IE 8]>
                        <link href="<?php echo Yii::app()->request->baseUrl ?>/css/bootstrap-ie7.css" rel="stylesheet">
        <![endif]-->


        <!--link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"-->
        <!-- / Include Bootstrap Minified CSS-->

        <!-- Include Custom CSS-->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/theme.css?version=<?php echo TKSConstants::VERSION; ?>">
        <!--<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/js/bootstrap-datetimepicker.min.js">-->
        <!-- / Include Custom CSS-->

        <!-- Include Java Scripts Libraries -->
        <?php
        //<script> window.jQuery || document.write('<script src="<?php echo Yii::app()->request->baseUrl/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        ?>
            <!--  <script src="<?php echo Yii::app()->request->baseUrl ?>/js/vendor/jquery-1.10.2.min.js?version=<?php echo TKSConstants::VERSION; ?>"></script> -->

        <script src="<?php echo Yii::app()->request->baseUrl ?>/js/bootstrap.min.js?version=<?php echo TKSConstants::VERSION; ?>"></script> 
        <script src="<?php echo Yii::app()->request->baseUrl ?>/js/bootstrap-datetimepicker.min.js?version=<?php echo TKSConstants::VERSION; ?>"></script> 

        <!-- / Include Java Scripts -->

        <!-- Include Modernizr JS-->
        <script src="<?php echo Yii::app()->request->baseUrl ?>/js/vendor/modernizr-2.6.2.min.js?version=<?php echo TKSConstants::VERSION; ?>"></script>
        <!--  
        <script src="<?php echo Yii::app()->request->baseUrl ?>/js/bootstrap.js?version=<?php echo TKSConstants::VERSION; ?>"></script>
        <script src="<?php echo Yii::app()->request->baseUrl ?>/js/bootstrap.min.js?version=<?php echo TKSConstants::VERSION; ?>"></script>-->
        <script src="<?php echo Yii::app()->request->baseUrl ?>/js/utilities.js?version=<?php echo TKSConstants::VERSION; ?>"></script>
        <script src="<?php echo Yii::app()->request->baseUrl ?>/js/custom.js?version=<?php echo TKSConstants::VERSION; ?>"></script>
        <script src="<?php echo Yii::app()->request->baseUrl ?>/js/review.js?version=<?php echo TKSConstants::VERSION; ?>"></script>
        
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/bootstrap-timepicker.js?version=<?php echo TKSConstants::VERSION; ?>"></script>
        <!-- / Include Modernizr JS-->

        <?php
        Yii::app()->clientScript->registerCoreScript('jquery.ui');
        Yii::app()->clientScript->registerCssFile(
                Yii::app()->clientScript->getCoreScriptUrl() .
                '/jui/css/base/jquery-ui.css'
        );
        ?>
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
                        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.jpg" alt="" />
                        <div class="UserInfoBlock">Welcome,
                            <span class="UserName timeColor">
                                <?php
                                $ntlogin = isset(Yii::app()->session[TKSConstants::KEY_NTLOGIN]) ?
                                        Yii::app()->session[TKSConstants::KEY_NTLOGIN] : "";
                                $name = isset(Yii::app()->session[TKSConstants::KEY_NAME]) ?
                                        Yii::app()->session[TKSConstants::KEY_NAME] : "";
                                $name = "" . trim($name);
                                if ($name != "") {
                                    $username = $name;
                                } else {
                                    $username = $ntlogin;
                                }
                                echo $username;
                                ?></span>
                        </div>  
                    </div>
                    <div class=" col-lg-7 col-xs-7 col-md-7 pull-right">
                        <ul class="list-inline UserTrackLinks ">
<!-- 				  <li> <a href="#"> <i class="TksIco TopMenuIco"></i> My Time Keeping Session(s)</a> </li> -->




                            <?php
                            if (Yii::app()->session[TKSConstants::KEY_EMPLOYEE_TYPE_ID] != TKSConstants::AGENT_TYPE_ID && Yii::app()->session[TKSConstants::KEY_EMPLOYEE_TYPE_ID] != null) {
                                ?>
								<li> <a  class="searchRestrictIconDisable addSessionLink"  data-url="<?php echo $this->createUrl('dispute/addSession?user_role=non-agent') ?>" href="<?php echo $this->createUrl('dispute/addSession?user_role=non-agent') ?>"> <i class="AddSessionIco TopMenuIco"></i> Add Session</a> </li>
                                <li> <a id="searchRestrictIconDisable" class="searchRestrictIconDisable "  href="<?php echo $this->createUrl('supervisor/search') ?>"> <i class="mdIco TopMenuIco"></i>Search</a> </li>
    <?php
}
if (Yii::app()->session[TKSConstants::KEY_EMPLOYEE_TYPE_ID] != TKSConstants::MANAGER_TYPE_ID) {
    ?>
                                <li> <a  class="searchRestrictIconDisable "  href="<?php echo $this->createUrl('history/monthlyview') ?>"> <i class="TkhIco TopMenuIco"></i> Historical Time Keeping Session(s)</a> </li>

                                <li> <a class="searchRestrictIconDisable "  href="<?php echo $this->createUrl('dispute/MyDispute?sessionStatusesMyDispute[]=3') ?>"> <i class="mdIco TopMenuIco"></i> My Dispute(s)</a> </li>

    <?php
}
if (Yii::app()->session[TKSConstants::KEY_EMPLOYEE_TYPE_ID] == TKSConstants::MANAGER_TYPE_ID) {
    ?>
    							<li> <a class="searchRestrictIconDisable" href="<?php echo $this->createUrl('/dashboard') ?>"> <i class="userIco TopMenuIco"></i>Dashboard</a> </li>
							  	<li> <a class="searchRestrictIconDisable" href="<?php echo $this->createUrl('/dashboard/permission') ?>"> <i class="perIco TopMenuIco"></i> Permission form</a> </li>
						  		<li> <a class="searchRestrictIconDisable" href="<?php echo $this->createUrl('supervisor/ChangeRights') ?>"> <i class="mdIco TopMenuIco"></i> Settings</a> </li>
						
                                <?php
                            }
                            ?>
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
if (isset(Yii::app()->session["breadCrumbs"])) {
    $breadCrumbs = Yii::app()->session["breadCrumbs"];

//    $breadCrumbs = ksort($breadCrumbs);
    $breadCrumb = Yii::app()->session["breadCrumbs"];
    end($breadCrumb);
    $arrayPrevBreadCrumb = prev($breadCrumb);
    if ($arrayPrevBreadCrumb == false) {
        $arrayPrevBreadCrumb = end($breadCrumb);
    }




//if(count($breadCrumb)>1){
//    $breadCrumbNav= $breadCrumb[2]['url'];
//}else 
//    if (count($breadCrumb) == 3) {
//        $breadCrumbNav = $breadCrumb[1]['url'];
//    } else {
//        $breadCrumbNav = $breadCrumb[0]['url'];
//    }
//    var_dump($breadCrumb);
    ?>                              

                            <ul class="BreadCrumb pull-left list-inline ClearMargin">
    <?php
    if (count($breadCrumb) > 0 && isset($breadCrumb[0]['name'])) {
        if ($breadCrumb[0]['name'] == 'Historical Time Keeping Session') {
            ?>

                                        <a type="button" class="btn btn-info btn-lg pull-left btn-back" href="<?php echo $arrayPrevBreadCrumb['url']; ?>"> Back</a>
            <?php
        }
    }
    $count = 0;

    foreach (Yii::app()->session["breadCrumbs"] as $breadCrumb) {
        ?>

                                    <?php
                                    if ($breadCrumb != null) {
                                        ?>

                                        <?php
                                        if ($count > 0) {
                                            echo "\\";
                                        }
                                        ?>

                                        <li>
                                            <a class="BackPage" href="<?php echo $breadCrumb["url"]; ?>"><?php echo $breadCrumb["name"] ?></a>
                                        </li>
            <?php
        }
        $count++;
    }
    ?>
                            </ul>
                                <?php
                            }
                            ?>
                        Today <span class="LightColor"><?php echo date('F j, Y'); ?></span> </div>
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
