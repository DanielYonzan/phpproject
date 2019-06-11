<?php
require_once "database.php";
class User extends Database{

	public $id,$name,$email,$username,$status,$last_login,$role,$password,$remember;	

	function login(){
		$sql = "select * from tbl_user where email='$this->email' and password='$this->password' and status=1";
		$udata = $this->select($sql);
		if (count($udata) == 1) {
			session_start();
			$_SESSION['admin_username'] = $udata[0]->username;
			$_SESSION['admin_name'] = $udata[0]->name;
			$_SESSION['admin_email'] = $udata[0]->email;
			$_SESSION['admin_role'] = $udata[0]->role;

			if (isset($this->remember)) {
				$time=time()+7*24*60*60;
				setcookie('remember',true,$time);
				setcookie('admin_username',$udata[0]->username,$time);
				setcookie('admin_name',$udata[0]->name,$time);
				setcookie('admin_email',$udata[0]->email,$time);
				setcookie('admin_role',$udata[0]->role,$time);				
			}
			header('location:dashboard.php');
		} else{
			return "Login Failed";
		}
	}

	function create(){

	}

	function remove(){
		
	}

	function edit(){
		
	}

	function lists(){
		
	}

}

?>