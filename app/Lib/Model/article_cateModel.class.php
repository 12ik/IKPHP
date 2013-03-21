<?php
class article_cateModel extends Model {
	
	// 根据频道nameid获取全部分类
	public function getCateByNameid($nameid){
		$where = array('nameid'=>$nameid);
		$result = $this->where ( $where )->select ();
		return $result;
	}

}