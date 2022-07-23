<?php
class Manage_model extends CI_Model {

	public function M_test()
	{
    if (empty($this->session->userdata('sessUsr'))){
      redirect("login/account");
    }
    return true;
  }
	public function MD_Check_promotion_code($pro_code){
		$this->db = $this->load->database('default', true);
		$sql = "select count(pro_id) from sys_promotion where pro_code = '$pro_code' and pro_deleted_flg = '0'";
		$query = $this->db->query($sql);
	  $result = $query->result_array();
		if (empty($result)){
			return "0";
		}else{
			return "1";
		}
	}
}

?>
