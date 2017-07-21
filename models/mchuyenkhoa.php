<?php
class Models_MChuyenkhoa extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	//liet ke danh sach du lieu
	function listdata($select = "",$where = "",$orderby = "",$limit = ""){
		if(isset($select) && $select != ""){
			$this->select($select);
		}else{
			$this->select("*");
		}
		if($where != "")
			$this->where = ($where);
		$orderby = ($orderby != "")?$orderby:"sort asc,Id desc";
		
		$this->select('Id,title_vn,sort,ticlock');
		$this->getdata(TBL_CHUYENKHOA,$orderby,$limit);
		return $this->fetchall();
	}
	
	//lay thong tin mot chu de
	function getOneCatnews($id){
		$this->where("Id = $id");
		$this->getdata(TBL_CHUYENKHOA);
		return $this->fetchone();
	}
	
	//lay tat ca cac id cung mot id goc tao thanh chuoi
	function getallcatidstr($id)
	{
		$allid = "";
		$sql =  mysql_query("select Id from ".TBL_CHUYENKHOA." where ".parentid." = '$id'");
		while($rows = mysql_fetch_assoc($sql))
		{
			$allid .= ",".$rows['ID'];
		}
		
		$strid = substr($allid ,strstr($allid ,",")+1);
		if($strid == ""){
			$strid = $id;
		}
		return $strid;
	}
	
}
?>