<?php
require_once "database.php";
class News extends Database{

	public $id,$category_id,$title,$short_description,$description,$feature_image,$slider_key,$feature_key,$tatus,$created_by,$modified_by,$created_date,$modified_date;

	function create(){
		$sql = "insert into tbl_news (category_id,title,short_description,description,feature_image,slider_key,feature_key,status,created_date,created_by) values 
		('$this->category_id','$this->title','$this->short_description','$this->description','$this->feature_image','$this->slider_key','$this->feature_key','$this->status','$this->created_date','$this->created_by')";
		$st = $this->insert($sql);
		if (is_integer($st)) {
			return "News Inserted with id $st";
		} else {
			return "Failed to insert News";
		}
	}

	function remove(){
		$sql="delete from tbl_news where id='$this->id'";
		$status = $this->delete($sql);
		if($status){
			header('location:list_news.php');
		}else{
			return 'Can not delete record!';
		}
	}

	function edit(){
		$sql = "update tbl_news set category_id='$this->category_id', title='$this->title', short_description='$this->short_description', description='$this->description', feature_image='$this->feature_image', slider_key='$this->slider_key', feature_key='$this->feature_key', status='$this->status', modified_date='$this->modified_date', modified_by='$this->modified_by' where id='$this->id'";
		$st = $this->update($sql);
		if ($st) {
			header('location:list_news.php');
		} else {
			return "Failed to update news";
		}
	}

	function lists(){
		$sql = "select n.*,c.name as cname from tbl_news n join tbl_category c on n.category_id=c.id order by n.created_date desc";
		return $this->select($sql);
	}

	function getNewsByID(){
		$sql = "select * from tbl_news where id='$this->id'";
		return $this->select($sql);
	}

	function getSliderNews(){
		$sql = "select * from tbl_news where slider_key=1 and status=1 order by created_date desc";
		return $this->select($sql);
	}

	function getLatestNews(){
		$sql = "select * from tbl_news where status=1 order by created_date limit 3";
		return $this->select($sql);
	}

	function getFeaturedNews(){
		$sql = "select * from tbl_news where status=1 and feature_key=1 and category_id='$this->category_id' order by created_date limit 1";
		return $this->select($sql);
	}

	function getNewsByCategoryID($index=0){
		$sql = "select * from tbl_news where status=1 and category_id='$this->category_id' order by created_date limit 2 offset $index";
		return $this->select($sql);
	}

	function getTotalNewsByCategoryID($index=0){
		$sql = "select count(id) as total from tbl_news where status=1 and category_id='$this->category_id'";
		return $this->select($sql);
	}

	function getNewsBySearchTitle(){
		$sql = "select * from tbl_news where status=1 and title like '%$this->title%' order by created_date";
		return $this->select($sql);
	}

	
}

?>