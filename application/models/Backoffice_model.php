<?php
class Backoffice_model extends CI_Model {

    public function Login($usr='',$pwd='')
    {
		$p['usr'] = trim($usr);
		$p['pwd'] = base64_encode(trim($pwd));

		// var_dump($p['pwd'] );
		// exit;

	  	$sqlSel = "SELECT * FROM sys_users WHERE username='{$p['usr']}' and password='{$p['pwd']}';";
		$query = $this->db->query($sqlSel);
	   $result = $query->result_array();
		// var_dump($$query->result_array());
		// exit;
		if(!empty($result)) {

			$result = $query->result_array();

			if($result['0']['enable']!=0){
				$this->update_user_lastAcess($result[0]["su_id"]);
				return $result[0];

			}else{

				$error = array('action'=>'err', 'value'=>'b');
				return $error;
			}

		}else {

			$error = array('action'=>'err', 'value'=>'i');
			return $error;
		}

    }

	public function ShowMenu($key)
	{

		$sqlGroupMenu = "SELECT
						smg.name AS g_name,
						smg.icon_menu,
						sm.mg_id,
						smg.order_no
						FROM
						sys_menus sm
						LEFT JOIN sys_menu_groups smg ON smg.mg_id = sm.mg_id
						WHERE sm.sp_id is NULL OR sm.sp_id IN (select sup.sp_id FROM sys_users_permissions AS sup WHERE sup.su_id = '$key' AND sm.enable = '1' AND smg.enable = '1')
						GROUP BY smg.name
										,smg.icon_menu
										,sm.mg_id
										,smg.order_no
						ORDER BY smg.order_no ASC ;";

		$excGroupMenu = $this->db->query($sqlGroupMenu);

		// var_dump($sqlGroupMenu);
		// exit;

		$result = array();
		foreach ($excGroupMenu->result_array() as $gm) {


			$sqlSubMenu = "SELECT
			sm.*
			FROM
			sys_menus AS sm
			LEFT JOIN sys_menu_groups AS smg ON smg.mg_id = sm.mg_id
			WHERE sm.mg_id='{$gm['mg_id']}' AND (sm.sp_id is NULL OR sm.sp_id IN (select sup.sp_id FROM sys_users_permissions AS sup WHERE sup.su_id = '$key'))
			ORDER BY smg.order_no ASC, sm.order_no ASC
			;";

			$excSubMenu = $this->db->query($sqlSubMenu);

			$subMenu = array();
			foreach ($excSubMenu->result_array() as $sm) {

				array_push($subMenu, array('name' => $sm['name'], 'method' => $sm['method'], 'link' => $sm['link']));
			}

			array_push($result, array('g_name' => $gm['g_name'], 'icon_menu' => $gm['icon_menu'], 'sub_menu' => $subMenu));
		}



		return $result;
	}

	public function ShowMenu_bk($key){

		$sqlGroupMenu = "SELECT
		DISTINCT smg.`name` AS g_name,
		smg.icon_menu,
		sm.mg_id
		FROM
		sys_menus AS sm
		LEFT JOIN sys_menu_groups AS smg ON smg.mg_id = sm.mg_id
		WHERE sm.sp_id is NULL OR sm.sp_id IN (select sup.sp_id FROM sys_users_permissions AS sup WHERE sup.su_id = '{$key}')
		ORDER BY smg.order_no ASC
		;";


		$excGroupMenu = $this->db->query($sqlGroupMenu);
		// var_dump($excGroupMenu);
		// exit;

		$result = array();
		foreach($excGroupMenu->result_array() as $gm){


			$sqlSubMenu = "SELECT
			sm.*
			FROM
			sys_menus AS sm
			LEFT JOIN sys_menu_groups AS smg ON smg.mg_id = sm.mg_id
			WHERE sm.mg_id='{$gm['mg_id']}' AND q_enable = 1 AND (sm.sp_id is NULL OR sm.sp_id IN (select sup.sp_id FROM sys_users_permissions AS sup WHERE sup.su_id = '{$key}'))
			ORDER BY smg.order_no ASC, sm.order_no ASC
			;";


			$excSubMenu = $this->db->query($sqlSubMenu);

			$subMenu = array();
			foreach($excSubMenu->result_array() as $sm){

				array_push($subMenu, array('name'=>$sm['name'], 'method'=>$sm['method'], 'link'=>$sm['link']));

			}

			array_push($result, array('g_name'=>$gm['g_name'],'icon_menu'=>$gm['icon_menu'],'sub_menu'=>$subMenu));


		}


		return $result;

	}

