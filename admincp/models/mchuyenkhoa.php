<?php
class Models_MChuyenkhoa extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata(){
		$this->select('Id,title_vn,sort,ticlock');
		$this->getdata(TBL_CHUYENKHOA,"Id asc");
		return $this->fetchall();
	}
	
	/*
	 * tic lock chu de
	 */
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_CHUYENKHOA,$data);	
	}
	
	/*
	 * them mot chu de
	 */
	function addCatnews($data){
		$this->insert(TBL_CHUYENKHOA,$data);
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
		$this->getdata(TBL_CHUYENKHOA);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editCatnews($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_CHUYENKHOA,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_CHUYENKHOA,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_CHUYENKHOA,"Id = $id");
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_CHUYENKHOA,"sort = $value");
		}
	}
}
?>