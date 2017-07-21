<?php

if($_SESSION['level'] != 1){
	redirect(BASE_URL_ADMIN);
}

$id = vargetpost("id","",true);
$db = new Models_Muser;

if(isset($_POST['edituser']))
{
	$help = new Helpers_Validation;
	$help -> check_empty($_POST['txtuser'],ERROR_USER_EMPTY);
	$help -> check_email($_POST['txtemail']);
	if($_POST['txtpass'] != "")
		$help -> check_pass($_POST['txtpass'],$_POST['txtrepass']);
	//$help -> check_empty($_POST['level'],ERROR_LEVEL_EMPTY);
	
	$data['error'] = $help->_mess;
	if($help->valid() == 0) //khong co loi
	{
		$data=array(
			"username"	=> $_POST['txtuser'],
			"email"		=> $_POST['txtemail'],
			//"level" 	=> $_POST['level'],
		);
		
		if($_POST['txtpass'] != "")
			$data["password"] = md5(md5($_POST['txtpass']));
		
		if($db->update_user($data,$id) == 0)
		{
			$data['error'][]= ERROR_USER_REGISTER;
			loadview("user/edit_view",$data);
		}
		else
		{
			$link = array(
				'list'	=> "user/list",
				'add'	=> "user/add"
			);
			loadview("system/edit_finish",$link);
		}
	}
}
else
{
	$data['info'] = $db->get_user($id);
	loadview("user/edit_view",$data);
}


?>