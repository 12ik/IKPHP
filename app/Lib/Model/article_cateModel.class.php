<?php
class article_cateModel extends Model {
	
	// 获取全部分类
	public function getAllCate($userid = 0, $referid = 0){
		$where = array('userid'=>$userid,'referid'=>$referid);
		$result = $this->where ( $where )->select ();
		return $result;
	}
}