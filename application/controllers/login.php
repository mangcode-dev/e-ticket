<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

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
		$this->backoffice_model->checksession();
		redirect('Manage');
	}

	public function Account()
	{


			$data['str_validate'] = '';
		$data['img_path'] = $this->img_path;

		$action = base64_decode($this->input->post('action'));
if(	$this->backoffice_model->checksession()){
		if ($action == 'login') {






			$usr = $this->input->post('txt_usr');
			$pwd = $this->input->post('txt_pwd');


			// echo $pwd;
			// exit;

			$usrData = $this->backoffice_model->Login($usr, $pwd);
			// var_dump($usrData);
			// exit;

			if ($usrData['action'] != 'err') {

				$arrData = array('sessUsr' => $usrData['username'], 'sessUsrId' => $usrData['su_id'], 'sessGroup' => $usrData['sug_id'], 'sessLastacc' => $usrData['last_access'],'password_pofile' => base64_decode($pwd), 'loggedIn' => "OK");

				$this->session->set_userdata($arrData);
				redirect('login');
			} else {

				if ($usrData['value'] == 'b') {

					$this->session->set_flashdata('msg_error', ' alert_message("Please Check" , "Username and Password" , "#ff6849" , "error")');
				} else {

					$this->session->set_flashdata('msg_error', 'alert_message("Please Check" , "Username and Password" , "#ff6849" , "error")');
				}
				redirect('login/account');
			}
		}

			$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
			$this->template->set_master_template('themes/' . $this->theme . '/tpl_login.php');
			$this->template->write('page_title', 'E-MARKETING | ' . $setTitle . '');
			$this->template->write_view('page_content', 'themes/' . $this->theme . '/view_login.php', $data);
			$this->template->render();
		}else {
			redirect('Manage');
		}
	}
	public function login(){
		if ($this->backoffice_model->checksession()){
			$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
			$this->template->set_master_template('themes/' . $this->theme . '/tpl_login.php');
			$this->template->write('page_title', 'E-MARKETING | ' . $setTitle . '');
			$this->template->write_view('page_content', 'themes/' . $this->theme . '/view_login.php', $data);
			$this->template->render();
		}else{
			redirect('Manage/home');
		}
	}
}
