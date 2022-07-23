<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editprofile extends CI_Controller {

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

	public function account(){

		$data['str_validate'] = '';
		$data['img_path'] = $this->img_path;

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));


		$action = base64_decode($this->input->post('action'));

		if($action=='editprofile'){

			## Get Post Value

			$p['fname'] = $this->input->post('txt_fname');
			$p['lname'] = $this->input->post('txt_lname');
			$p['email'] = $this->input->post('txt_email');
			if($this->input->post('rad_sex')=='male'){ $p['sex'] = 'male';}
			if($this->input->post('rad_sex')=='female'){ $p['sex'] = 'female';}
			 if(trim($p['fname']) == ""){
				 $this->session->set_flashdata('msgResponse', 'alert_message("Please Check" , "กรุณากรอกชื่อ" , "#ff6849" , "error")');
			 }elseif (trim($p['lname']) == "") {
				 $this->session->set_flashdata('msgResponse', 'alert_message("Please Check" , "กรุณากรอกนามสกุล" , "#ff6849" , "error")');
			}elseif (trim($p['email']) == "") {
				$this->session->set_flashdata('msgResponse', 'alert_message("Please Check" , "กรุณากรอก Email" , "#ff6849" , "error")');
			}else{
				$result = $this->backoffice_model->editProfile($this->session->userdata('sessUsrId'),$p);
				if($result!=FALSE){
					$this->session->set_flashdata('msgResponse', 'alert_message("Success" , "บันทึกข้อมูลเรียบร้อยค่ะ" , "#ff6849" , "success")');
					redirect('editprofile/account');
				}else{
					$this->session->set_flashdata('msgResponse', 'alert_message("Please Check" , "เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ" , "#ff6849" , "error")');
					redirect('editprofile/account');
				}

			}


		}

		$sqlLoadUser = "SELECT * FROM sys_users WHERE su_id='".$this->session->userdata('sessUsrId')."';";
		$excLoadUser = $this->db->query($sqlLoadUser);
		$recLoadUser = $excLoadUser->result_array();
		$data['recLoadUser'] = $recLoadUser[0];

		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());

		// $this->template->write('page_title', 'VAS Quotation | '.$setTitle.'');
		// $this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		// $this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		// $this->template->write_view('page_content', 'themes/'. $this->theme .'/view_editprofile.php', $data);
		// $this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		// $this->template->render();



				$this->template->write('page_title', 'E-TICKET | ' . $setTitle . '');
				$this->template->write_view('page_header', 'themes/' . $this->theme . '/view_header.php', $data);
				$this->template->write_view('page_menu', 'themes/' . $this->theme . '/view_menu.php');
				$this->template->write_view('page_content', 'themes/' . $this->theme . '/view_editprofile.php', $data);
				$this->template->write_view('page_footer', 'themes/' . $this->theme . '/view_footer.php');
				$this->template->render();
	}


}
