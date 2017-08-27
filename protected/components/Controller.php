<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	/* thiis methid is used to set the timezone*/
	
	public function init(){
		
// 		$agentId = isset(Yii::app()->session[TKSConstants::KEY_BPO_AGENT_ID])?Yii::app()->session[TKSConstants::KEY_BPO_AGENT_ID]:null;

// 		$timeZone = isset(Yii::app()->session[TKSConstants::KEY_TIME_ZONE])?Yii::app()->session[TKSConstants::KEY_TIME_ZONE]:TKSConstants::DEFAULT_TIMEZONE;
// 		date_default_timezone_set(TKSConstants::DEFAULT_TIMEZONE);
// 		if(trim($timeZone)!=""){
// 			@date_default_timezone_set($timeZone);
// 		}
// 		TimeZoneHandler::setMysqlTimeZoneToClient();
// 		$agentModel = new AgentModel();
// 		$agentModel->saveTimeZoneForEmployee($agentId,$timeZone);
		
		
	}

}