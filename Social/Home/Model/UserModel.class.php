<?php
/**
 * @id       USERAction.php
 * @desc     默认模块页面
 * @author   Bing    tsteam.sinaapp.com
 * @project  github.com/Ts-bing/socail
 **/ 
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	/**
	 *
	 */
	private function checkmd5($password,$regtime)
	{
		return  (substr(md5(md5($regtime).md5($password)),-22));
	}

//用户唯一值ֵ
	public function make_hash($user)
	{
		return substr(md5($user['name'].$user['uid'].$user['password']),-25);
	}


//cookie
	public function check($uid,$hash)#
	{
		$m = D("user");
		$user = $m->where(array("uid"=> $uid))->find();
		return  ($this->make_hash($user) == $hash ) ? $user : null;
	}

//注册部分
	function  add($username,$password,$email)
	{
	
		$where['name'] = $username;
		$where['email'] = $email;
		$where['key']= time();
		$where['password']= $this->checkmd5($password,$where['key']);
		$where['ip']= $_SERVER['REMOTE_ADDR'];
		
		$m = M("user");
		$last = $m->add($where);
		if($last){
			$ret['status']=1;
			$ret['info']="注册成功";
		}
		return $ret;
	}

//登录验证
	function login($username,$password)
	{	
		$m = D("user");
		$ret['status']=0;
		$ret['info']="";
		$user=$m->where(array("name"=> $username))->find();
		if($user){
			if($this->checkmd5($password,$user['key']) == $user['password']){	
				$ret['status']=1;
				$ret['info']="登录成功";
				setcookie("cv_uid", $user['uid'], time()+60 * 60 * 1, "/", "", FALSE, TRUE);
				setcookie("cv_uhash",$this->make_hash($user), time()+60 * 60 * 1, "/", "", FALSE, TRUE);
			}
		}
		return  $ret;
	}
//邀请码部分
	function create_guid($namespace = null) {  
	    static $guid = '';  
	    $uid = uniqid ( "", true );  
	      
	    $data = $namespace;  
	    $data .= $_SERVER ['REQUEST_TIME'];     // 请求那一刻的时间戳  
	    $data .= $_SERVER ['HTTP_USER_AGENT'];  // 获取访问者在用什么操作系统  
	    $data .= $_SERVER ['SERVER_ADDR'];      // 服务器IP  
	    $data .= $_SERVER ['SERVER_PORT'];      // 端口号  
	    $data .= $_SERVER ['REMOTE_ADDR'];      // 远程IP  
	    $data .= $_SERVER ['REMOTE_PORT'];      // 端口信息  
	      
	    $hash = strtoupper ( hash ( 'ripemd128', $uid . $guid . md5 ( $data ) ) );  
	    $guid =  substr ( $hash, 0, 8 ) . '-' . substr ( $hash, 8, 4 ) . '-' . substr ( $hash, 12, 4 ) . '-' . substr ( $hash, 16, 4 ) . '-' . substr ( $hash, 20, 12 ) ;  
	      
	    return $guid;  
	}  
	  
	//可以做hash的随机对比，上面的唯一值,如果需要自己添加
	function randstr($len=6) {
		#$db = M();
		#dump($db->query($sql = 'show tables'));
		mt_srand((double)microtime()*1000000*getmypid());
		$password='';
		$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
		$len =6;
		while(strlen($password)<$len)
			$password.=substr($chars,(mt_rand()%strlen($chars)),1);
		return  $password;
	}
	
	
}
?>