	public function Logout()
	{

		$sqlLastAcc = "UPDATE sys_users SET last_access=NOW() WHERE username='".$this->session->userdata('sessUsr')."';";
		$this->db->query($sqlLastAcc);
		$this->session->sess_destroy();

        redirect('login/account');

	}

	public function CheckPermission($para){

		$get_url = trim($this->router->fetch_class().'/'.$this->router->fetch_method());

		$sqlChkPerm = "SELECT
			sp.`name`,
			sp.controller
			FROM
			sys_users_permissions AS sup
			INNER JOIN sys_permissions AS sp ON sp.sp_id = sup.sp_id
			LEFT JOIN sys_permission_groups AS spg ON sp.spg_id = spg.spg_id
			WHERE
			sp.enable='1' AND spg.enable='1' AND sup.su_id='{$para}' AND sp.controller='{$get_url}';";

		$excChkPerm = $this->db->query($sqlChkPerm);
		$numChkPerm = $excChkPerm->num_rows();

		if($numChkPerm == 0) {

			echo '<script language="javascript">';
			echo 'alert("Permission not found.");';
			echo 'history.go(-1);';
			echo '</script>';
			exit();

		}

	}

    public function CheckSession()
    {
       //  if($this->session->userdata('loggedIn')!="OK") {
       //
       //     redirect('login/account');
		   // return FALSE;
       //
       //  }else{	return TRUE; 	}
       if (empty($this->session->userdata('sessUsr')) || $this->session->userdata('sessUsr') == "" ){
            // redirect("Login/Logout");
            return true;
       }else{
         return false;
       }
    }


	public function getCustomer(){

		$sqlSel = "SELECT
						*
					FROM
						customers AS cust
					LEFT JOIN customers_groups AS custg
					ON cust.cus_g_id = custg.cus_g_id
					WHERE
						cust.enable = '1'
					AND cust.del_flag = '0';";
		$query = $this->db->query($sqlSel);
		$result = $query->result_array();

		if($query->num_rows()!=0) {

            return $result;
        }else {

            return FALSE;
        }

	}


	public function addUser($p){

		## User
		$setUser = array('sug_id' => $p['group'],
				'username' => $p['usr'],
				'password' => $p['pwd'],
				'firstname' => $p['fname'],
				'lastname' => $p['lname'],
				'gender' => $p['sex'],
				'email' => $p['email'],
				'enable' => '1',
				'date_created' => date('Y-m-d H:i:s'),
				'date_updated' => date('Y-m-d H:i:s')
				);

		$this->db->set($setUser);
		$excInsUser = $this->db->insert('sys_users');

		$lastId = $this->db->insert_id();

		## User Permission
		$sqlSelPerm = "SELECT
			sp.sp_id,
			sp.`name`
			FROM
			sys_users_groups_permissions AS sugp
			LEFT JOIN sys_permission_groups AS spg ON spg.spg_id = sugp.spg_id
			LEFT JOIN sys_permissions AS sp ON sp.spg_id = spg.spg_id
			WHERE spg.`enable`='1' AND sp.`enable`='1' AND sugp.sug_id='{$p['group']}';";
		$excSelPerm = $this->db->query($sqlSelPerm);

		foreach($excSelPerm->result() AS $p){

			$setPerm = array('su_id' => $lastId,
					'sp_id' => $p->sp_id,
					'date_created' => date('Y-m-d H:i:s')
			);
			$this->db->set($setPerm);
			$excInsPerm = $this->db->insert('sys_users_permissions');

		}

		if($excInsUser && $excInsPerm){ return $lastId; }else{ return FALSE; }

	}

