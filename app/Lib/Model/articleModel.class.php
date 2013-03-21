<?php
class articleModel extends Model {
	
	public function getOneArticle($id){
		$where['aid'] = $id;
		$strArticle = $this->where($where)->find();
		if(is_array($strArticle)){
			$articleItem = D('article_item')->where(array('itemid'=>$strArticle['itemid']))->find();
			//array_merge() 函数把两个或多个数组合并为一个数组
			$result = array_merge($articleItem, $strArticle);
			$result['user'] = D('user')->getOneUser($articleItem['userid']);
			$result ['content'] = nl2br ( ikhtml('article',$id,$result['content']) );
			return $result;
		}
		return false;
	}
	// 根据分类id 获取指定条数的文章
	public function getAllArticle($cateid , $limit=''){
		!empty($cateid) ? $where['cateid'] = $cateid : '';
		$arrArticle = $this->field('aid')->where($where)->select();
		if(is_array($arrArticle)){
			foreach ($arrArticle as $item){
				$result[] = $this->getOneArticle($item['aid']);
			}
			return $result;
		}else{
			return false;
		}
	}
}