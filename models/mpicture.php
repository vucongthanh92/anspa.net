<?php
class Models_MPicture extends Project
{
	function __construct(){
		parent::__construct();
	}
	
	//liet ke danh sach du lieu
	function listdata($select = "",$where = "",$orderby = "",$limit = ""){
		if(isset($select) && $select != ""){
			$this->select($select);
		}else{
			$this->select("*");
		}
		if(isset($where) && $where != ""){
			$this->where($where);
		}
		
		$this->getdata(TBL_PICTURES,$orderby,$limit);
		return $this->fetchall();
	}
	//lay thong tin mot chu de
	function getOnePicture($id)
	{
		$this->select('*');
		$this->where("Id = $id");
		$this->getdata(TBL_PICTURES);
		return $this->fetchone();
	}
	

}
?>