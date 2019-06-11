<?php
require_once "database.php";
class Category extends Database{

	public $id,$name,$rank,$status,$created_by,$modified_by,$created_date,$modified_date;

	function create(){
		$sql = "insert into tbl_category (name,rank,status,created_date,created_by) values 
		('$this->name','$this->rank','$this->status','$this->created_date','$this->created_by')";
		$st = $this->insert($sql);
		if (is_integer($st)) {
			return "Category Inserted with id $st";
		} else {
			echo "Failed to insert category";
		}
	}

	function remove(){
		$sql="delete from tbl_category where id='$this->id'";
		$status = $this->delete($sql);
		if($status){
			header('location:list_category.php');
		}else{
			return 'Can not delete record!';
		}
	}

	function edit(){
		$sql = "update tbl_category set name='$this->name', rank='$this->rank', status='$this->status', modified_date='$this->modified_date', modified_by='$this->modified_by' where id='$this->id'";
		$st = $this->update($sql);
		if ($st) {
			header('location:list_category.php');
		} else {
			return "Failed to update category";
		}
	}

	function lists(){
		$sql = "select * from tbl_category order by created_date desc";
		return $this->select($sql);
	}

	function getCategoryByID(){
		$sql = "select * from tbl_category where id='$this->id'";
		return $this->select($sql);
	}

	function getActiveCategory(){
		$sql = "select * from tbl_category where status=1 order by rank";
		return $this->select($sql);
	}

	function getCategoryName(){
		$sql = "select name from tbl_category where id='$this->id'";
		return $this->select($sql);
	}
}

?>