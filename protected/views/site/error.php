<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>
<div style='margin-top:20px;'>
	You can close the application by clicking <a class='closeapp' style='cursor:pointer'>here</a>
</div>
<script>
$(document).ready(function(){
	$('.closeapp').click(function(){
		window.external.done();
		//window.external.done();
	});
			
	
})
</script>