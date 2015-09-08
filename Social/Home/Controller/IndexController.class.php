<?php
/**
 * @id       IndexAction.php
 * @desc     搜索页面
 * @author   Bing    tsteam.sinaapp.com
 * @project  github.com/Ts-bing/socail
 **/ 
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$uid = I('cookie.cv_uid');
    	$uhash = I('cookie.cv_uhash');
    	$user = D("User")->check($uid,$uhash);#
    	
    	
    	$search['C1']= I('get.C1');
    	$search['C2']= I('get.C2');
    	$search['C3']= I('get.C3');
    	if ($user){
    		switch ($search['C1'])
    		{
    			case 'l1':
	    			$show = $this->search($search['C2'],$search['C3']);
		    		break;
	    		case 'k1':	    			
		    		$show = $this->search1($search['C2'],$search['C3']);
	    			break;
	    		default:
	    			$show = "";
	    			
    		}
    	}else {
    		$this->redirect('User/index');
    	}
    	$this->assign('stat',$show['status']);
    	$this->assign('test',$show['arr']);
    	$this->assign('page',$show['page']);
    	$this->assign('count',$show['count']);
    	$this->assign('data',$user['name']);
    	$this->display();
    }
    
    protected function search($col,$name){
    	$db = M();
    	$tables = $db->query($sql = 'show tables');
    	foreach ($tables as $key => $value){
    		foreach ($value as $k1 => $val){
    			if($val != social_user && $val != social_yqm && $val !=social_test){
    				$s[]="select nick,name,pwd,gpwd,mail,card,phone,ip,address,site,salt from $val where name like '$name%'";
    			}
    		}
    	}
    	$s1=implode("','", $s);
    	
    	$show['status'] = 1 ;
    	$arr = array("$col" => Array('like',$name.'%'));
    	$show['count'] = 500;#$m->where($arr)->count();
    	$Page = new \Think\Page($show['count'],25,$parameter=array());
    	$Page->setConfig('header','条记录');
    	$show['page'] = $Page->show();
    	$show['arr'] = $db->field('nick,name,pwd,salt,gpwd,mail,card,phone,ip,address,site')->table('social_test')->where($arr)->union($s1)->select();
    	#$show['arr'] = $m->where($arr)->limit($Page->firstRow.','.$Page->listRows)->select();
    	
    	
		return $show;
    }
    
    protected function search1($col,$name){
    	$db = M();
    	$tables = $db->query($sql = 'show tables');
    	foreach ($tables as $key => $value){
    		foreach ($value as $k1 => $val){
    			if($val != social_user && $val != social_yqm && $val !=social_test){
    				$s[]="select nick,name,pwd,gpwd,mail,card,phone,ip,address,site,salt from $val where name like '$name%'";
    			}
    		}
    	}
    	$s1=implode("','", $s);
    	
    	$show['status'] = 1 ;
    	$arr = array("$col" => Array('eq',$name.'%'));
    	$show['count'] = 500;#$m->where($arr)->count();
    	$Page = new \Think\Page($show['count'],25,$parameter=array());
    	$Page->setConfig('header','条记录');
    	$show['page'] = $Page->show();
    	$show['arr'] = $db->field('nick,name,pwd,salt,gpwd,mail,card,phone,ip,address,site')->table('social_test')->where($arr)->union($s1)->select();
    	#$show['arr'] = $m->where($arr)->limit($Page->firstRow.','.$Page->listRows)->select();
    	
    	
		return $show;
    }
}
?>