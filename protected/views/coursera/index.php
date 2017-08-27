<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Coursera Downloader</title>

    <!-- Jquery library-->

    <!-- jQuery -->
    <script src="<?php echo Yii::app()->request->baseUrl?>/js/coursera/jquery.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
  <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
 

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Yii::app()->request->baseUrl?>/js/coursera/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo Yii::app()->request->baseUrl?>/js/coursera/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>-->

    <!-- Custom Theme JavaScript -->
    <!--<script src="<?php // echo Yii::app()->request->baseUrl?>/js/coursera/grayscale.js"></script>-->

    <!-- actions -->
    <script src="<?php echo Yii::app()->request->baseUrl?>/js/coursera/downloadVideos.js"></script>


    <!-- Bootstrap Core CSS -->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <!--<link href="css/grayscale.css" rel="stylesheet">-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/grayscale.css">

    <!-- Custom CSS
    <link href="css/styles.css" rel="stylesheet">
    -->
    <!-- Custom Fonts -->

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!------------------popuo weekly----------->
    <!-- overlay popup -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/css/popup/normalize.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/css/popup/dialog.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/css/popup/dialog-sandra.css" />

    <!------------------popuo weekly----------->

    <script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl ?>/js/popup/modernizr.custom.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/popup/classie.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/popup/dialogFx.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/popup/function.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/progress/jquery.progress.js"></script>
    <!--<script src="<?php echo Yii::app()->request->baseUrl ?>/js/progress/loadingicon.js"></script>-->


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


<!-- Intro Header -->
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!--<h1 class="brand-heading">Grayscale</h1>-->
                    <p class="intro-text">A simple tool to download coursera videos and lecture notes</p>
                </div>
            </div>
            <div>
                <div class="form-inline">

                    <div class="row">
                        <!--<div class="col-md-3"> </div> -->
                        <input type="text" style="width: 500px; padding-right: 33px;" class="form-control input-search" id="downloadVideosText" placeholder="Enter the link to your course">
                        <a href="" id="clear"><i class="fa fa-close"></i></a>
                        <button data-videopopup="videopopupid" type="button" class="btn btn-primary" id="downloadVideosButton">Download Videos</button>
                        <div style="position: absolute;" class="error "></div>

                        <div id="videopopupid" class="dialog">
                            <div class="dialog__overlay"></div>
                            <div style="width: 800px;" class="dialog__content">

                                <?php
//                                if(isset(Yii::app()->session['requestuser'])){
                                    $title=Yii::app()->session['requestuser'];
//                                }else{

