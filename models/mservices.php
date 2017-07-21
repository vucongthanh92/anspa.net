<?php
class Models_MServices extends Project
{
	function __construct(){
		parent::__construct();
	}
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata($select = "",$where = "",$orderby = "",$limit = ""){
		if(isset($select) && $select != ""){
			$this->select($select);
		}else{
			$this->select("*");
		}
		if(isset($where) && $where != ""){
			$this->where($where);
		}
		
		$this->getdata(TBL_SERVICES,$orderby,$limit);
		return $this->fetchall();
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneNewsToCat($idcat,$select = ""){
		if($select != "")
			$this->select($select);
		$this->where("idcat = '$idcat'");
		$this->getdata(TBL_SERVICES);
		return $this->fetchone();
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneNews($id,$select = ""){
		if($select != "")
			$this->select($select);
		$this->where("Id = '$id'");
		$this->getdata(TBL_SERVICES);
		return $this->fetchone();
	}
	/*
	 * lay tong so dong
	 */
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_SERVICES);
		return $this->num_rows();
	}

	function countView($id){
		$this->where("Id = '".$id."'");
		$this->update(TBL_SERVICES, "counter = (counter+1)");
	}
}
?>