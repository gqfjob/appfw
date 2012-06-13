<?php
class Weibo extends CI_Controller {
    var $date;
	function __construct()
	{
		parent::__construct();
		$this->load->helper('json');	
		$this->load->library('Weibooauthv2');
		$this->load->helper('form');
		$this->data=array();
		$this->data['base_URL'] = base_url().index_page(); 
	}
	
	function index()
	{

        $this->data['wb_akey'] = $this->config->item('WB_AKEY');
        $this->data['canvas_page']= $this->config->item('CALL_BACK');
        
         
    	if(!empty($_REQUEST["signed_request"])){
            $o = new Weibooauthv2( $this->config->item('WB_AKEY') , $this->config->item('WB_SKEY') );
            $back_data=$o->parseSignedRequest($_REQUEST["signed_request"]);
            if($back_data=='-2'){
                 die('签名错误!');
            }else{
                $this->session->set_userdata('oauth2',$back_data);
            }           

        	//判断用户是否授权
            //若没有获取到access token，则弹出框发起授权请求
            $sina_oauth2 = $this->session->userdata('oauth2');
            if (empty($sina_oauth2["user_id"])) {//若没有获取到access token，则弹出框发起授权请求
                $this->data['code'] = 0;
            } else {
                //若已获取到access token，则获取用户信息
                $c = new SaeTClientV2( $this->config->item('WB_AKEY'), $this->config->item('WB_SKEY') ,$sina_oauth2['oauth_token'] ,'' );
                $sina_user  = $c->show_user_by_id($sina_oauth2["user_id"]);
                //debug_log($sina_user);
                //TODO:同步数据再写登录session
                $this->session->set_userdata('sinauid',$sina_oauth2["user_id"]);
                $this->data['code'] = 1;
            }
    	}else{
    	    //直接外部打开页面
    	    if($this->session->userdata('sinauid')){
    	       $this->data['code'] = 1;
    	       //根据sinauid获取用信息
    	    }else{
    	       $this->data['code'] = 2;
    	       //检测是否站内登录
    	       if($this->session->userdata('uid')){
    	           //根据uid获取用户信息
    	       }else{
    	           //显示登录入口
    	       }
    	    }
    	}
    	$this->data['curpage'] = "main";
        $this->load->view('include/header',$this->data);
        $this->load->view('weibo/index');
        $this->load->view('include/footer');
	     
	}
	
    function test()
    {
        if(!empty($_REQUEST["signed_request"])){
            $o = new Weibooauthv2( $this->config->item('WB_AKEY') , $this->config->item('WB_SKEY') );
            $back_data=$o->parseSignedRequest($_REQUEST["signed_request"]);
            debug_log($back_data);
        }
         
    }
}
?>