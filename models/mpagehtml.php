<?php

class Models_MPageHtml extends Project{	function __construct(){		parent:: __construct();	}		
//lay thong tin du lieu tu id	
function getpagehtmlid($id){		$this->where('Id = '.$id);		$this->getdata(TBL_PAGEHTML);		return $this->fetchone();	}	
function getAlias($id){
		$sql = 'select Id from '.TBL_PAGEHTML.' where alias = "'.$id.'" limit 1';
		$kq = mysql_query($sql);
		$row = mysql_fetch_assoc($kq);
		return $row['Id'];
	}

}

?>