<?php
class Models_MNhomthietbi extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata(){
		$this->select('*');
		$this->getdata(TBL_NHOMTHIETBI,"sort asc,Id asc");
		return $this->fetchall();
	}
	
	/*
	 * tic lock chu de
	 */
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_NHOMTHIETBI,$data);	
	}
	
	/*
	 * them mot chu de
	 */
	function addCatnews($data){
		$this->insert(TBL_NHOMTHIETBI,$data);
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
		$this->getdata(TBL_NHOMTHIETBI);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editCatnews($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_NHOMTHIETBI,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_NHOMTHIETBI,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_NHOMTHIETBI,"Id = $id");
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_NHOMTHIETBI,"sort = $value");
		}
	}
}
?>