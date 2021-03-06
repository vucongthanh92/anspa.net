<?php
########
#
#	Confix base url file public/js/ajax.js
#
########

class Models_MPayment extends Project
{
	function __construct()
	{
		parent::__construct();
	}
	function listdata($where = ""){
		$this->where($where);
		$this->getdata(TBL_CUSTOMER,"Id DESC");
		return $this->fetchall();
	}
	function listCustomerCart($where = ""){
		$this->where($where);
		$this->getdata(TBL_CUSTOMER_CART,"idpro DESC");
		return $this->fetchall();
	}
	function getOrder($id){
		$this->where("Id = $id");
		$this->getdata(TBL_CUSTOMER);
		return $this->fetchone();
	}
	//them vao gio hang co so luong
	function addcartqty($id,$soluong)
	{
		if(isset($_SESSION['cart'])){
			if(isset($_SESSION['cart'][$id]))
			{
				$qty = $_SESSION['cart'][$id] + $soluong;
			}
			else
			{
				$qty = $soluong;
			}
			$_SESSION['cart'][$id]=$qty;
		}else{
			$qty = $soluong;
			$_SESSION['cart'][$id]=$qty;
		}
		
	}
	
	//them vao gio hang
	function addcart($id)
	{
		session_register('cart');
		if(isset($_SESSION['cart'][$id]))
		{
			$qty = $_SESSION['cart'][$id] + 1;
		}
		else
		{
			$qty = 1;
		}
		$_SESSION['cart'][$id]=$qty;
	}
	
	//lay thong tin gio hang
	function getcart()
	{
		if(isset($_SESSION['cart']))
		{
			$mpro = new Models_MProduct();
			$i=0;
			foreach($_SESSION['cart'] as $key => $value)
			{
				$arr[$i] = $mpro->getOneProduct($key);
				$arr[$i]['qty'] = $value;
				$i++;
			} 
			return $arr;
		}
		else
		{
			return 0;
		}	
	}
	
	//cap nhat gio hang
	function editcart($data)
	{
		if(!empty($data))
		{
			foreach($data as $k => $v)
			{
				$_SESSION['cart'][$k] = $v;
			}
		}
	}
	
	function delcart($id = "")
	{
		if($id==""){
			unset($_SESSION['cart']);
		}else{
			unset($_SESSION['cart'][$id]);
		}
	}
	
	//them thong tin khach hang
	function addCustomer($data)
	{
		$this->insert(TBL_CUSTOMER,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	//add san pham vao gio hang
	function addCustomerCart($data)
	{
		$this->insert(TBL_CUSTOMER_CART,$data);
	}
	
	

}

?>