//                                    $title='Course Videos';
//                                }
                                ?>
                                <div class="modal-header"><?php echo $title; ?></div>

                                <form style="overflow-x: auto; margin:0px;" id="display_video_contents" action="<?php echo $this->createUrl('');?>" method="GET">
                                    <div class="feedback clearfix"></div>


                                </form>
                              <div class="modal-footer clearfix">
                                    <input id="btnsubmitvideos" class="btn btn-primary downloadbtn" type="button" value="Download" />
                                    <input id="" class=" btn btn-danger cancelbtn" type="button" value="Cancel" />
                                </div>

                            </div>
                            <div id="loadingDiv"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 60px">
            <div class="loadingbar" id="coursera-loading-js" style="display: none;     margin-left: -285px;
    width: 570px;
    position: absolute;
    left: 50%;
    margin-top: -19px;"><div style="width: 100px; padding-left: 50%; margin-left: -50px;"><svg id="coursera-animated-logo" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="80px" xml:space="preserve" viewBox="-5 0 450 223.727"><path stroke="#4089c8" stroke-width="4.3" fill="#DCDCDC" d="M 185.56 16.417 C 185.56 16.417 177.006 12.068 167.595 8.528 C 167.231 8.389 166.867 8.25 166.496 8.12 C 165.367 7.712 164.244 7.312 163.099 6.932 C 153.088 3.596 142.586 1.52 131.764 0.586999 L 131.771 0.579999 C 131.488 0.550999 131.206 0.527999 130.923 0.506999 C 129.259 0.390999 127.578 0.194999 125.922 0.113999 C 124.109 0.0409991 122.294 0.00399907 120.503 -0.00300093 H 119.493 C 99.588 0.065 81.097 4.138 64.202 12.216 C 45.272 21.338 29.91 34.632 18.551 51.766 C 7.202 68.886 1.003 87.898 0.119 108.298 C 0.045 110.045 0 111.767 0 113.484 C -0.023 142.018 10.391 167.108 31.053 188.177 C 52.637 210.264 80.711 222.182 114.426 223.58 C 116.588 223.666 118.722 223.726 120.847 223.726 C 139.919 223.726 157.549 220.317 173.38 213.556 C 177.327 211.867 181.17 209.884 185.094 207.67 C 187.227 206.446 189.241 205.136 191.241 203.736 L 192.72 202.745 L 195.21 201.026 C 198.206 198.897 201 196.567 203.736 194.09 L 204.68 193.186 C 206.285 191.671 207.883 190.127 209.399 188.526 L 215.071 182.114 L 217.233 179.404 L 218.245 177.946 L 219.256 176.489 C 227.684 162.329 255.124 110.802 255.124 110.802 V 110.699 L 256.752 107.553 L 258.119 105.09 C 262.171 97.732 265.08 92.503 268.945 86.996 L 269.056 86.841 C 278.079 73.752 293.581 64.441 311.862 62.867 C 342.539 60.23 369.4 80.379 371.868 107.872 C 374.327 135.378 351.458 159.81 320.784 162.445 C 314.406 162.997 308.196 162.56 302.336 161.278 L 302.202 161.333 C 279.693 156.638 265.367 140.242 258.304 132.906 L 228.795 187.167 C 228.795 187.167 237.963 196.405 244.247 201.018 C 250.532 205.629 258.662 210.174 265.157 212.973 C 280.915 219.702 298.033 223.725 316.948 223.725 C 319.156 223.725 318.703 223.725 320.992 223.637 C 354.677 222.239 384.675 209.33 406.318 187.214 C 426.824 166.234 437.951 142.25 438.047 113.889 V 113.076 C 438.039 111.503 438 109.915 437.935 108.326 C 437.86 106.607 437.748 104.918 437.6 103.228 C 437.6 103.228 437.6 103.212 437.6 103.197 C 437.6 103.197 437.6 103.182 437.6 103.171 C 435.965 84.694 429.863 67.414 419.509 51.795 C 414.878 44.831 409.601 38.508 403.692 32.826 C 395.042 24.521 385.052 17.637 373.784 12.202 C 356.823 4.1 338.079 0.0139968 318.077 0.0139968 C 316.123 0.0139968 314.093 0.0429968 312.02 0.123997 C 297.964 0.764997 284.385 3.423 271.624 8.122 C 258.744 12.777 247.542 18.925 238.37 26.297 C 236.498 27.769 234.468 29.59 232.291 31.601 L 230.715 33.146 L 228.568 35.418 H 228.583 H 228.599 L 227.594 36.409 L 227.103 36.948 L 224.546 39.643 C 222.651 41.771 220.839 43.898 219.151 45.996 L 219.135 45.967 L 219.076 45.909 C 215.568 50.178 212.319 54.592 209.94 58.57 C 208.32 61.12 206.737 63.742 205.221 66.364 L 184.284 108.689 L 184.314 108.718 L 183.213 110.861 L 180.901 115.552 C 176.323 124.825 171.41 134.091 165.917 141.726 C 153.653 155.161 139.806 161.715 122.005 161.715 C 120.757 161.715 119.479 161.656 118.186 161.599 C 107.468 161.162 98.259 158.626 90.105 153.79 C 89.229 153.265 88.38 152.742 87.563 152.186 C 80.903 147.756 75.798 142.076 71.978 134.964 C 67.644 126.923 65.72 118.728 66.001 109.998 C 66.016 109.779 66.023 109.576 66.023 109.373 C 66.61 95.503 71.902 84.72 82.553 75.394 C 85.132 73.18 87.845 71.286 90.677 69.596 C 91.079 69.363 91.473 69.131 91.873 68.926 C 99.789 64.613 108.798 62.473 119.129 62.473 L 122.339 62.559 C 138.743 63.186 151.378 68.315 161.472 78.308 L 193.12 21.487  Z"></path></svg></div><div id="coursera-loading-text">
                    <h3  id="coursera-loading-en" style="font-size: 14px;text-transform: inherit;">We’re zipping up the files and they’re going to be ready to download soon. Please don’t hit the ‘back’ button in your browser, as it’ll disrupt the process.</h3></div></div>


            <p>
            </p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>            
            <a href="#contact" class="btn btn-circle page-scroll">
                <i class="fa fa-angle-double-down animated"></i>
            </a>
        </div>
    </div>
    </div>
</header>


<!-- Contact Section -->
<section id="contact" class="container content-section text-center">
    <div class="row" style="position: relative;">
        <div class="col-lg-8 col-lg-offset-2">
            <!--<h2>Contact Start Bootstrap</h2>-->
            <p>Feel free to get in touch and provide feedback or request features that you would find useful</p>
            
            <ul class="list-inline banner-social-buttons" style="position: relative;">
                <li>
                    <a href="https://www.linkedin.com/in/kashkhaleghi" class="btn btn-default btn-lg"><i class="fa fa-linkedin-square fa-fw"></i> <span class="network-name">LinkedIn</span></a>
                </li>
                <li>
                    <a href="https://github.com/suspenderlover/coursera-downloader" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                </li>



            </ul>
        </div>
    </div>
