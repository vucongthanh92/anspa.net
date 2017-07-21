<?php

if(isset($_GET['id']))
{	
	$val = varGet("id");
	$id = substr($val,0,strpos($val, '-'));
	$mabout = new Models_MAbout;
	$mcomment = new Models_MComment;
	$mflash = new Models_MFlash;
	$arr["qcleft"] = $mflash->listdata('*', 'location = "3"','sort asc, Id desc');
	$arr["qcright"] = $mflash->listdata('*', 'location = "4"','sort asc, Id desc');
	$arr["comment"] = $mcomment ->listdata("*","ticlock='0'","sort ASC, Id DESC",5);
	$arr["cat"] = $mabout->listdata("*","ticlock='0'","sort ASC, Id ASC",100);
	/*
	 * dem so len doc len 1
	 */
	/*
	 * lay tin tuc
	 */
	$arr['news'] = $mabout -> getOneNews($id,"Id,title_".lang.",content_".lang.",images");
	$arr["idatv"] = $id;
	
	$idcat = $arr['news']['idcat']; 
	/*
	 * lay tieu de nhom tin 
	 */
	$arr['map_title'] = $arr['news']['title_'.lang] ;
	/*
	 * cac tin khac
	 */
	$arr['othernews'] = $mabout -> listdata("Id,title_".lang,"Id != '$id' and ticlock ='0'","Id desc","10");
	loadview("gioithieu/view_detailnews",$arr);
}
?>