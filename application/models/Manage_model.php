<?php
class Manage_model extends CI_Model {

	public function M_test()
	{
    if (empty($this->session->userdata('sessUsr'))){
      redirect("login/account");
    }
    return true;
  }
}

?>
