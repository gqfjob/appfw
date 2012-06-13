<?php
Class OauthClass {
	private $CI;
	private $currentMethod;
	private $currentClass;
	
	function __construct(){
        $this->CI = & get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('debug');
        $this->CI->load->helper('ignoreac');
        
        $RTR =& load_class('Router');
        $this->currentMethod = $RTR->fetch_method(); 
        $this->currentClass = $RTR->fetch_class();
    }

    function checkLogin(){
    	//保存两个session 微博uid存在，用户是微博用户，不然再检查本站uid，不存在，则看来源
        //$referer = $_SERVER['HTTP_REFERER'];
        //$preg = '/http:\/\/show\.spksrc\.com\/.*?/i';
        //if( !preg_match($preg, $referer) ){
            //debug_log("引用");
            //获取当前action，如果是默认的通过
            //debug_log($this->CI->config->item('WB_AKEY'));
            $ignorearr = $this->CI->config->item('ignore_arr');
            if(ignoreAction($this->currentClass,$this->currentMethod,$ignorearr)){
                //do nothing just pass
            }else{
                //不是默认ACTION,检查session，不存在跳转到默认action
                if($this->CI->session->userdata('sinauid')){
                	
                }else{
                   //debug_log(base_url());
                   header("location:".base_url().index_page()."/weibo/index");
                   die;
                }
            }
        //}else{
            //debug_log("直接打开");
        //}       

    }

}