	public function addQuotation($p){

			$vat = 7;
			$sumAll_vat = ($p['totalPrice']*$vat)/100;
			$sumAll_net = $p['totalPrice']+$sumAll_vat;

		$setQuotation = array('qt_no' => $p['contract'],
							'qt_contract_start' => $p['dateStart'],
							'qt_contract_end' => $p['dateEnd'],
							'qt_total' => $p['totalPrice'],
							'qt_vat' => $sumAll_vat,
							'qt_total_net' => $sumAll_net,
							'qt_is_rewrite' => 'N',
							'qt_is_rewrite_qt_id' => '',
							'qt_is_renew' => 'N',
							'qt_is_renew_qt_id' => '',
							'qt_remark' => '',
							'qt_s_id' => '1',
							'qt_updated' => date('Y-m-d H:i:s'),
							'qt_created' => date('Y-m-d H:i:s'),
							'qt_service_order' => $p['service_order'],
							'qt_service_type' => $p['service_type'],
							'qt_source' => $p['source'],
							'qt_destination' => $p['destination'],
							'qt_delivery_time' => $p['delivery_time'],
							'qt_condition_pay' => $p['condition_pay'],
							'qt_time_service' => $p['service_time'],
							'qt_policy' => $p['policy'],
							'qt_bidder1' => $p['bidder1'],
							'qt_bidder2' => $p['bidder2'],
			);

		$this->db->set($setQuotation);
		$excInsQuotation = $this->db->insert('quotation');

		$lastId = $this->db->insert_id();


		$num_rows = $p['numrow'];

		for ($i=1; $i <= $num_rows; $i++) {
			$setQuotationDetail = array('qt_id' => $lastId,
							'qt_d_description' => $p['des'.$i],
							'qt_d_quantity' => $p['quantity'.$i],
							'qt_d_price' => $p['price'.$i],
							'qt_d_total' => $p['total'.$i],
							'qt_d_unit' => $p['unit'.$i],
							'qt_d_total_net' => $p['totalall'.$i]

			);

		}

		$this->db->set($setQuotationDetail);
		$excInsQuotationDetail = $this->db->insert('quotation_detail');


		$setCustomer = array('qd_id' => $lastId,
							'first_name' => $p['txt_cust'],
							'address' => $p['custAddress'],
							'date_add' => date('Y-m-d H:i:s'),
							'date_modify' => date('Y-m-d H:i:s')
			);

		$this->db->set($setCustomer);
		$excInsCustomer = $this->db->insert('quotation_customer');





		## User Permission
		// $sqlSelPerm = "SELECT
		// 	sp.sp_id,
		// 	sp.`name`
		// 	FROM
		// 	sys_users_groups_permissions AS sugp
		// 	LEFT JOIN sys_permission_groups AS spg ON spg.spg_id = sugp.spg_id
		// 	LEFT JOIN sys_permissions AS sp ON sp.spg_id = spg.spg_id
		// 	WHERE spg.`enable`='1' AND sp.`enable`='1' AND sugp.sug_id='{$p['group']}';";
		// $excSelPerm = $this->db->query($sqlSelPerm);

		// foreach($excSelPerm->result() AS $p){

		// 	$setPerm = array('su_id' => $lastId,
		// 			'sp_id' => $p->sp_id,
		// 			'date_created' => date('Y-m-d H:i:s')
		// 	);
		// 	$this->db->set($setPerm);
		// 	$excInsPerm = $this->db->insert('sys_users_permissions');

		// }

		// if($excInsUser && $excInsPerm){ return $lastId; }else{ return FALSE; }
		if($excInsQuotation){ return $lastId; }else{ return FALSE; }

	}

