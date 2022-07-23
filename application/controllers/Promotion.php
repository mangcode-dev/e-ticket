<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promotion extends CI_Controller {

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
		$this->load->model('Manage_model');
	}


	public function index(){

	}

	public function add(){
		$data['str_validate'] = '';
		$data['img_path'] = $this->img_path;
		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$action = base64_decode($this->input->post('action'));

		if($action=='add_promotion'){

			## Get Post Value
			// if(){
			//
			// }
			$p['oldPwd'] = $this->input->post('txt_oldpwd');
			$p['newPwd'] = $this->input->post('txt_newpwd');
			$p['cfPwd'] = $this->input->post('txt_cfpwd');


			// $this->load->library('form_validation');
			// $this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in">
			// 					<button class="close" data-dismiss="alert">
			// 						×
			// 					</button>
			// 					<i class="fa-fw fa fa-times"></i>
			// 					<strong>Error!</strong><br />', '</div>');

			// $this->form_validation->set_rules('txt_oldpwd', 'Old Password', 'trim|required|min_length[4]|max_length[16]');
			// $this->form_validation->set_rules('txt_newpwd', 'New Password', 'trim|required|min_length[4]|max_length[16]');
			// $this->form_validation->set_rules('txt_cfpwd', 'Confirm Password', 'trim|required|min_length[4]|max_length[16]|matches[txt_newpwd]');
			//
			// $this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาทำการตรวจสอบด้วยค่ะ');
			// $this->form_validation->set_message('alpha_numeric', '%s ห้ามใช้ตัวอักษรอักขระพิเศษ');
			// $this->form_validation->set_message('min_length', '%s: ต้องกรอกไม่น้อยกว่า %s ตัวอักษร');
			// $this->form_validation->set_message('max_length', '%s: ต้องกรอกไม่เกิน %s ตัวอักษร');
			// $this->form_validation->set_message('valid_email', 'รูปแบบ Email ไม่ถูกต้อง');
			// $this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบด้วยค่ะ %s');

			// if($this->form_validation->run() == FALSE){
			if ($this->session->userdata('password_pofile') == base64_decode(	$p['oldPwd'])){
						 if($p['newPwd'] != $p['cfPwd']){
							 // echo "<script>alert('NO HAVE')</script>";
							$this->session->set_flashdata('msgResponse', 'alert_message("Please Check" , "รหัสผ่านใหม่ หรือ การ Confirmed ไม่เหมือนกัน" , "#ff6849" , "error")');
							$data['str_validate'] = FALSE;
						}else{
							// echo "OK";
							// print_r($p);
							$result = $this->backoffice_model->changePassword($this->session->userdata('sessUsrId'),$p);
							// print_r($result);
							// exit();
							if($result!=FALSE){
									$this->session->set_flashdata('msgResponse', 'alert_message("Success" , "บันทึกข้อมูลเรียบร้อยค่ะ" , "#ff6849" , "success")');

								// $this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-check"></i> <strong>บันทึกข้อมูลเรียบร้อยค่ะ </strong><br />Success : Change Password success.</div>');
								redirect('Changepassword/account');

							}else{

								// $this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								// 			<button class="close" data-dismiss="alert">
								// 				×
								// 			</button>
								// 			<i class="fa-fw fa fa-times"></i>
								// 			<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Change Pasword not found.</div>');
								$this->session->set_flashdata('msgResponse', 'alert_message("Please Check" , "เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ" , "#ff6849" , "error")');
								redirect('Changepassword/account');
							}

						}
		}else {
			$this->session->set_flashdata('msgResponse', 'alert_message("Please Check" , "รหัสผ่านเก่าผิด" , "#ff6849" , "error")');
			redirect('changepassword/account');
		}

		}

		// $setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());
		//
		// $this->template->write('page_title', 'VAS Quotation | '.$setTitle.'');
		// $this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		// $this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		// $this->template->write_view('page_content', 'themes/'. $this->theme .'/view_changepassword.php', $data);
		// $this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		// $this->template->render();
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());

		$this->template->write('page_title', 'E-TICKET | ' . $setTitle . '');
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/view_menu.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/view_promotion.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/view_footer.php');
		$this->template->render();


	}

}
