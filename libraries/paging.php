<?php
class Paging
{
	function divPage($total = 0,$currentPage = 0,$div = 5,$rows = 10,$goto){
		if(!$total || !$rows || !$div || $total<=$rows) return false;
		
		$nPage = floor($total/$rows) + (($total%$rows)?1:0);
		$nDiv  = floor($nPage/$div) + (($nPage%$div)?1:0);
		$currentDiv = floor($currentPage/$div) ;
		$sPage = '';
		
		if($currentDiv) {
			$sPage .= '<a href="'.$goto.'/p0" class = \'apaging\'>Đầu tiên</a> ';
			$sPage .= '<a href="'.$goto.'/p'.($currentDiv - 1).'"> Trước</a> ';
		}
		
		$count =($nPage<=($currentDiv+1)*$div)?($nPage-$currentDiv*$div):$div;
		
		for($i=0;$i<$count;$i++){
			$page = ($currentDiv*$div + $i);
			$sPage .= '<a href="'.$goto.'/p'.($currentDiv*$div + $i ).'" '.(($page==$currentPage)?'class="current"':'').'>'.($page+1).'</a> ';
		}
		
		if($currentDiv < $nDiv - 1){			
			$sPage .= '<a href="'.$goto.'/p'.($currentDiv+1).'">Sau</a> ';
			$sPage .= '<a href="'.$goto.'/p'.(($nDiv-1)*$div + 1 ).'">Cuối cùng</a>';
		}
		return $sPage;
	}
}
?>