	public function editUser($key,$p){

		if($p['pwd'] != ''){

			$setUser = array('sug_id' => $p['group'],
				'password' => $p['pwd'],
				'firstname' => $p['fname'],
				'lastname' => $p['lname'],
				'gender' => $p['sex'],
				'email' => $p['email'],
				'date_updated' => date('Y-m-d H:i:s')
				);
		}else{

			$setUser = array('sug_id' => $p['group'],
				'firstname' => $p['fname'],
				'lastname' => $p['lname'],
				'gender' => $p['sex'],
				'email' => $p['email'],
				'date_updated' => date('Y-m-d H:i:s')
				);
		}

		$this->db->where('su_id',$key);
		$excUp = $this->db->update('sys_users',$setUser);

		if($excUp){ return TRUE; }else{ return FALSE; }

	}

	public function enableUser($key=''){

		$this->db->set('enable', '1');
		$this->db->set('date_updated', 'NOW()', FALSE);
		$this->db->where('su_id', $key);
		$exc_user = $this->db->update('sys_users');

		if ($exc_user){

			return TRUE;

		}else{	return FALSE;	}

	}

	public function num_enableUser($para){

		for($i=0;$i<count($para);$i++){

			$this->enableUser($para[$i]);

		}

		return TRUE;

	}

	public function disableUser($key=''){

		$this->db->set('enable', '0');
		$this->db->set('date_updated', 'NOW()', FALSE);
		$this->db->where('su_id', $key);
		$exc_user = $this->db->update('sys_users');

		if ($exc_user){

			return TRUE;

		}else{	return FALSE;	}

	}

	public function num_disableUser($para){

		for($i=0;$i<count($para);$i++){

			$this->disableUser($para[$i]);

		}

		return TRUE;

	}

	public function deleteUser($key=''){

		$sqlDelUser = "DELETE FROM sys_users WHERE su_id='{$key}';";
		$excDelUser = $this->db->query($sqlDelUser);

		$sqlDelPerm = "DELETE FROM sys_users_permissions WHERE su_id='{$key}';";
		$excDelPerm = $this->db->query($sqlDelPerm);

		if($excDelUser && $excDelPerm) { return TRUE; }else { return FALSE; }

	}

	public function num_deleteUser($para){

		for($i=0;$i<count($para);$i++){

			$this->deleteUser($para[$i]);

		}

		return TRUE;

	}

	public function ShowUser($key=''){

		$sqlSel = "SELECT * FROM sys_users WHERE su_id='{$key}';";
		$query = $this->db->query($sqlSel);
		$result = $query->result_array();

		if($query->num_rows()!=0) {

            return $result[0];
        }else {

            return FALSE;
        }

	}

	public function searchUser($searchTerm=''){


		 $this->db->select('*');
		 $this->db->from('sys_users');
		 $this->db->where('sug_id !=', '1');
		 $this->db->like('username',$searchTerm);
		 $this->db->or_like('firstname',$searchTerm);
		 $this->db->or_like('lastname',$searchTerm);
		 $this->db->or_like('email',$searchTerm);

		 $query = $this->db->get();

		 return $query->result_array();

	}

	public function getUser($str){

        $this->db->where('username', $str);
        $query = $this->db->get('sys_users');

		if($query->num_rows() > 0){

			return FALSE;
		}else{

			return TRUE;
		}

    }

	public function AddUserGroup($name='',$enable=''){

		$sqlIns = "INSERT INTO sys_user_groups SET name='{$name}', enable='{$enable}', date_create=NOW(), del_flag='0';";
		$excIns = $this->db->query($sqlIns);

		if($excIns){ return TRUE; }else{ return FALSE; }


	}