</section>

<!-- Map Section -->
<!--
<div id="map"></div>
-->

<!-- Footer -->
<footer>
    <div class="container text-center">
        <!--<p>Copyright &copy; Your Website 2014</p>-->
    </div>
</footer>

<input type="hidden" id="VideoData" class="vertical" data-videodata="<?php echo $this->createUrl('Coursera/RequestURL');?>" >
<input type="hidden" id="SubmitVideos" class="vertical cancelbtn" data-submitvideos="<?php echo $this->createUrl('Coursera/GETVideotoDownload');?>" >

</body>

</html>

<script>document.getElementById("coursera-loading-js").style.display = 'n';
    var showLoadingText = false;
    if (/MSIE/i.test(navigator.userAgent) || /rv:11.0/i.test(navigator.userAgent)) {
        // IE doesn't support svg animations, so show a supported animation instead
        document.getElementById('coursera-animated-logo').style.animation = 'pulse 2s infinite ease;';
        showLoadingText = true;
    }
    var locale = "en_GB";
    try {
        var language_code = locale.split('-')[0];
        if (/ar|de|fr|es|en|pr|ru|tr|zh/.test(language_code) || showLoadingText) {
            //- Otherwise show a loading message in the person's language, if we have it
            document.getElementById('coursera-loading-' + language_code).style.display = 'block';
        }
    } catch (e) {
        document.getElementById('coursera-loading-en').style.display = 'block';
    }</script><style>@keyframes drawlogo {
                         0%   { stroke-dashoffset: 2024; fill: #DCDCDC; stroke: #4089c8; }
                         60%  { fill: #DCDCDC; }
                         80%  { fill: #4089c8; stroke-dashoffset: 0; }
                         95%  { fill: #4089c8; stroke: #4089c8; }
                         100% { fill: #DCDCDC; stroke-dashoffset: 0; stroke: #f5f5f5; }
                     }
    @-webkit-keyframes drawlogo {
        0%   { stroke-dashoffset: 2024; fill: #DCDCDC; stroke: #4089c8; }
        60%  { fill: #DCDCDC; }
        80%  { fill: #4089c8; stroke-dashoffset: 0; }
        95%  { fill: #4089c8; stroke: #4089c8; }
        100% { fill: #DCDCDC; stroke-dashoffset: 0; stroke: #f5f5f5; }
    }
    @-moz-keyframes drawlogo {
        0%   { stroke-dashoffset: 2024; fill: #DCDCDC; stroke: #4089c8; }
        60%  { fill: #DCDCDC; }
        80%  { fill: #4089c8; stroke-dashoffset: 0; }
        95%  { fill: #4089c8; stroke: #4089c8; }
        100% { fill: #DCDCDC; stroke-dashoffset: 0; stroke: #f5f5f5; }
    }
    @-o-keyframes drawlogo {
        0%   { stroke-dashoffset: 2024; fill: #DCDCDC; stroke: #4089c8; }
        60%  { fill: #DCDCDC; }
        80%  { fill: #4089c8; stroke-dashoffset: 0; }
        95%  { fill: #4089c8; stroke: #4089c8; }
        100% { fill: #DCDCDC; stroke-dashoffset: 0; stroke: #f5f5f5; }
    }
    @keyframes pulse {
        50%   { opacity: .3; }
    }

    #coursera-loading-text h3, #coursera-loading-text h4 {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
    }

    #coursera-animated-logo path {
        fill: #4089c8;
        stroke: #4089c8;
        stroke-width: 5;
        stroke-linecap: round;
        stroke-dasharray: 2024 2024;
        animation:         drawlogo 2s infinite ease-in-out; /* IE 10+, Fx 29+ */
        -webkit-animation: drawlogo 2s infinite ease-in-out; /* Safari 4+ */
        -moz-animation:    drawlogo 2s infinite ease-in-out; /* Fx 5+ */
        -o-animation:      drawlogo 2s infinite ease-in-out; /* Opera 12+ */
    }
    .coursera-loading-quote, #coursera-loading-text {
        width: 100%;
        text-align: center;
    }

    #coursera-loading-text h3 {
        font-size: 1.4em;
        margin-bottom: 40px;
        font-weight: normal;
    }

    .coursera-loading-quote-byline {
        font-size: 1em;
        text-align: center;
        color: #7f7f7f;
    }</style></script></body>