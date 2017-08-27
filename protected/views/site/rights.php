<head>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/fontawesome.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/charcount.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/custom.css">
<?php 
Yii::app()->clientScript->registerCoreScript('jquery',CClientScript::POS_HEAD);
Yii::app()->clientScript->registerCoreScript('jquery.ui',CClientScript::POS_HEAD); 
Yii::app()->clientScript->registerCssFile(
        Yii::app()->clientScript->getCoreScriptUrl().
        '/jui/css/base/jquery-ui.css'
);?>
<style>
.ui-button-text-only .ui-button-text{
font-size:12px;
}
.ui-dialog .ui-dialog-buttonpane{
padding:0px;
margin:0px;
border-width:0px;
text-align:center;
}
.ui-dialog-title{
font-size:12px;}
.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {
/* float: right; */
float:none;


}
.ui-dialog-content{
background:white !important;
margin:none !important;
}

.ui-dialog-buttonpane{
background:white !important;
}
.ui-widget-content{
border:none !important;
}
.ui-dialog{
background:white !important;
}
.ui-dialog-content{
}
</style>

</head>
<body style='width:100%;height:100%'>
	<div>
	<script type="text/javascript" >
	$(document).ready(function(){
	
			$('#endbtn').dialog({
				autoOpen:false,
			    resizable: false,
			    position: {
			        my: "center",
			        at: "center",
			        of: $("body"),
			        within: $("body")
			    },
			    height:205,
			    width:450,
			    modal: true,
			    buttons: {
			      "OK": function() {
						$(this).dialog("close");
						//window.external.done();
			      }
			      
			    }
			  });
			$('#endbtn').dialog("open");
			
		
	
	 });
	</script>
	<div id='endbtn' title='Authentication Failed!' style='font-size:12px;'>
	
	<?php echo $message?>
	</div>
	</div>
</body>