	public function EditUserGroup($key='',$name='',$enable='1'){

		$sqlEdt = "UPDATE sys_user_groups SET name='{$name}', enable='{$enable}', date_create=NOW() WHERE sug_id='{$key}';";
		$excEdt = $this->db->query($sqlEdt);

		if($excEdt){ return TRUE; }else{ return FALSE; }


	}

	public function DeleteUserGroup($key=''){

		$sqlDel = "DELETE FROM sys_user_groups WHERE sug_id='{$key}';";
		$excDel = $this->db->query($sqlDel);

		$sqlDel = "DELETE FROM sys_users_groups_permissions WHERE sug_id='{$key}';";
		$excDel = $this->db->query($sqlDel);

		if($excDel) { return TRUE; }else { return FALSE; }

	}

	public function ShowUserGroup($key=''){

		$sqlSel = "SELECT * FROM sys_user_groups WHERE sug_id='{$key}';";
		$query = $this->db->query($sqlSel);
		$result = $query->result_array();

		// var_dump($query->num_rows());
		// exit;

		if($query->num_rows()!=0) {

            return $result[0];
        }else {

            return FALSE;
        }

	}

	public function AddRuleUserGroup($key,$rule=''){

		$sqlDel = "DELETE FROM sys_users_groups_permissions WHERE sug_id='{$key}';";
		$excDel = $this->db->query($sqlDel);

		if($rule!=''){

			foreach($rule as $r){

				$sqlIns = "INSERT INTO sys_users_groups_permissions SET sug_id='{$key}', spg_id='{$r}', date_create=NOW();";
				$excIns = $this->db->query($sqlIns);

				if($excIns){

					$strIns = TRUE;

				}else{ $strIns = FALSE;}
			}

		}else{ $strIns = TRUE; }

		return $strIns;


	}

	public function AddRuleUser($key,$rule=''){

		$sqlDel = "DELETE FROM sys_users_permissions WHERE su_id='{$key}';";
		$excDel = $this->db->query($sqlDel);

		if($rule!=''){

			foreach($rule as $r){

				$sqlIns = "INSERT INTO sys_users_permissions SET su_id='{$key}', sp_id='{$r}', date_created=NOW();";
				$excIns = $this->db->query($sqlIns);

				if($excIns){

					$strIns = TRUE;

				}else{ $strIns = FALSE;}
			}

		}else{ $strIns = TRUE; }

		return $strIns;


	}

	## WHERE ID USER GROUP ##
	public function AddRuleUserDefault($key){

		$sqlSelUserG = "SELECT
		DISTINCT sup.su_id AS su_id
		FROM
		sys_users AS su
		LEFT JOIN sys_users_permissions AS sup ON sup.su_id = su.su_id
		WHERE
		su.sug_id='{$key}';";


		$excSelUserG = $this->db->query($sqlSelUserG);

		foreach($excSelUserG->result_array() AS $r){

			$uId .= "'".$r['su_id']."',";
		}

		$sqlDel = "DELETE FROM sys_users_permissions WHERE su_id IN ({$uId}FALSE);";
		$excDel = $this->db->query($sqlDel);

		if($excDel){

			$sqlSelPerDefault = "INSERT INTO sys_users_permissions
										SELECT
										NULL AS sup_id,
										su.su_id,
										sp.sp_id,
										NOW()
										FROM
										sys_users_groups_permissions AS sugp
										LEFT JOIN sys_user_groups AS sug ON sug.sug_id = sugp.sug_id
										LEFT JOIN sys_users AS su ON su.sug_id = sug.sug_id
										LEFT JOIN sys_permission_groups AS spg ON spg.spg_id = sugp.spg_id
										LEFT JOIN sys_permissions AS sp ON sp.spg_id = spg.spg_id
										WHERE sugp.sug_id='{$key}'
										ORDER BY su.su_id ASC,sp.sp_id ASC";
			$excSelPerDefault = $this->db->query($sqlSelPerDefault);

			if($excSelPerDefault){

				return TRUE;

			}else{ return FALSE; }

		}else{

			return FALSE;
		}

	}

