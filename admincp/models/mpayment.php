<?php

class Models_MPayment extends Project
{
	function __construct()
	{
		parent::__construct();
	}
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listCustomer($select = "",$where = "",$orderby = "",$limit = "")
	{
		if($select != "")
			$this->select($select);
		if($where != "")
			$this->where($where);
			
		$this->getdata(TBL_CUSTOMER,"Id DESC",$limit);
		return $this->fetchall();
	}
	
	/*
	 * thông tin mot khach hang
	 */
	function OneCustomer($id)
	{
		$this->where("Id = '$id'");
		$this->getdata(TBL_CUSTOMER);
		return $this->fetchone();
	}
	
	/*
	 * liet ke danh sach gio hang
	 */
	function listCustomerCart($id)
	{
		$this->where = "idcustomer = '$id'";			
		$this->getdata(TBL_CUSTOMER_CART);
		return $this->fetchall();
	}
	
	/*
	 * bat la tin moi
	 */
	function hideshow($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_CUSTOMER,$data);	
	}

	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_CUSTOMER,'Id = '.$item);
			$this->delete(TBL_CUSTOMER_CART,'idcustomer = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_CUSTOMER,'Id = '.$id);
		$this->delete(TBL_CUSTOMER_CART,'idcustomer = '.$id);
	}
	function editCustomer($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_CUSTOMER,$data);
		//echo $id;
	}	
	
}

?>