<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apicust extends CI_Controller {

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

	public function searchCust($sid, $txtSearch)
	{
		header('Content-Type: application/json');

		$sel_system=$_POST['sel_system'];
		$txtSearch=$_POST['txtSearch'];

		 $this->db->select('*');
		 $this->db->from('quotation_customer');
		 $this->db->where('status =', 'active');
		 // $this->db->like('username',$inputElements3);
		 $this->db->or_like('first_name',$txtSearch);
		 $this->db->or_like('last_name',$txtSearch);
		 // $this->db->or_like('email',$searchTerm);
		 
		 $query = $this->db->get();
		 $query->result_array();

		 // print_r($query);
		 $num = $query->num_rows();
		 if ($num!=0) {

		 		$arr[0]="-- กรุณาเลือก --";
            	$i=1;


			 	foreach ($query->result() as $row)
				{
				        // echo $row->first_name;
				        // echo $row->last_name;
				        // echo $row->address;
				        // echo " / ";


				        $arr[$i]=$row->first_name;//จากนั้นก็นำสีมา เข้ารหัสแบบ json
	               		$i++;

				        
				}
				// var_dump($arr);
				// echo $_GET['callback']."(".json_encode($arr).")";

				// $arrReturn = array("code" => '200', "description" => "success.");
				// echo json_encode($arrReturn);

				echo json_encode($arr);

		 }else{
		 	//Send via ajax for check customer from api ...
		 	echo "Not have customer";
		 }
		 // echo $query['result_array']['0'];
		 

		 // exit();




		// echo "กหด";

		// echo $mac;
		// echo $status;
		// echo $inputElements2;
		// echo $inputElements3;
		// exit();
		// $ipAddress = $_SERVER['REMOTE_ADDR'];

		// if ($status=="Camera_ON") {

		// 	$this->db->query("INSERT INTO monitor_transaction SET mt_mac='{$mac}',mt_camera_date=NOW(), mt_status='{$status}', mt_ip='{$ipAddress}', mt_timestamp=NOW();");
		// 	$this->db->query("INSERT INTO monitor_profile SET mp_mac='{$mac}', mp_camera_date=NOW(), mp_status='{$status}', mp_ip='{$ipAddress}', mp_timestamp=NOW(), mp_first_date=NOW() ON DUPLICATE KEY UPDATE
		// 	mp_mac='{$mac}', mp_camera_date=NOW(), mp_status='{$status}', mp_ip='{$ipAddress}', mp_timestamp=NOW();");
		// }else{

		// 	$this->db->query("INSERT INTO monitor_transaction SET mt_mac='{$mac}', mt_status='{$status}', mt_ip='{$ipAddress}', mt_timestamp=NOW();");
		// 	$this->db->query("INSERT INTO monitor_profile SET mp_mac='{$mac}', mp_status='{$status}', mp_ip='{$ipAddress}', mp_timestamp=NOW(), mp_first_date=NOW() ON DUPLICATE KEY UPDATE
		// 		mp_mac='{$mac}', mp_status='{$status}', mp_ip='{$ipAddress}', mp_timestamp=NOW();");

		// }
		// $arrReturn = array("code" => '200', "description" => "success.");
		// echo json_encode($arrReturn);

		
	}
}