	public function AddPermission($name='',$enable='1',$group, $cont){

		$sqlIns = "INSERT INTO sys_permissions SET name='{$name}', controller='{$cont}',enable='{$enable}', spg_id='{$group}',date_create=NOW(), date_update=NOW();";
		$excIns = $this->db->query($sqlIns);

		if($excIns){ return TRUE; }else{ return FALSE; }


	}

	public function EditPermission($key='',$name='',$enable='1',$group, $cont){

		$sqlEdt = "UPDATE sys_permissions SET name='{$name}', controller='{$cont}', enable='{$enable}', spg_id='{$group}', date_update=NOW() WHERE sp_id='{$key}';";
		$excEdt = $this->db->query($sqlEdt);

		if($excEdt){ return TRUE; }else{ return FALSE; }


	}

	public function DeletePermission($key=''){

		$sqlDel = "DELETE FROM sys_permissions WHERE sp_id='{$key}';";
		$excDel = $this->db->query($sqlDel);

		if($excDel) { return TRUE; }else { return FALSE; }

	}

	public function ShowPermission($key=''){

		$sqlSel = "SELECT * FROM sys_permissions WHERE sp_id='{$key}';";
		$query = $this->db->query($sqlSel);
		$result = $query->result_array();

		if($query->num_rows()!=0) {

            return $result[0];
        }else {

            return FALSE;
        }

	}


	public function AddPermissionGroup($name='',$enable='1'){

		$sqlIns = "INSERT INTO sys_permission_groups SET name='{$name}', enable='{$enable}', date_create=NOW();";
		$excIns = $this->db->query($sqlIns);

		if($excIns){ return TRUE; }else{ return FALSE; }


	}

	public function EditPermissionGroup($key='',$name='',$enable='1'){

		$sqlEdt = "UPDATE sys_permission_groups SET name='{$name}', enable='{$enable}', date_create=NOW() WHERE spg_id='{$key}';";
		$excEdt = $this->db->query($sqlEdt);

		if($excEdt){ return TRUE; }else{ return FALSE; }


	}

	public function DeletePermissionGroup($key=''){

		$sqlDel = "DELETE FROM sys_permission_groups WHERE spg_id='{$key}';";
		$excDel = $this->db->query($sqlDel);

		if($excDel) { return TRUE; }else { return FALSE; }

	}

	public function ShowPermissionGroup($key=''){

		$sqlSel = "SELECT * FROM sys_permission_groups WHERE spg_id='{$key}';";
		$query = $this->db->query($sqlSel);
		$result = $query->result_array();

		if($query->num_rows()!=0) {

            return $result[0];
        }else {

            return FALSE;
        }

	}

	public function editProfile($key,$p){

		$setUser = array('firstname' => $p['fname'],
				'lastname' => $p['lname'],
				'gender' => $p['sex'],
				'email' => $p['email'],
				'date_update' => date('Y-m-d H:i:s')
				);

		$this->db->where('su_id',$key);
		$excUp = $this->db->update('sys_users',$setUser);

		if($excUp){ return TRUE; }else{ return FALSE; }

	}


    public function changePassword($key,$p){

        $this->db->where('su_id', $key);
        $this->db->where('password', base64_encode(trim($p['oldPwd'])));
        $query = $this->db->get('sys_users');

        if($query->num_rows==1){
            $data = array('password' => base64_encode(trim($p['newPwd'])),
						'date_updated' => date('Y-m-d H:i:s')
			);
            $this->db->where('su_id', $key);

			$query = $this->db->update('sys_users', $data);

            if($query) {

                return TRUE;
            } else {

                return FALSE;
            }
        } else {

            return FALSE;// data not found
        }
    }

	public function update_user_lastAcess($id){
		$dateTime = date('Y-m-d H:i:s');  
		$this->db->set('last_access', "'{$dateTime}'", FALSE); 
		$this->db->where('sug_id', $id);
		$query = $this->db->update('sys_users');
		return $query; 
	}


