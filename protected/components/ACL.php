<?php 

class ACL{
	
	public $view_model ;
	public function __construct(){
		 $this->view_model = new StatusesModel();
		 $tmp_model = HoursConfiguration::model()->findByPk(TKSConstants::HOURS_AGENT_APPROVAL_ID);
		 $this->hours_agent = $tmp_model->hours;
		 $tmp_model = HoursConfiguration::model()->findByPk(TKSConstants::HOURS_SUPERVISOR_ACCEPTANCE_ID);
		 $this->hours_supervisor = $tmp_model->hours;
		 $tmp_model = HoursConfiguration::model()->findByPk(TKSConstants::HOURS_MANAGER_ACCEPTANCE_ID);
		 $this->hours_manager = $tmp_model->hours;
		 $tmp_model = HoursConfiguration::model()->findByPk(TKSConstants::HOURS_SUPERVISOR_APPROVAL_ID);
		 $this->hours_supervisor_approval = $tmp_model->hours;//these hours are used when makin approved session non editable
	}
	public function checkResolveDisputePermission($loginSessionId,$supervisorId){
		if($loginSessionId){
			$emp = LoginSessions::model()->findByPk($loginSessionId);
			if($emp && $emp->agent_id!=null){
				$agentModel = new AgentModel();
				$check = $agentModel->checkIfSupervisorRights( $emp->agent_id, $supervisorId);
				return $check;
			}
		}
		return false;
	}
	
	public function checkifViewPermission($loginSessionId,$supervisorId){
		if($loginSessionId){
			$emp = LoginSessions::model()->findByPk($loginSessionId);
			if($emp && $emp->agent_id!=null){
				$agentModel = new AgentModel();
				$check = $agentModel->checkIfViewRights( $emp->agent_id, $supervisorId);
				return $check;
			}
		}
		return false;
	}
	
	/* returns redirect URL if not allowed*/
	public function checkApproveEditPermission($loginSessionId,$supervisorId){
		if($loginSessionId){
			$emp = LoginSessions::model()->findByPk($loginSessionId);
			$employee =AgentHeirarchy::model()->findByPk($supervisorId);
			$end_date = $emp->end_date;
			if($end_date!=null){
				$end_date = Utilities::changeToDbFormat($end_date);
			}
			
			if($emp->status_id !=TKSConstants::APPROVED_STATUS
				||  $emp->ready_for_payroll!=0
				 || $emp->supervisor_status_id!= Null
				//|| Utilities::date_difference_from_current($end_date)	> $this->hours_supervisor_approval removing this chjeck from here as it is only requiired while updating in cron
				|| ($employee->employee_type_id!=TKSConstants::MANAGER_TYPE_ID &&
						$employee->employee_type_id!=TKSConstants::SUPERVISOR_TYPE_ID)
						
				){
				$actions = $this->view_model->getSearchPageLinkFor($emp,$supervisorId);
				return  $actions["url"];
			}
			
		}else{
			return "site/login";
		}
		return false;
		
	}
	
	/* returns redirect URL if not allowed*/
	public function checkApproveReviewPermission($loginSessionId,$supervisorId){
		if($loginSessionId){
			$emp = LoginSessions::model()->findByPk($loginSessionId);
			$employee =AgentHeirarchy::model()->findByPk($supervisorId);
			$end_date = $emp->supervisor_action_timestamp;			
			$agent_model = new AgentModel();
			$edit_rights = $agent_model->checkIfReviewRights($supervisorId);
			if($emp->status_id !=TKSConstants::APPROVED_STATUS
			||  $emp->ready_for_payroll!=0
			|| $emp->supervisor_status_id!=TKSConstants::SUPERVISOR_PENDING_REVIEW_STATUS
			//|| Utilities::date_difference_from_current($end_date)	>$this->hours_manager
			||($employee->employee_type_id!=TKSConstants::MANAGER_TYPE_ID
			|| !$edit_rights )
			){
				$actions = $this->view_model->getSearchPageLinkFor($emp,$supervisorId);
				return  $actions["url"];
			}
			
		}else{
			return "site/login";
		}
		return false;
	}
	
	
	/* returns redirect URL if not allowed*/

	public function checkAcceptDisputePermission($loginSessionId,$supervisorId){
		if($loginSessionId){
			$emp = LoginSessions::model()->findByPk($loginSessionId);
			$employee =AgentHeirarchy::model()->findByPk($supervisorId);
			$end_date = $emp->end_date;
			if($end_date!=null){
				$end_date = Utilities::changeToDbFormat($end_date);
			}
			if($emp->status_id !=TKSConstants::DISPUTED_STATUS
			||  $emp->ready_for_payroll!=0
			|| $emp->supervisor_status_id!= TKSConstants::SUPERVISOR_RESPONSE_PENDING_ID|| 
			($employee->employee_type_id!=TKSConstants::MANAGER_TYPE_ID &&
					$employee->employee_type_id!=TKSConstants::SUPERVISOR_TYPE_ID)
			){
				$actions = $this->view_model->getSearchPageLinkFor($emp,$supervisorId);
				
				return  $actions["url"];
			}
			
		}
		else{
			return "site/login";
		}
		return false;
	}
	
	/* returns redirect URL if not allowed*/
	public function checkDisputeReviewPermission($loginSessionId,$supervisorId){
		if($loginSessionId){
			$emp = LoginSessions::model()->findByPk($loginSessionId);
			$employee =AgentHeirarchy::model()->findByPk($supervisorId);
			$end_date = $emp->supervisor_action_timestamp;
			$agent_model = new AgentModel();
			$edit_rights = $agent_model->checkIfReviewRights($supervisorId);
			if($emp->status_id !=TKSConstants::DISPUTED_STATUS
			||  $emp->ready_for_payroll!=0
			|| $emp->supervisor_status_id!=TKSConstants::SUPERVISOR_PENDING_REVIEW_STATUS
			//|| Utilities::date_difference_from_current($end_date)	>$this->hours_manager
			|| ($employee->employee_type_id!=TKSConstants::MANAGER_TYPE_ID 
			|| !$edit_rights)
			){
				$actions = $this->view_model->getSearchPageLinkFor($emp,$supervisorId);
				return  $actions["url"];
			}
			
		}else{
			return "site/login";
		}
		return false;
	}
	
	public function isSupervisor($loginSessionId,$supervisorId){
		$agentModel = new AgentModel();
		if($loginSessionId){
			$emp = LoginSessions::model()->findByPk($loginSessionId);
			$employee =AgentHeirarchy::model()->findByPk($supervisorId);
			$check = $agentModel->checkIfSupervisorRights( $emp->agent_id, $supervisorId);
			return $check;
		}
		return false;
	}
	
}

?>