<?php
/**
 * @id       UserAction.php
 * @desc     用户页面
 * @author   Bing    tsteam.sinaapp.com
 * @project  github.com/Ts-bing/socail
 **/ 
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index()
    {
        $this->display();
    }
    
    //验证用户名
    public function CheckName(){
    	$username = I('get.username');
    	$m = M("user");
    	$where["name"] = $username;
    	$count = $m->where($where)->find();
    	if($count){
    		echo "you";
    	}else {
    		echo "meiyou";
    	}
    }
    
    //注册部分
    public  function  reg()
    {
    	$this->display();
    }
    
    public function  on_reg(){
    	$code = I('post.code');
    	$name = I('post.username');
    	$pwd = I('post.password');
    	$gpwd = I('post.password2');
    	$mail = I('post.email');
    	$yqm = I('post.yqmvf');
    	$verify = new \Think\Verify();
		
    	if(!$verify->check($code)){
    		$this->error('验证码错误!!!');
    	}elseif (!empty($yqm) && $pwd == $gpwd && !empty($name)){
    		#$ret = D("user")->add($name,$pwd,$mail);
    		#$this->ajaxReturn($ret);
    		$m = M("yqm");
    		$data['vo'] = 0;
    		$data['yqm'] = $yqm;
    		$cs = $m->where($data)->find();
    	}if($cs){
    		$count = $m->query("Update social_yqm set vo = 1 where yqm = '".$yqm."'");
    		dump($count);
    		#$ret = D("user")->add($name,$pwd,$mail);
    		#$this->ajaxReturn($ret);
    	}else {
    		$this->error('用户注册失败!!!');
    	}
    }

    //登录部分
    public function  on_login(){
    	
    	$verify = new \Think\Verify();
    	$name = I('post.username');
    	$pwd = I('post.password');
    	$code = I('post.code');
    	
    	if($verify->check($code)){
	    	$ret = D("User")->login($name,$pwd );
	    	if($ret['status'] == 1){
	    		$this->success('登录成功!!!',U('index/index'));
	    		#$this->redirect('User/index');
	    	}else{
	    		$this->error('错误!!');
	    	}
    	}else {
    		$this->error('验证码不正确!!');
    	}
    }
    
//修改密码部分
    public function modify(){
    	$id = I('get.id');
    	#$pwd = I('get.pass');
    	$m = M("test");
    	$arr = $m->find($id);
    	$this->assign("data",$arr);
    	$this->display();
    }
    
    public function update(){
    	$m = M("test");
    	$xiugai["id"] = I('post.id');
    	$xiugai["pwd"]= I('post.passwd');
    	$count = $m->save($xiugai);
    	if($count > 0){
    		$this->success('更新成功',U('index/index'));
    	}else {
    		$this->error('更新失败');
    	}
    }
    
    
    public  function logout(){
    	setcookie("cv_uid", "", time() - 3600, "/", "", FALSE, TRUE);
    	setcookie("cv_uhash", "", time() - 3600, "/", "", FALSE, TRUE);
    	$this->success('退出!!!',U('index/index'));
    }
    
    public  function yaoqingma(){
    	$uid = I('cookie.cv_uid');
    	$uhash = I('cookie.cv_uhash');
    	$user = D("User")->check($uid,$uhash);
    	if ($user){
	    	$m = M("yqm");
	    	$count = $m->count();
	    	if($count>30){
	    		$m->delete();
	    	}else {
	    		$yqm = D("User")->create_guid();
	    		$m->yqm = $yqm;
	    		$m->vo = 0;
	    		$m->add();
	    	}
	    	$this->success($yqm,'',10);
	    }else {
	    		$this->redirect('User/index');
	    }
    	#$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <p>验证码:<b></br>{$yqm}</b>！</p></div><script type="text/javascript" src="#" charset="UTF-8"></script>','utf-8');
    }
    
     function test($len=6) {
    	//
    }
}
?>