	/*


	public function resetpassword(){


		$this->db->where('m_usr', $this->session->userdata('sess_usr'));
		$this->db->where('m_email', trim($this->input->post('txt_email')));
        $query = $this->db->get('member');

        if($query->num_rows==1){

			$newPwd = $this->random_text(6);
			$rec = $query->row_array();
			$data = array('m_pwd' => base64_encode($newPwd), 'm_updated_at' => date('Y-m-d H:i:s'));
            $this->db->where('m_usr', $this->session->userdata('sess_usr'));

			$excQuery = $this->db->update('member', $data);

            if($excQuery) {

				//-----------Message-------------------
				$mail_msg = "<b>เรียน สมาชิก 3BBWiFi Report Manager</b><br><br>";
				$mail_msg .= "ขอแจ้งรายละเอียด New Reset Password คือ<br><br>";
				$mail_msg .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username : <font color='#0000FF'>".$this->session->userdata('sess_usr')."</font><br>";
				$mail_msg .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password : <font color='#0000FF'>".$newPwd."</font><br><br>";
				$mail_msg .= "เพื่อความปลอดภัยของท่าน กรุณาทำการเปลี่ยนรหัสผ่านใหม่อีกครั้ง เมื่อทำการเข้าสู่ระบบ<br><br>";
				$mail_msg .= "กรุณาตรวจสอบข้อมูล เพื่อความถูกต้องค่ะ<br><br>";
				$mail_msg .= "ขอบคุณค่ะ<br>";

				//------------------------------------------

				$mail_subject = "Reset password 3BBWiFi Report Manager";

				$this->send_mail($rec['m_email'], $mail_msg, $mail_subject);
                return TRUE;

            } else {

                return FALSE;
            }

		}else{
			return FALSE;// data not found
		}
	}


	public function send_mail($email_usr,$mail_msg,$mail_subject){ //mail server 3bb vas

	//require_once( $path ); // Mail Class
	require_once('phpmailer/class.phpmailer.php');
	//---------------------------------------------------------------------
	$mail = new PHPMailer();

	$mail->IsSMTP();			// send via SMTP
	$mail->Host = "110.164.76.67";	// SMTP servers
    $mail->SMTPAuth = true; 		// turn on SMTP authentication
	$mail->Username = "system"; 	// SMTP username
	$mail->Password = "acumenit"; 	// SMTP password
	$mail->Mailer = "smtp";
	$mail->Port = '10025';
	$mail->Priority = 1;
	$mail->Encoding = "8bit";
	$mail->CharSet = "utf-8";
	$mail->SMTPDebug = 1;
	$mail->From = "system@3bbwifibackoffice.com"; // ชื่อเมล์ที่ถูกส่งออกไป
	$mail->FromName = "3BBWiFi Backoffice";
	$mail->AddAddress($email_usr); 	// email1 = ชื่อเมล์ที่ต้องการรับ


	$mail->WordWrap = 80; 	// set word wrap
	$mail->IsHTML(true); 	// send as HTML

	$mail->Subject  =  $mail_subject;
	$mail->Body = $mail_msg;

	//###  ตรวจสอบการส่งเมล์ ของ Mail Server
	if( !$mail->Send() ) {
		$sendFlag = 0;

	} else {
		$sendFlag = 1;

	}

	//###  Clear all addresses and attachments for next loop
	$mail->ClearAddresses();
	$mail->ClearAttachments();
	$mail->ClearCCs();

	unset($mail);
	$mail_msg = "";
	unset($mail_msg);

	}

	public function random_text($len){
		srand((double)microtime()*10000000);
		$chars = "acdfhjkmnprtuvwxyz123456789";
		$ret_str = "";
		$num = strlen($chars);

		for($i = 0; $i < $len; $i++){
			$ret_str.= $chars[rand()%$num];
			$ret_str.="";
		}
		return $ret_str;
	}*/


}
?>
