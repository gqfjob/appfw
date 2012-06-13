<?php
/*
 * oauth2 api 客户端
 * 
 * 
 */
class Api extends CI_Controller{
	var $client_id = "123456";
	var $client_secret = "guoqiang123456";
	var $callback = "http://show.spksrc.com/index.php/api/callback";
	var $data = array();
	
	function __construct(){
		parent::__construct();
		$this->load->library('Httpreq');
		$this->load->helper('debug');
		$this->data['curpage'] = "main";
		$this->data['base_URL'] = base_url().index_page();
	}
	function index(){
		$param = array();
	    $url = "http://api.spksrc.com/authorize.php";
	    //$param['accept'] = 'Yep';
		$param['client_id'] = $this->client_id;
		$param['redirect_uri'] = $this->callback;
		$param['response_type'] = "code";
		$param['state'] = "00000";
	    //$httpreq = new Httpreq();
		//$res = $httpreq->post($url, $param);
	    $this->data['requrl'] = $url."?client_id=".$this->client_id."&redirect_uri=".$this->callback."&response_type=code&state=00000";
		
	    
	    $this->load->view('include/header', $this->data);
		$this->load->view('api/index');
		$this->load->view('include/footer');

	}
	function callback(){
		if($this->input->get('code')){
		    //TODO:拿code换取access_token
		    $this->data['code'] = $this->input->get('code');	
		}else{
			show_error("无权限");
		}
		/*
		 *  grant_type：使用Authorization Code 作为Access Grant时，此值为“authorization_code”。
			code：Authorization Code；
			client_id：应用的API Key；
			client_secret：应用的Secret Key；
			redirect_uri：必须与获取Authorization Code时传递的“redirect_uri”保持一致。
			
			  "grant_type" => array("filter" => FILTER_VALIDATE_REGEXP, "options" => array("regexp" => OAUTH2_GRANT_TYPE_REGEXP), "flags" => FILTER_REQUIRE_SCALAR),
		      "scope" => array("flags" => FILTER_REQUIRE_SCALAR),
		      "code" => array("flags" => FILTER_REQUIRE_SCALAR),
		      "redirect_uri" => array("filter" => FILTER_SANITIZE_URL),
		      "username" => array("flags" => FILTER_REQUIRE_SCALAR),
		      "password" => array("flags" => FILTER_REQUIRE_SCALAR),
		      "assertion_type" => array("flags" => FILTER_REQUIRE_SCALAR),
		      "assertion" => array("flags" => FILTER_REQUIRE_SCALAR),
		      "refresh_token" => array("flags" => FILTER_REQUIRE_SCALAR),
		 * */
        $param = array();
        $url = "http://api.spksrc.com/token.php";
        $param['client_id'] = $this->client_id;
        $param['client_secret'] = $this->client_secret;
        $param['redirect_uri'] = $this->callback;
        $param['state'] = "00000";		
		$param['grant_type'] = 'authorization_code';
		$param['code'] = $this->input->get('code');
        $httpreq = new Httpreq();
        $this->data['res'] = $httpreq->post($url, $param);
		
		$this->load->view('include/header', $this->data);
		$this->load->view('api/callback');
		$this->load->view('include/footer');
		
	}
}