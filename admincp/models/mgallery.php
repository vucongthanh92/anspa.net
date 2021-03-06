<?php
class Models_MGallery extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata(){
		$this->select('*');
		$this->getdata(TBL_GALLERY,"sort asc,Id asc");
		return $this->fetchall();
	}
	
	/*
	 * tic lock chu de
	 */
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_GALLERY,$data);	
	}
	
	/*
	 * them mot chu de
	 */
	function addCatnews($data){
		$this->insert(TBL_GALLERY,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot chu de
	 */
	function getOneCatnews($id){
		$this->where("Id = $id");
		$this->getdata(TBL_GALLERY);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editCatnews($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_GALLERY,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_GALLERY,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_GALLERY,"Id = $id");
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_GALLERY,"sort = $value");
		}
	}
}
?>