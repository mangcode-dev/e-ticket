<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permissiongroup extends CI_Controller {

	
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


	public function index()
	{
		
	}

	public function manage(){

		$data['str_validate'] = '';
		$data['img_path'] = $this->img_path;

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));


		$sqlSel = "SELECT * FROM sys_permission_groups;";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		$data['list_permissiongroup'] = $recSel;

		$data['frmEdit'] = FALSE;

		$pgid = $this->uri->segment(3);
		if($pgid != ''){

			$sqlSel = "SELECT * FROM sys_permission_groups WHERE spg_id='{$pgid}';";
			$excSel = $this->db->query($sqlSel);
			$numSel = $excSel->num_rows();
			
			if($numSel != 0){
				
				$data['perDataEdit'] = $this->backoffice_model->ShowPermissionGroup($pgid);
				$data['frmEdit'] = TRUE;

				// var_dump($data['perDataEdit']);
				// exit;
			
			}else{ redirect('permissiongroup/manage'); }


		}

	
		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());	
		
		$this->template->write('page_title', 'E-TICKET | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_managepermissiongroup.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();

	}

	public function add(){

		$data['str_validate'] = '';

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$action = base64_decode($this->input->post('action'));


		if($action=='addPermissionGroup'){

			$p['name'] = $this->input->post('txt_name');
			$p['enable'] = trim($this->input->post('rad_status'));

			

			if($p['name']==''){
				$this->session->set_flashdata('msg_error', ' alert_message("Please fill the data" , "Update error" , "#ff6849" , "error")');
				redirect('Permissiongroup/manage');
			}else{
				$result = $this->backoffice_model->AddPermissionGroup($p['name'],$p['enable']);

				if($result!=FALSE){
					$this->session->set_flashdata('msg_success', ' alert_message("Successfully" , "Update completed" , "#ff6849" , "success")');
					redirect('Permissiongroup/manage');
				}else{
					$this->session->set_flashdata('msg_error', ' alert_message("Please Check" , "Update error" , "#ff6849" , "error")');
					redirect('permissiongroup/manage');
				}
			}
			
		}

	}



	public function edit($pgid){

		$data['str_validate'] = '';

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$action = base64_decode($this->input->post('action'));

		if($action=='editPermissionGroup'){

			$p['key'] = $pgid;
			$p['usr'] = trim($this->input->post('txt_name'));
			$p['enable'] = $this->input->post('rad_status');

			if ($p['usr']=='') {

				$this->session->set_flashdata('msg_error', ' alert_message("Something wrong!" , "Update error" , "#ff6849" , "error")');
				redirect('Permissiongroup/manage/'.$pgid);

			} else {
				
				$result = $this->backoffice_model->EditPermissionGroup($p['key'],$p['usr'],$p['enable']);

				if($result!=FALSE){
					$this->session->set_flashdata('msg_success', ' alert_message("Successfully" , "Update completed" , "#ff6849" , "success")');
					redirect('Permissiongroup/manage/'.$pgid);
				}else{
					$this->session->set_flashdata('msg_error', ' alert_message("Something wrong!" , "Update error" , "#ff6849" , "error")');
					redirect('Permissiongroup/manage');
				}
			}

		}

	}


	public function delete($pgid){

		$result = $this->backoffice_model->DeletePermissionGroup($pgid);
			
		if($result!=FALSE){
				
			$this->session->set_flashdata('msg_success', ' alert_message("Successfully" , "Delete completed" , "#ff6849" , "success")');
			redirect('Permissiongroup/manage/');
			
		}else{
			
			$this->session->set_flashdata('msg_error', ' alert_message("Something wrong!" , "Delete error" , "#ff6849" , "error")');
			redirect('Permissiongroup/manage');
			
		}
	}



}

