<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apiadddescription extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function index()
	{
		
	}

	public function addItemDescription($sid, $txtSearch)
	{
		header('Content-Type: application/json');

		$desitemname=$_POST['desitemname'];
		$desitemdetail=$_POST['desitemdetail'];
		$sel_status=$_POST['sel_status'];
		$txt_price=$_POST['txt_price'];

		if ($sel_status=='ena') {
			$status = 'Y';
		}else{
			$status = 'N';
		}

		$this->db->select_max('qd_ordering');
		$query = $this->db->get('quotation_description');

		foreach ($query->result() as $row)
				{
					$st = $row->qd_ordering;
				}
				$st++;

		$this->db->query("INSERT INTO quotation_description SET qd_name='{$desitemname}', qd_description='{$desitemdetail}', qd_price_per_unit='{$txt_price}' , qd_enable='{$status}', qd_ordering='{$st}', qd_created=NOW() , qd_updated=NOW();");

		 $this->db->select('*');
		 $this->db->from('quotation_description');
		 $this->db->where('qd_enable =', 'Y');
		 
		 $query = $this->db->get();
		 $query->result_array();


		 		$arr[0]="-- กรุณาเลือกรายระเอียด --";
            	$i=1;


			 	foreach ($query->result() as $row)
				{
				        $arr[$i]=$row->qd_name;//จากนั้นก็นำสีมา เข้ารหัสแบบ json
	               		$i++;
    
				}
				$arr[500]="-- เพิ่มรายละเอียดขึ้นใหม่ --";
				echo json_encode($arr);

		 

		
	}
}
