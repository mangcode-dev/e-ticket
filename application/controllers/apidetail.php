<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apidetail extends CI_Controller {

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

	public function searchDetail()
	{
		header('Content-Type: application/json');

		$sel_system=$_POST['sel_system'];
		$txtSearch=urldecode($_POST['txtSearch']);

		// $txtSearch = '"/u0e42/u0e21/u0e42/u0e19"';

		 $this->db->select('*');
		 $this->db->from('third_party_application');
		 $this->db->where('trd_code =', $sel_system);
		 $this->db->where('trd_enable =', 'Y');
		 // $this->db->like('username',$inputElements3);
		 // $this->db->or_like('first_name',$txtSearch);
		 // $this->db->or_like('last_name',$txtSearch);
		 // $this->db->or_like('email',$searchTerm);
		 
		 $query = $this->db->get();
		 $query->result_array();

		 // print_r($query);
		 $num = $query->num_rows();
		 if ($num!=0) {

		 	// $txtSearch = json_encode($txtSearch);

				// $str = strtolower($sel_system);

				$data = array(
		            'sel_system'     => $str,
		            'txtSearch' 	=> $txtSearch
		    );

		    $data_string = json_encode($data);

		    $curl = curl_init("http://nettv.3bb.co.th/vaswo/api_3rdparty/search_wo/");



		    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

		    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string))
		    );

		    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
		    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data

		    // Send the request
		    $result = curl_exec($curl);

		    // Free up the resources $curl is using
		    curl_close($curl);

		    // echo $result;
			echo json_encode($result);

		 }

	}

	public function searchDetail1($sid, $txtSearch)
	{
		header('Content-Type: application/json');

		$sel_system=$_POST['sel_system'];
		$txtSearch=$_POST['txtSearch'];

			$postdata = http_build_query(
			    array(
			        'search' => $txtSearch,
			    )
			);

			$opts = array('http' =>
			    array(
			        'method'  => 'POST',
			        'header'  => 'Content-type: application/x-www-form-urlencoded',
			        'content' => $postdata
			    )
			);
			$context  = stream_context_create($opts);
			$result = file_get_contents('http://nettv.3bb.co.th/vaswo/api_3rdparty/search_wo/', false, $context);


			echo $result;
					
	}
}
