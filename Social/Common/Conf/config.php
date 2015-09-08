<?php
return array(
	'DB_TYPE'=>'MYSQL',
	'DB_HOST'=>'LOCALHOST',
	'DB_NAME'=>'social',
	'DB_USER'=>'root',
	'DB_PWD'=>'',
	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'social_',
	'TEMPLATE_CHARSET'=>'utf-8',
	'OUTPUT_CHARSET'=>'utf-8',
	#'DEFAULT_MODULE'=>'Home',
	#'DEFAULT_CONTROLLER'=>'User',
	#'DEFAULT_ACTION'=>'index',
	#'SHOW_PAGE_TRACE'=>true, 
	'URL_CASE_INSENSITIVE'=>true,  
	#'TMPL_ACTION_ERROR' => 'Public:error', // 默认错误跳转对应的模板文件
	#'TMPL_ACTION_SUCCESS' => 'Public:success', // 默认成功跳转对应的模板文件
	#'TMPL_EXCEPTION_FILE'   =>  'Public:404',// 异常页面的模板文件
		
	'VAR_FILTERS'=>'filter_default', 
	'DEFAULT_FILTER'=> 'strip_tags,htmlspecialchars', 
		
	'TMPL_PARSE_STRING'=>array(           
			'__Css__'=>__ROOT__.'/Public/Css',
			'__Js__'=>__ROOT__.'/Public/Js',
			'__Image__'=>__ROOT__.'/Public/Image',
	),
	'LOG_RECORD' => true, // 开启日志记录
	'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR,WARN', // 只记录EMERG ALERT CRIT ERR 错误
	
	/* 用户相关设置 */
	'USER_MAX_CACHE'     => 1000, //最大缓存用户数

	/* 文件上传相关配置 */
	'DOWNLOAD_UPLOAD' => array(
			'mimes'    => '', //允许上传的文件MiMe类型
			'maxSize'  => 0, //上传的文件大小限制 (0-不做限制)
			'exts'     => 'jpg,gif,png,jpeg,zip,rar,tar,gz,7z,doc,docx,txt,xml', //可防止管理员在不经意间上传不安全后缀的文件
			'autoSub'  => true, //自动子目录保存文件
			'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
			'rootPath' => './Uploads/Download/', //保存根路径
			'savePath' => '', //保存路径
			'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
			'saveExt'  => '', //文件保存后缀，空则使用原后缀
			'replace'  => false, //存在同名是否覆盖
			'hash'     => true, //是否生成hash编码
			'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
	), //下载模型上传配置（文件上传类配置）
	/* 图片上传相关配置 */
	'PICTURE_UPLOAD' => array(
			'mimes'    => '', //允许上传的文件MiMe类型
			'maxSize'  => 0, //上传的文件大小限制 (0-不做限制)
			'exts'     => 'jpg,gif,png,jpeg', //允许上传的文件后缀
			'autoSub'  => true, //自动子目录保存文件
			'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
			'rootPath' => './Uploads/Picture/', //保存根路径
			'savePath' => '', //保存路径
			'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
			'saveExt'  => '', //文件保存后缀，空则使用原后缀
			'replace'  => false, //存在同名是否覆盖
			'hash'     => true, //是否生成hash编码
			'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
	), //图片上传相关配置（文件上传类配置）
	
	'PICTURE_UPLOAD_DRIVER'=>'local',
	'DOWNLOAD_UPLOAD_DRIVER'=>'local',
	//本地上传文件驱动配置
	'UPLOAD_LOCAL_CONFIG'=>array(),
	'UPLOAD_BCS_CONFIG'=>array(
			'AccessKey'=>'',
			'SecretKey'=>'',
			'bucket'=>'',
			'rename'=>false
	),	
);