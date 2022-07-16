<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

	private $theme; 
		 
	public function __construct()
	{
		parent::__construct();

		## asset config
		$theme = $this->config->item('theme');
		$this->theme = $theme; 

		$this->asset_url = $this->config->item('asset_url');
		$this->js_url = $this->config->item('js_url');
		$this->css_url = $this->config->item('css_url');
		$this->image_url = $this->config->item('image_url');

		$this->img_path = $this->image_url;

		$this->template->write('js_url', $this->js_url);
        $this->template->write('css_url', $this->css_url);
		$this->template->write('asset_url', $this->asset_url);
		$this->template->write('image_url', $this->image_url);

	}
		
	public function index(){
		
		redirect('manage/home');
	}
	
	public function Home(){

		

		$data['str_validate'] = '';
		$data['img_path'] = $this->img_path;

		$checkSess = $this->backoffice_model->CheckSession();

	
		$setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));

		$this->template->write('page_title', 'VAS Quotation | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_home.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();
	}

	public function Logout(){
	
		$this->backoffice_model->Logout();		
    }

	public function add_user(){
		
		$data['str_validate'] = '';
		$data['img_path'] = $this->img_path;

		$checkSess = $this->backoffice_model->CheckSession();
		
		if($this->uri->segment(3)==''){ $getUrlSegment = $this->router->fetch_method(); }else{ $getUrlSegment = $this->router->fetch_method().'/'.$this->uri->segment(3); }
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'),$getUrlSegment);
		
		$action = $this->input->post('action');
		
		if($action=='saveUser'){
			
			## Get Post Value
			$p['usr'] = $this->input->post('txt_usr');
			$p['pwd'] = base64_encode($this->input->post('txt_pwd'));
			$p['group'] = $this->input->post('sel_group');
			$p['fname'] = $this->input->post('txt_fname');
			$p['lname'] = $this->input->post('txt_lname');
			if($this->input->post('rad_sex')=='1'){ $p['sex'] = 'male';}
			if($this->input->post('rad_sex')=='2'){ $p['sex'] = 'female';}
			$p['email'] = $this->input->post('txt_email');
									
			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />', '</div>');				
			$this->form_validation->set_rules('txt_usr', 'Username', 'trim|required|min_length[4]|max_length[16]|callback_userkey_exists');
			$this->form_validation->set_rules('txt_pwd', 'Password', 'trim|required|min_length[4]|max_length[16]');
			$this->form_validation->set_rules('sel_group', 'User Groups', 'is_natural_no_zero');
			$this->form_validation->set_rules('txt_fname', 'First name', 'trim|required');
			$this->form_validation->set_rules('txt_lname', 'Last name', 'trim|required');
			$this->form_validation->set_rules("rad_sex", "", "trim");
			$this->form_validation->set_rules('txt_email', 'Email', 'trim|required|valid_email');
			
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาทำการตรวจสอบด้วยค่ะ');
			$this->form_validation->set_message('alpha_numeric', '%s ห้ามใช้ตัวอักษรอักขระพิเศษ'); 
			$this->form_validation->set_message('min_length', '%s: ต้องกรอกไม่น้อยกว่า %s ตัวอักษร');
			$this->form_validation->set_message('max_length', '%s: ต้องกรอกไม่เกิน %s ตัวอักษร');
			$this->form_validation->set_message('valid_email', 'รูปแบบ Email ไม่ถูกต้อง');
			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบด้วยค่ะ %s');        																
			
			if($this->form_validation->run() == FALSE){
				
				$data['str_validate'] = FALSE;
								
			}else{# form_validation = TRUE
				
				$result = $this->backoffice_model->addUser($p);
				
				if($result!=FALSE){					

					$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i> <strong>บันทึกข้อมูลเรียบร้อยค่ะ <br />Success : Save data success.</div>');
					redirect('manage/edituser/rule/'.$result.'');

				}else{

					$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Save data not found.</div>');
					redirect('manage/add_user');	
				}				
				
			}
					
		}		
		
		$sqlSelG = "SELECT * FROM sys_user_groups WHERE sug_id<>'1' AND enable='1';";
		$data['excLoadG'] = $this->db->query($sqlSelG);

		$setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));

		$this->template->write('page_title', '3BB Tickets | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_adduser.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();
		
	}

	public function edit_user(){
		
		$data['str_validate'] = '';
		$data['img_path'] = $this->img_path;

		$checkSess = $this->backoffice_model->CheckSession();
		
		if($this->uri->segment(3)==''){ $getUrlSegment = $this->router->fetch_method(); }else{ $getUrlSegment = $this->router->fetch_method().'/'.$this->uri->segment(3); }
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'),$getUrlSegment);		
				
		$action = $this->input->post('action');
		
		if($action=='searchUser'){
						
			if($this->input->post('strSearch')==''){ redirect('manage/editUser'); }
			
			$searchTerm = trim($this->input->post('strSearch'));
			$data['getResult'] = $this->backoffice_model->searchUser($searchTerm);
			$data['strSearch'] = $this->input->post('strSearch');
			$data['todoSearch'] = TRUE;
		
		}else{
			
			if($this->uri->segment(3)=='detail'){
				
				$uId = $this->uri->segment(4);
										
				$sqlLoadUser = "SELECT u.*, ug.name FROM sys_users AS u LEFT JOIN sys_user_groups AS ug ON ug.sug_id = u.sug_id WHERE u.su_id='{$uId}';";
				$data['excLoadUser'] = $this->db->query($sqlLoadUser);
								
				$data['recLoadUser'] = $data['excLoadUser']->result_array();
								
				$sqlLoadG = "SELECT * FROM sys_user_groups WHERE sug_id<>'1' AND enable='1';";
				$data['excLoadG'] = $this->db->query($sqlLoadG);
				
				$data['todoSearch'] = FALSE;
				$data['frmEdit'] = TRUE;
				
				if($action=='saveEditUser'){## Confirm Edit User
										
					## Get Post Value
					//$p['usr'] = $this->input->post('txt_usr');
					$p['pwd'] = base64_encode($this->input->post('txt_pwd'));
					$p['group'] = $this->input->post('sel_group');
					$p['fname'] = $this->input->post('txt_fname');
					$p['lname'] = $this->input->post('txt_lname');
					if($this->input->post('rad_sex')=='1'){ $p['sex'] = 'male';}
					if($this->input->post('rad_sex')=='2'){ $p['sex'] = 'female';}
					$p['email'] = $this->input->post('txt_email');
					$p['enable'] = $this->input->post('rad_status');
											
					$this->load->library('form_validation');	
					$this->form_validation->set_error_delimiters('<div class="n_error"><p>', '</p></div>');				
					//$this->form_validation->set_rules('txt_usr', 'Username', 'trim|required|min_length[6]|max_length[16]|callback_userkey_exists');
					$this->form_validation->set_rules('txt_pwd', 'Password', 'trim|required|min_length[4]|max_length[16]');
					$this->form_validation->set_rules('sel_group', 'User Groups', 'is_natural_no_zero');
					$this->form_validation->set_rules('txt_fname', 'First name', 'trim|required');
					$this->form_validation->set_rules('txt_lname', 'Last name', 'trim|required');
					$this->form_validation->set_rules("rad_sex", "", "trim");
					$this->form_validation->set_rules('txt_email', 'Email', 'trim|required|valid_email');
					
					$this->form_validation->set_message('required', 'Please fill in %s');        																
					$this->form_validation->set_message('min_length', '%s: the minimum of characters is %s');        																
					$this->form_validation->set_message('max_length', '%s: the maximum of characters is %s');
					$this->form_validation->set_message('is_natural_no_zero', 'Please choose %s');        																
		
					
					if($this->form_validation->run() == FALSE){
						
						$strValid = FALSE;
										
					}else{# form_validation = TRUE
						
						$result = $this->backoffice_model->editUser($uId,$p);
						
						if($result!=FALSE){
							
							$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>แก้ไขข้อมูลเรียบร้อยค่ะ <br />Success : Edit data success.</p></div>');
							redirect('manage/edituser/detail/'.$uId.'');
						}else{
							
							$this->session->set_flashdata('msgResponse','<div class="n_error"><p>เกิดข้อผิดพลาด ไม่สามารถแก้ไขข้อมูลได้ค่ะ <br />Error : Edit data not found.</p></div>');
							redirect('manage/edituser/detail/'.$uId.'');	
						}				
						
					}
					
					
				}else{

					
				}
				
			
			}elseif($this->uri->segment(3)=='delete'){
			
				$uId = $this->uri->segment(4);
				$result = $this->backoffice_model->deleteUser($uId);
			
				if($result!=FALSE){
					
					$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>ลบข้อมูลเรียบร้อยค่ะ <br />Success : Delete data success.</p></div>');
					redirect('manage/edituser');
				
				}else{
					
					$this->session->set_flashdata('msgResponse','<div class="n_error"><p>เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้ค่ะ <br />Error : Delete data not found.</p></div>');
					redirect('manage/edituser');
					
				}
			
			
			}elseif($this->uri->segment(3)=='rule'){
				
				$uId = $this->uri->segment(4);
										
				$sqlLoadUser = "SELECT u.*, ug.name, ug.sug_id FROM sys_users AS u LEFT JOIN sys_user_groups AS ug ON ug.sug_id = u.sug_id WHERE u.su_id='{$uId}';";
				$data['excLoadUser'] = $this->db->query($sqlLoadUser);
								
				$data['recLoadUser'] = $data['excLoadUser']->result_array();
								
				$sqlPerG = "SELECT
					sp.sp_id,
					sp.`name`
					FROM
					sys_users_groups_permissions AS sugp 
					LEFT JOIN sys_permission_groups AS spg ON spg.spg_id = sugp.spg_id
					LEFT JOIN sys_permissions AS sp ON sp.spg_id = spg.spg_id
					WHERE
					spg.`enable`='1' AND sp.enable='1' AND sugp.sug_id='{$data['recLoadUser'][0]['sug_id']}' ORDER BY sp.spg_id ASC
					;";
				$data['excPerG'] = $this->db->query($sqlPerG);
				
				
				$sqlOthRule = "SELECT sup.sp_id,sp.`name` FROM sys_users_permissions AS sup 
				LEFT JOIN sys_permissions AS sp ON sp.sp_id = sup.sp_id 
				WHERE sup.su_id='{$uId}' AND sup.sp_id NOT IN 
				(
					SELECT
					sp.sp_id
					FROM
					sys_users_groups_permissions AS sugp 
					LEFT JOIN sys_permission_groups AS spg ON spg.spg_id = sugp.spg_id
					LEFT JOIN sys_permissions AS sp ON sp.spg_id = spg.spg_id
					WHERE
					spg.`enable`='1' AND sp.enable='1' AND sugp.sug_id='{$data['recLoadUser'][0]['sug_id']}'
				)
				;";
				
				$data['excOthRule'] = $this->db->query($sqlOthRule);
							
				$sqlRule = "SELECT sp_id FROM sys_users_permissions WHERE su_id='{$uId}';";
				$excRule = $this->db->query($sqlRule);
				
				$data['excRule'] = array();			
				foreach($excRule->result_array() as $r){
					
					array_push($data['excRule'], $r['sp_id']);   
				}
				
				$data['todoSearch'] = FALSE;
				$data['frmRule'] = TRUE;
				
					if($action=='saveEditPermission'){## Confirm Edit Permission User
						
						$p['rule'] = $this->input->post('chkRid');
						
						$resultAddRule = $this->backoffice_model->AddRuleUser($uId, $p['rule']);
					
						if($resultAddRule!=FALSE){
							
							$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>แก้ไขข้อมูลเรียบร้อยค่ะ <br />Success : Edit data success.</p></div>');
							redirect('manage/edituser/rule/'.$uId);
							
						}else{
							
							$this->session->set_flashdata('msgResponse','<div class="n_error"><p>เกิดข้อผิดพลาด ไม่สามารถแก้ไขข้อมูลได้ค่ะ <br />Error : Edit data not found.</p></div>');
							redirect('manage/edituser/rule/'.$uId);
							
						}
						
					}
				
				
			}else{
				
				$sadminId = $this->session->userdata('sessUsrId');
				$sUserGroup = $this->session->userdata('sessGroup');
				//if($sadminId!='1'){ $strCon = "WHERE sug_id<>'1' AND sug_id<>'{$sUserGroup}'"; }
			
				$sqlLoadUser = "SELECT su.*, sug.name AS group_name FROM sys_users AS su LEFT JOIN sys_user_groups AS sug ON su.sug_id = sug.sug_id WHERE su.sug_id<>'1';";
				$excLoadUser = $this->db->query($sqlLoadUser);
				$recLoadUser = $excLoadUser->result_array();

				$data['list_user'] = $recLoadUser;
		
			}
		
		}

		$setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));	
		
		$this->template->write('page_title', '3BB Tickets | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_edituser.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();

		
	}

	public function UserGroup(){
			
		$theme = $this->theme;
		$checkSess = $this->backoffice_model->CheckSession();
		
		if($this->uri->segment(3)==''){ $getUrlSegment = $this->router->fetch_method(); }else{ $getUrlSegment = $this->router->fetch_method().'/'.$this->uri->segment(3); }
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'),$getUrlSegment);
		
				
		$pgAction = $this->uri->segment(3);
		$pgId = $this->uri->segment(4);
		$hdConfirm = $this->input->post('hdConfirm');				
		
		if($pgAction=='add'){## Save Permission
			
			if($hdConfirm=='add'){
				
				$p['name'] = $this->input->post('txt_name');
				$p['enable'] = trim($this->input->post('rad_status'));
				
				$this->load->library('form_validation');	
				$this->form_validation->set_error_delimiters('<div class="n_error"><p>', '</p></div>');				
				$this->form_validation->set_rules('txt_name', 'User groupname', 'trim|required');
				$this->form_validation->set_rules("rad_status", "", "trim");
				$this->form_validation->set_message('required', 'Please fill in %s');        																        																	
				
				if($this->form_validation->run() == FALSE){
					
					$strValid = FALSE;
														
				}else{
									
					$result = $this->backoffice_model->AddUserGroup($p['name'],$p['enable']);
					
					if($result!=FALSE){
						
						$sqlSel = "SELECT MAX(sug_id) AS sug_id FROM sys_user_groups;";
						$excSel = $this->db->query($sqlSel);
						$recSel = $excSel->result_array();
						
						$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>บันทึกข้อมูลเรียบร้อยค่ะ <br />Success : Save data success.</p></div>');
						redirect('manage/usergroup/edit/'.$recSel[0]['sug_id']);
						
					}else{
						
						$this->session->set_flashdata('msgResponse','<div class="n_error"><p>เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Save data not found.</p></div>');
						redirect('manage/usergroup');
						
					}
				
				}
				
			}
			
				
		}
		
		if($pgAction=='edit'){
			
			$sqlPerG = "SELECT * FROM sys_permission_groups WHERE enable='1';";
			$data['excPerG'] = $this->db->query($sqlPerG);
			
			$sqlRule = "SELECT spg_id FROM sys_users_groups_permissions WHERE sug_id='{$pgId}';";
			$excRule = $this->db->query($sqlRule);
			
			$data['excRule'] = array();			
			foreach($excRule->result_array() as $r){
				
				array_push($data['excRule'], $r['spg_id']);   
			}
			
			$data['usrDataEdit'] = $this->backoffice_model->ShowUserGroup($pgId);
			
			## Click button edit
			if($hdConfirm=='edit'){
				
				## post and hidden Data
				$p['key'] = $this->input->post('hdKid');
				$p['usr'] = trim($this->input->post('txt_name'));
				$p['rule'] = $this->input->post('chkRid');
				$p['enable'] = $this->input->post('rad_status');
				$p['resetPerm'] = $this->input->post('chk_resetperm');
				$p['saveapply'] = $this->input->post('btn_saveapply');								
				
				$this->load->library('form_validation');	
				$this->form_validation->set_error_delimiters('<div class="n_error"><p>', '</p></div>');				
				$this->form_validation->set_rules('txt_name', 'User groupname', 'trim|required');
				$this->form_validation->set_rules("rad_status", "", "trim");
				$this->form_validation->set_message('required', 'Please fill in %s');        																        																	
				
				if($this->form_validation->run() == FALSE){
					
					$strValid = FALSE;
					$data['usrDataEdit'] = $this->backoffice_model->ShowUserGroup($p['key']);
														
				}else{										
					
					$resultSaveapply = TRUE;
					$resultEdit = $this->backoffice_model->EditUserGroup($p['key'],$p['usr'],$p['enable']);
					$resultAddRule = $this->backoffice_model->AddRuleUserGroup($p['key'],$p['rule']);
										
					if($p['saveapply']=='T'){ 
					
						$resultSaveapply = $this->backoffice_model->AddRuleUserDefault($p['key']); 						
					
					}
					
					if($resultEdit!=FALSE && $resultAddRule!=FALSE && $resultSaveapply!=FALSE){
																		
						$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>แก้ไขข้อมูลเรียบร้อยค่ะ <br />Success : Edit data success.</p></div>');
						redirect('manage/usergroup/edit/'.$p['key']);
						
					}else{
						
						$this->session->set_flashdata('msgResponse','<div class="n_error"><p>เกิดข้อผิดพลาด ไม่สามารถแก้ไขข้อมูลได้ค่ะ <br />Error : Edit data not found.</p></div>');
						redirect('manage/usergroup/edit/'.$p['key']);
						
					}
				
				}
			}
			
			
		}
		
		if($pgAction=='delete'){
			
			$result = $this->backoffice_model->DeleteUserGroup($pgId);
			
			if($result!=FALSE){
					
				$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>ลบข้อมูลเรียบร้อยค่ะ <br />Success : Delete data success.</p></div>');
				redirect('manage/usergroup');
				
			}else{
				
				$this->session->set_flashdata('msgResponse','<div class="n_error"><p>เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้ค่ะ <br />Error : Delete data not found.</p></div>');
				redirect('manage/usergroup');
				
			}
		}
			
		$sqlSel = "SELECT * FROM sys_user_groups WHERE enable='1';";
		$data['excLoadUsrG'] = $this->db->query($sqlSel);
					
		$this->template->write('page_title', 'BackOffice 3BBWiFi | USER GROUPS');
		$this->template->write_view('page_header', 'themes/'. $theme .'/view_header.php');
		$this->template->write_view('page_menu', 'themes/'. $theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $theme .'/view_user_group.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $theme .'/view_footer.php');
		$this->template->render();
		
	}

	public function Permission(){
		
		$checkSess = $this->backoffice_model->CheckSession();
		$theme = $this->theme;
		
		if($this->uri->segment(3)==''){ $getUrlSegment = $this->router->fetch_method(); }else{ $getUrlSegment = $this->router->fetch_method().'/'.$this->uri->segment(3); }
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'),$getUrlSegment);
		
		$pgAction = $this->uri->segment(3);
		$pgId = $this->uri->segment(4);
		$hdConfirm = $this->input->post('hdConfirm');				
		
		## Add
		if($pgAction=='add'){## Save Permission
			
			if($hdConfirm=='add'){
				
				$p['name'] = $this->input->post('txt_name');
				$p['group'] = $this->input->post('sel_group');
				$p['enable'] = trim($this->input->post('rad_status'));
				
				$this->load->library('form_validation');	
				$this->form_validation->set_error_delimiters('<div class="n_error"><p>', '</p></div>');				
				$this->form_validation->set_rules('txt_name', 'Permission name', 'trim|required');
				$this->form_validation->set_rules('sel_group', 'User Groups', 'is_natural_no_zero');
				$this->form_validation->set_rules("rad_status", "", "trim");
				
				$this->form_validation->set_message('required', 'Please fill in %s');        																        																	
				$this->form_validation->set_message('is_natural_no_zero', 'Please choose %s');											
				
				if($this->form_validation->run() == FALSE){
					
					$strValid = FALSE;
														
				}else{
									
					$result = $this->backoffice_model->AddPermission($p['name'],$p['enable'],$p['group']);
					
					if($result!=FALSE){
						
						$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>บันทึกข้อมูลเรียบร้อยค่ะ <br />Success : Save data success.</p></div>');
						redirect('manage/permission');
						
					}else{
						
						$this->session->set_flashdata('msgResponse','<div class="n_error"><p>เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Save data not found.</p></div>');
						redirect('manage/permission');
						
					}
				
				}
				
			}
			
				
		}
		## Edit
		if($pgAction=='edit'){
			
			$data['perDataEdit'] = $this->backoffice_model->ShowPermission($pgId);
			
			## Click button edit
			if($hdConfirm=='edit'){
				
				## post and hidden Data
				$p['key'] = $this->input->post('hdKid');
				$p['usr'] = trim($this->input->post('txt_name'));
				$p['group'] = $this->input->post('sel_group');
				$p['enable'] = $this->input->post('rad_status');
				
				$this->load->library('form_validation');	
				$this->form_validation->set_error_delimiters('<div class="n_error"><p>', '</p></div>');				
				$this->form_validation->set_rules('txt_name', 'Permission name', 'trim|required');
				$this->form_validation->set_rules('sel_group', 'Permission Groups', 'is_natural_no_zero');
				$this->form_validation->set_rules("rad_status", "", "trim");
				
				$this->form_validation->set_message('required', 'Please fill in %s');        																        																	
				$this->form_validation->set_message('is_natural_no_zero', 'Please choose %s');
				
				if($this->form_validation->run() == FALSE){
					
					$strValid = FALSE;
					$data['perDataEdit'] = $this->backoffice_model->ShowPermission($p['key']);
														
				}else{
					
					$result = $this->backoffice_model->EditPermission($p['key'],$p['usr'],$p['enable'],$p['group']);
					
					if($result!=FALSE){
						
						$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>แก้ไขข้อมูลเรียบร้อยค่ะ <br />Success : Edit data success.</p></div>');
						redirect('manage/permission');
						
					}else{
						
						$this->session->set_flashdata('msgResponse','<div class="n_error"><p>เกิดข้อผิดพลาด ไม่สามารถแก้ไขข้อมูลได้ค่ะ <br />Error : Edit data not found.</p></div>');
						redirect('manage/permission');
						
					}
				
				}
			}
			
			
		}
		## Delete
		if($pgAction=='delete'){
			
			$result = $this->backoffice_model->DeletePermission($pgId);
			
			if($result!=FALSE){
					
				$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>ลบข้อมูลเรียบร้อยค่ะ <br />Success : Delete data success.</p></div>');
				redirect('manage/permission');
				
			}else{
				
				$this->session->set_flashdata('msgResponse','<div class="n_error"><p>เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้ค่ะ <br />Error : Delete data not found.</p></div>');
				redirect('manage/permission');
				
			}
		}
			
		$sqlSel = "SELECT sp.*, spg.name AS groupName FROM sys_permissions AS sp LEFT JOIN sys_permission_groups AS spg ON spg.spg_id = sp.spg_id;";
		$data['excLoadPer'] = $this->db->query($sqlSel);
		
		$sqlSelG = "SELECT * FROM sys_permission_groups WHERE enable='1';";
		$data['excLoadG'] = $this->db->query($sqlSelG);
					
		$this->template->write('page_title', 'BackOffice 3BBWiFi | PERMISSION');
		$this->template->write_view('page_header', 'themes/'. $theme .'/view_header.php');
		$this->template->write_view('page_menu', 'themes/'. $theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $theme .'/view_permission.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $theme .'/view_footer.php');
		$this->template->render();
	}

	public function PermissionGroup(){
				
		$checkSess = $this->backoffice_model->CheckSession();
		$theme = $this->theme;
		
		if($this->uri->segment(3)==''){ $getUrlSegment = $this->router->fetch_method(); }else{ $getUrlSegment = $this->router->fetch_method().'/'.$this->uri->segment(3); }
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'),$getUrlSegment);
		
		$pgAction = $this->uri->segment(3);
		$pgId = $this->uri->segment(4);
		$hdConfirm = $this->input->post('hdConfirm');				
		
		if($pgAction=='add'){## Save Permission
			
			if($hdConfirm=='add'){
				
				$p['name'] = $this->input->post('txt_name');
				$p['enable'] = trim($this->input->post('rad_status'));
				
				$this->load->library('form_validation');	
				$this->form_validation->set_error_delimiters('<div class="n_error"><p>', '</p></div>');				
				$this->form_validation->set_rules('txt_name', 'Permission groupname', 'trim|required');
				$this->form_validation->set_rules("rad_status", "", "trim");
				$this->form_validation->set_message('required', 'Please fill in %s');        																        																	
				
				if($this->form_validation->run() == FALSE){
					
					$strValid = FALSE;
														
				}else{
									
					$result = $this->backoffice_model->AddPermissionGroup($p['name'],$p['enable']);
					
					if($result!=FALSE){
						
						$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>บันทึกข้อมูลเรียบร้อยค่ะ <br />Success : Save data success.</p></div>');
						redirect('manage/permissiongroup');
						
					}else{
						
						$this->session->set_flashdata('msgResponse','<div class="n_error"><p>เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Save data not found.</p></div>');
						redirect('manage/permissiongroup');
						
					}
				
				}
				
			}
			
				
		}
		
		if($pgAction=='edit'){
			
			$data['perDataEdit'] = $this->backoffice_model->ShowPermissionGroup($pgId);
			
			## Click button edit
			if($hdConfirm=='edit'){
				
				## post and hidden Data
				$p['key'] = $this->input->post('hdKid');
				$p['usr'] = trim($this->input->post('txt_name'));
				$p['enable'] = $this->input->post('rad_status');
				
				$this->load->library('form_validation');	
				$this->form_validation->set_error_delimiters('<div class="n_error"><p>', '</p></div>');				
				$this->form_validation->set_rules('txt_name', 'Permission groupname', 'trim|required');
				$this->form_validation->set_rules("rad_status", "", "trim");
				$this->form_validation->set_message('required', 'Please fill in %s');        																        																	
				
				if($this->form_validation->run() == FALSE){
					
					$strValid = FALSE;
					$data['perDataEdit'] = $this->backoffice_model->ShowPermissionGroup($p['key']);
														
				}else{
					
					$result = $this->backoffice_model->EditPermissionGroup($p['key'],$p['usr'],$p['enable']);
					
					if($result!=FALSE){
						
						$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>แก้ไขข้อมูลเรียบร้อยค่ะ <br />Success : Edit data success.</p></div>');
						redirect('manage/permissiongroup');
						
					}else{
						
						$this->session->set_flashdata('msgResponse','<div class="n_error"><p>เกิดข้อผิดพลาด ไม่สามารถแก้ไขข้อมูลได้ค่ะ <br />Error : Edit data not found.</p></div>');
						redirect('manage/permissiongroup');
						
					}
				
				}
			}
			
			
		}
		
		if($pgAction=='delete'){
			
			$result = $this->backoffice_model->DeletePermissionGroup($pgId);
			
			if($result!=FALSE){
					
				$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>ลบข้อมูลเรียบร้อยค่ะ <br />Success : Delete data success.</p></div>');
				redirect('manage/permissiongroup');
				
			}else{
				
				$this->session->set_flashdata('msgResponse','<div class="n_error"><p>เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้ค่ะ <br />Error : Delete data not found.</p></div>');
				redirect('manage/permissiongroup');
				
			}
		}
			
		$sqlSel = "SELECT * FROM sys_permission_groups;";
		$data['excLoadPerG'] = $this->db->query($sqlSel);
					
		$this->template->write('page_title', 'BackOffice 3BBWiFi | PERMISSION GROUP');
		$this->template->write_view('page_header', 'themes/'. $theme .'/view_header.php');
		$this->template->write_view('page_menu', 'themes/'. $theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $theme .'/view_permission_group.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $theme .'/view_footer.php');
		$this->template->render();
		
	}

	public function userkey_exists($str){
		
		$result = $this->backoffice_model->getUser($str);
		
		if($result==FALSE){
			
			$this->form_validation->set_message('userkey_exists', '%s has already exits.');
			return FALSE;
			
		}else{
			
			return TRUE;
		}
	}

	public function editProfile(){
		
		$checkSess = $this->backoffice_model->CheckSession();
		$theme = $this->theme;
		
		if($this->uri->segment(3)==''){ $getUrlSegment = $this->router->fetch_method(); }else{ $getUrlSegment = $this->router->fetch_method().'/'.$this->uri->segment(3); }
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'),$getUrlSegment);
		
		$uId = $this->session->userdata('sessUsrId');
		$action = $this->input->post('action');
		
		if($action=='saveEditProfile'){
			
			## Get Post Value
			$p['fname'] = $this->input->post('txt_fname');
			$p['lname'] = $this->input->post('txt_lname');
			if($this->input->post('rad_sex')=='1'){ $p['sex'] = 'male';}
			if($this->input->post('rad_sex')=='2'){ $p['sex'] = 'female';}
			$p['email'] = $this->input->post('txt_email');
			$p['enable'] = $this->input->post('rad_status');
									
			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="n_error"><p>', '</p></div>');				
			$this->form_validation->set_rules('txt_fname', 'First name', 'trim|required');
			$this->form_validation->set_rules('txt_lname', 'Last name', 'trim|required');
			$this->form_validation->set_rules("rad_sex", "", "trim");
			$this->form_validation->set_rules('txt_email', 'Email', 'trim|required|valid_email');
			
			$this->form_validation->set_message('required', 'Please fill in %s');        																
			
			if($this->form_validation->run() == FALSE){
				
				$strValid = FALSE;
								
			}else{# form_validation = TRUE
				
				$result = $this->backoffice_model->editProfile($uId,$p);
				
				if($result!=FALSE){
					
					$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>แก้ไขข้อมูลเรียบร้อยค่ะ <br />Success : Edit data success.</p></div>');
					redirect('manage/editprofile/');
				}else{
					
					$this->session->set_flashdata('msgResponse','<div class="n_error"><p>เกิดข้อผิดพลาด ไม่สามารถแก้ไขข้อมูลได้ค่ะ <br />Error : Edit data not found.</p></div>');
					redirect('manage/editprofile');	
				}				
				
			}
		}
								
		$data['recLoadUser'] = $this->backoffice_model->ShowUser($uId);
		
		$this->template->write('page_title', 'BackOffice 3BBWiFi | EDIT PROFILE');
		$this->template->write_view('page_header', 'themes/'. $theme .'/view_header.php');
		$this->template->write_view('page_menu', 'themes/'. $theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $theme .'/view_editprofile.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $theme .'/view_footer.php');
		$this->template->render();
		
	}

	public function changePassword(){
		
		$checkSess = $this->backoffice_model->CheckSession();
		$theme = $this->theme;
		
		if($this->uri->segment(3)==''){ $getUrlSegment = $this->router->fetch_method(); }else{ $getUrlSegment = $this->router->fetch_method().'/'.$this->uri->segment(3); }
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'),$getUrlSegment);
		
		$uId = $this->session->userdata('sessUsrId');
		$action = $this->input->post('action');
		
		if($action=='changePassword'){
			
			## Get Post Value
			$p['oldPwd'] = $this->input->post('txt_oldpwd');
			$p['newPwd'] = $this->input->post('txt_newpwd');
			$p['cfPwd'] = $this->input->post('txt_cfpwd');
									
			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="n_error"><p>', '</p></div>');
			$this->form_validation->set_rules('txt_oldpwd', 'Old Password', 'trim|required|min_length[4]|max_length[16]');
			$this->form_validation->set_rules('txt_newpwd', 'New Password', 'trim|required|min_length[4]|max_length[16]');
			$this->form_validation->set_rules('txt_cfpwd', 'Confirm Password', 'trim|required|min_length[4]|max_length[16]|matches[txt_newpwd]');
			
			$this->form_validation->set_message('required', 'Please fill in %s');
			$this->form_validation->set_message('min_length', '%s: the minimum of characters is %s');        																
			$this->form_validation->set_message('max_length', '%s: the maximum of characters is %s');
			
			
			if($this->form_validation->run() == FALSE){
				
				$strValid = FALSE;
				
			}else{
				
				$result = $this->backoffice_model->changePassword($uId,$p);
				
				if($result!=FALSE){
					
					$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>แก้ไขข้อมูลเรียบร้อยค่ะ <br />Success : Edit data success.</p></div>');
					redirect('manage/changepassword');
				}else{
					
					$this->session->set_flashdata('msgResponse','<div class="n_error"><p>รหัสผ่านเก่าไม่ถูกต้อง ไม่สามารถแก้ไขข้อมูลได้ค่ะ <br />Error : Old password incorrected, Edit data not found.</p></div>');
					redirect('manage/changepassword');	
				}
				
			}
		}
		
		$this->template->write('page_title', 'BackOffice 3BBWiFi | CHANGE PASSWORD');
		$this->template->write_view('page_header', 'themes/'. $theme .'/view_header.php');
		$this->template->write_view('page_menu', 'themes/'. $theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $theme .'/view_changepassword.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $theme .'/view_footer.php');
		$this->template->render();
	}

	public function createAccount(){
		
		$checkSess = $this->backoffice_model->CheckSession();
		$theme = $this->theme;
		
		/*if($this->uri->segment(3)==''){ $getUrlSegment = $this->router->fetch_method(); }else{ $getUrlSegment = $this->router->fetch_method().'/'.$this->uri->segment(3); }
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'),$getUrlSegment);*/
		
		$action = $this->input->post('action');
		
		if($action=='saveCreateAccount'){
			
			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="n_error"><p>', '</p></div>');				
			$this->form_validation->set_rules('ran_usr', 'Type Username', 'required');
			$this->form_validation->set_rules('ran_pwd', 'Type Password', 'required');
			$this->form_validation->set_rules('rad_serial', 'Type Serial', 'required');
						
			## Username
			$usrType = $this->input->post('ran_usr');
				
				if($usrType=="randomUsr"){
					
					$p['usr'] = $this->radius3bb->RandomText(8);
					
				}else{ 
								
					$this->form_validation->set_rules('txt_usr', 'Username', 'trim|required|min_length[4]|max_length[16]');
					$p['usr'] = $this->input->post('txt_usr');
								
				}									
			
			## Password
			$pwdType = $this->input->post('ran_pwd');
				
				if($pwdType=="randomPwd"){
					
					$p['pwd'] = $this->radius3bb->RandomNumber(4);
					
				}else{ 
					
					$this->form_validation->set_rules('txt_pwd', 'Password', 'trim|required|min_length[4]|max_length[16]');
					$p['pwd'] = $this->input->post('txt_pwd');
				}
			
							
			## Serial
			$serialType = $this->input->post('rad_serial');
				
				if($serialType=="firstPrefix"){
					
					 $this->form_validation->set_rules('txt_prefix_s', 'Prefix Serial', 'trim|required');	
					 $p['serial'] = strtoupper(trim($this->input->post('txt_prefix_s'))).date('ym').'-'.strtoupper($p['usr']); 
				}elseif($serialType=="customPrefix"){
				
					 $this->form_validation->set_rules('txt_custom_s', 'Custom Serial', 'trim|required');		
					 $p['serial'] = strtoupper($this->input->post('txt_custom_s')); 
				}else{
					
					 $p['serial'] = strtoupper($this->radius3bb->RandomText(6)).date('ym').'-'.strtoupper($p['usr']); 
				}
	
			## Credit
			$accountType = $this->input->post('rad_expire');
				if($accountType=="credit"){
					
					$this->form_validation->set_rules('txt_credit', 'Credit', 'trim|required|numeric');
					$p['validCredit'] = $this->input->post('txt_credit');
					$this->form_validation->set_rules('txt_credit_expire', 'Expire Credit Date', 'trim|required');
					$p['validDate'] = $this->input->post('txt_credit_expire');
				}else{// Date
					
					$this->form_validation->set_rules('txt_expirydate', 'Expire Date', 'trim|required');
					$p['expiryDate'] = $this->input->post('txt_expirydate');
				}
			
				
			$this->form_validation->set_message('required', 'Please fill in %s');        																
			$this->form_validation->set_message('min_length', '%s: the minimum of characters is %s');        																
			$this->form_validation->set_message('max_length', '%s: the maximum of characters is %s');        																
			$this->form_validation->set_message('numeric', 'Please fill in %s numeric character');        																
				
			if($this->form_validation->run() == FALSE){				
		
				$this->session->set_flashdata('msgResponse',''.validation_errors().'');
				redirect('manage/createaccount#oneAccount');
					
			}else{
				
				$rdResult = $this->radius3bb->CheckAccount($p['usr']);//Check Account DB
				
				if($rdResult['code'] == '701'){//OK	
																					
					$this->radius3bb->Username = $p['usr'];
					$this->radius3bb->Password = $p['pwd'];
					$this->radius3bb->Serial = $p['serial'];
					$this->radius3bb->ValidCredit = $accountType=="credit" ? $p['validCredit']: 0;
					$this->radius3bb->ValidDate = $accountType=="credit" ? date('Y-m-d H:i:s'): $p['expiryDate'].' '.date('H:i:s');
					$this->radius3bb->ValidExpire = $accountType=="credit" ? $p['validDate'].' '.date('H:i:s'): $p['expiryDate'].' '.date('H:i:s');
					$rdResult = $this->radius3bb->CreateAccount();
					
					if($rdResult['code']=="200"){
						
						$validCredit = $accountType=="credit" ? $p['validCredit']: 0;						
						$expiryDate = $accountType=="credit" ? $p['validDate']: $p['expiryDate'];
																	
						$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>ระบบได้ทำการสร้างแอคเคาท์เรียบร้อยค่ะ <br />Success : Create Account Success.</p><span style="font-size:12px;">&nbsp;&nbsp;&nbsp;<b>Username : </b>'.$p['usr'].'</span><br/><br/><span style="font-size:12px;">&nbsp;&nbsp;&nbsp;<b>Password : </b>'.$p['pwd'].'</span><br/><br/><span style="font-size:12px;">&nbsp;&nbsp;&nbsp;<b>Serial : </b>'.$p['serial'].'</span><br/><br/><span style="font-size:12px;">&nbsp;&nbsp;&nbsp;<b>Credit : </b>'.$validCredit.'</span><br/><br/><span style="font-size:12px;">&nbsp;&nbsp;&nbsp;<b>Expiry Date : </b><font color="#FF0000">'.$expiryDate.'</font></span><br/><br/></div>');
						redirect('manage/createaccount#oneAccount');
						
					}else{
												
						$this->session->set_flashdata('msgResponse','<div class="n_error"><p>Internal Server Error: Can not INSERT Account data.</p></div>');
						redirect('manage/createaccount#oneAccount');
					}
					
					
				}elseif($rdResult['code'] == '702'){
							
					$this->session->set_flashdata('msgResponse','<div class="n_error"><p>WiFi account has already contained in database.</p></div>');
					redirect('manage/createaccount#oneAccount');
					
				}else{
										
					$this->session->set_flashdata('msgResponse','<div class="n_error"><p>Invalid Parameter.</p></div>');
					redirect('manage/createaccount#oneAccount');
				}
				
			}
			
		}else{
		
			$this->template->write('page_title', 'BackOffice 3BBWiFi | CREATE ACCOUNT');
			$this->template->write_view('page_header', 'themes/'. $theme .'/view_header.php');
			$this->template->write_view('page_menu', 'themes/'. $theme .'/view_menu.php');
			$this->template->write_view('page_content', 'themes/'. $theme .'/view_createaccount.php');
			$this->template->write_view('page_footer', 'themes/'. $theme .'/view_footer.php');
			$this->template->render();
		}
	
	}
	
	
	
	public function createMacauthen(){
					
		$checkSess = $this->backoffice_model->CheckSession();
		$theme = $this->theme;
		
		/*if($this->uri->segment(3)==''){ $getUrlSegment = $this->router->fetch_method(); }else{ $getUrlSegment = $this->router->fetch_method().'/'.$this->uri->segment(3); }
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'),$getUrlSegment);*/
		
		$action = $this->input->post('action');
		
		if($action=='saveCreateMacauthen'){
			
			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="n_error"><p>', '</p></div>');				
			
			$this->form_validation->set_rules('txt_usr', 'Username', 'trim|required');
			$p['usr'] = strtoupper(str_replace(':','-',$this->input->post('txt_usr')));
					
			## Serial
			$serialType = $this->input->post('rad_serial');
				
			if($serialType=="firstPrefix"){
				
				 $this->form_validation->set_rules('txt_prefix_s', 'Prefix Serial', 'trim|required');	
				 $p['serial'] = strtoupper(trim($this->input->post('txt_prefix_s'))).date('ym').'-'.strtoupper(str_replace('-','',$p['usr'])); 
			}elseif($serialType=="customPrefix"){
			
				 $this->form_validation->set_rules('txt_custom_s', 'Custom Serial', 'trim|required');		
				 $p['serial'] = strtoupper($this->input->post('txt_custom_s')); 
			}else{
				
				 $p['serial'] = strtoupper($this->radius3bb->RandomText(6)).date('ym').'-'.strtoupper(str_replace('-','',$p['usr'])); 
			}
			
			$this->form_validation->set_rules('txt_expirydate', 'Expire Date', 'trim|required');
			$p['expiryDate'] = $this->input->post('txt_expirydate').' '.date('H:i:s');
			
			$this->form_validation->set_message('required', 'Please fill in %s');
				
			if($this->form_validation->run() == FALSE){				
		
				$this->session->set_flashdata('msgResponse',''.validation_errors().'');
				redirect('manage/createmacauthen#createMacauthen');
					
			}else{
				
				$rdResult = $this->radius3bb->CheckAccount($p['usr']);//Check Account DB
				
				if($rdResult['code'] == '701'){//OK
					
					$this->radius3bb->MacAuthen = $p['usr'];
					$this->radius3bb->MacSerial = $p['serial'];
					$this->radius3bb->ValidExpire = $p['expiryDate'];
					$rdResult = $this->radius3bb->CreateMacAuthen();
					
					if($rdResult['code']=="200"){
																						

						$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>ระบบได้ทำการสร้างล็อกอินอัตโนมัติเรียบร้อยค่ะ <br />Success : Create Macauthen Success.</p><span style="font-size:12px;">&nbsp;&nbsp;&nbsp;<b>Username : </b>'.$p['usr'].'</span><br/><br/><span style="font-size:12px;">&nbsp;&nbsp;&nbsp;<b>Serial : </b>'.$p['serial'].'</span><br/><br/><span style="font-size:12px;">&nbsp;&nbsp;&nbsp;<b>Expiry Date : </b><font color="#FF0000">'.$p['expiryDate'].'</font></span><br/><br/></div>');
						redirect('manage/createmacauthen#createMacauthen');
						
						
					}else{
												
						$this->session->set_flashdata('msgResponse','<div class="n_error"><p>Internal Server Error: Can not INSERT Account data.</p></div>');
						redirect('manage/createmacauthen#createMacauthen');
					}
					
					
				
				}elseif($rdResult['code'] == '702'){
					
					$this->session->set_flashdata('msgResponse','<div class="n_error"><p>WiFi macauthen has already contained in database.</p></div>');
					redirect('manage/createmacauthen#createMacauthen');
					
				}else{
					
					$this->session->set_flashdata('msgResponse','<div class="n_error"><p>Invalid Parameter.</p></div>');
					redirect('manage/createmacauthen#createMacauthen');
					
				}
				
			}
			
		}elseif($action=='saveRegisterMacauthen'){
			
			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="n_error"><p>', '</p></div>');
			$this->form_validation->set_rules('txt_usr', 'Username', 'trim|required');
			$this->form_validation->set_rules('txt_mac', 'Mac address', 'trim|required');
			$p['mac'] = strtoupper(str_replace(':','-',$this->input->post('txt_mac')));
			$p['usr'] = $this->input->post('txt_usr');
			
			$this->form_validation->set_message('required', 'Please fill in %s');
			
			if($this->form_validation->run() == FALSE){				
				
				$strValid==FALSE;
												
				$this->template->write('page_title', 'BackOffice 3BBWiFi | CREATE MACAUTHEN');
				$this->template->write_view('page_header', 'themes/'. $theme .'/view_header.php');
				$this->template->write_view('page_menu', 'themes/'. $theme .'/view_menu.php');
				$this->template->write_view('page_content', 'themes/'. $theme .'/view_createmacauthen.php');
				$this->template->write_view('page_footer', 'themes/'. $theme .'/view_footer.php');
				$this->template->render();
				/*$this->session->set_flashdata('msgResponse',''.validation_errors().'');
				redirect('manage/createmacauthen#registerMacauthen');*/
					
			}else{
				
				$rdResult = $this->radius3bb->DetailAccount($p['usr']);
				
				if($rdResult['rspPara']['mac_profile_id']!=0){
					
					$this->session->set_flashdata('msgResponse','<div class="n_error"><p>Username has already macauthen in database.</p></div>');
					redirect('manage/createmacauthen');
				}else{
					
					$rdClass->Username = $p['usr'];
					$rdClass->MacAuthen = $p['mac'];
					$rdResult = $rdClass->RegisterMacAuthen();
					
					if($rdResult['code']=='200'){
						
						$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>ระบบได้ทำการลงทะเบียนล็อกอินอัตโนมัติเรียบร้อยค่ะ <br />Success : Register Macauthen Success.</p><span style="font-size:12px;">&nbsp;&nbsp;&nbsp;<b>Username : </b>'.$p['usr'].'</span><br/><br/><span style="font-size:12px;">&nbsp;&nbsp;&nbsp;<b>Mac Address : </b>'.$p['mac'].'</span><br/><br/></div>');
						redirect('manage/createmacauthen#registerMacauthen');
						
					}else{
						
						$this->session->set_flashdata('msgResponse','<div class="n_error"><p>Internal Server Error: Can not UPDATE Account data.</p></div>');
						redirect('manage/createmacauthen#registerMacauthen');
					}
					
				}
				
			}
		
		}elseif($action=='saveUnRegisterMacauthen'){
		
			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="n_error"><p>', '</p></div>');
			$this->form_validation->set_rules('txt_usr', 'Username', 'trim|required');
			$this->form_validation->set_rules('txt_mac', 'Mac address', 'trim|required');
			$p['mac'] = strtoupper(str_replace(':','-',$this->input->post('txt_mac')));
			$p['usr'] = $this->input->post('txt_usr');
			
			$this->form_validation->set_message('required', 'Please fill in %s');
			
			if($this->form_validation->run() == FALSE){				
		
				$this->session->set_flashdata('msgResponse',''.validation_errors().'');
				redirect('manage/createmacauthen#unRegisterMacauthen');
					
			}else{
				
				$rdResult = $this->radius3bb->DetailAccount($p['usr']);
				
				if($rdResult['rspPara']['mac_profile_id']==0){
					
					$this->session->set_flashdata('msgResponse','<div class="n_error"><p>Username is not mac authen.</p></div>');
					redirect('manage/createmacauthen#unRegisterMacauthen');
					
				}else{
					
					$rdClass->Username = $p['usr'];
					$rdClass->MacAuthen = $p['mac'];
					$rdResult = $rdClass->UnRegisterMacAuthen();
					
					if($rdResult['code']=='200'){
						
						$this->session->set_flashdata('msgResponse','<div class="n_ok"><p>ระบบได้ทำการยกเลิกลงทะเบียนล็อกอินอัตโนมัติเรียบร้อยค่ะ <br />Success : UnRegister Macauthen Success.</p><span style="font-size:12px;">&nbsp;&nbsp;&nbsp;<b>Username : </b>'.$p['usr'].'</span><br/><br/><span style="font-size:12px;">&nbsp;&nbsp;&nbsp;<b>Mac Address : </b>'.$p['mac'].'</span><br/><br/></div>');
						
						redirect('manage/createmacauthen#unRegisterMacauthen');
						
					}else{
						
						$this->session->set_flashdata('msgResponse','<div class="n_error"><p>Internal Server Error: Can not UPDATE Account data.</p></div>');
						redirect('manage/createmacauthen#unRegisterMacauthen');
					}
					
				}
				
			}
			
		}else{
			
			$this->template->write('page_title', 'BackOffice 3BBWiFi | CREATE MACAUTHEN');
			$this->template->write_view('page_header', 'themes/'. $theme .'/view_header.php');
			$this->template->write_view('page_menu', 'themes/'. $theme .'/view_menu.php');
			$this->template->write_view('page_content', 'themes/'. $theme .'/view_createmacauthen.php');
			$this->template->write_view('page_footer', 'themes/'. $theme .'/view_footer.php');
			$this->template->render();
		}
			
	}
	
}

