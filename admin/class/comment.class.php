<?php
require_once "database.php";
class Comment extends Database{

	public $id,$name,$email,$status,$comment_date,$comment,$news_id;

	function create(){
		$sql = "insert into tbl_comment (name,email,status,comment_date,comment,news_id) values 
		('$this->name','$this->email','$this->status','$this->comment_date','$this->comment','$this->news_id')";
		$st = $this->insert($sql);
		if (is_integer($st)) {
			return "Comment Inserted with id $st";
		} else {
			echo "Failed to insert Comment";
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
		$sql = "select * from tbl_comment order by comment_date desc";
		return $this->select($sql);
	}

	function getCommentByNewsID(){
		$sql = "select * from tbl_comment where news_id='$this->news_id' and status=1";
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