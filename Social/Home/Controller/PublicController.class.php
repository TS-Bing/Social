<?php
/**
 * @id       PulibcAction.php
 * @desc     公共页面
 * @author   Bing    tsteam.sinaapp.com
 * @project  github.com/Ts-bing/socail
 **/ 
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
	public function Code()
	{
		$Verify = new \Think\Verify();
		$Verify->fontSize = 16;
		$Verify->length   = 4;
		$Verify->imageH = 30;
		#$Verify->fontttf = '5.ttf';
		#$Verify->useZh = true;
		$Verify->useImgBg = true;
		$Verify->useNoise = false;
		$Verify->entry();
	}
}
?>