<?php
class Classroom extends CI_Controller {
    var $data;
    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->data=array();
        //获取当前请求的基地址
        $this->data['base_URL']=base_url().index_page();
    }
    //登入教室页面
    function loginroom($gid='',$tid=''){
        if(''== $gid){
            $gid = $this->input->get('gid', TRUE);
        }
        if(''== $tid){
            $tid = $this->input->get('tid', TRUE);
        }
        //$gid = $this->input->server('QUERY_STRING');
        debug_log($tid,"gid");
        //$this->input->post('some_data', TRUE);
        //$this->input->get_post()('some_data', TRUE);
        //$this->input->cookie('some_data', TRUE);
        /*
            $cookie = array(
                'name'   => 'The Cookie Name',
                'value'  => 'The Value',
                'expire' => '86500',
                'domain' => '.some-domain.com',
                'path'   => '/',
                'prefix' => 'myprefix_',
                'secure' => TRUE
            );
            
            $this->input->set_cookie($cookie);
         */
        //$this->input->is_ajax_request();
        $this->data['curpage'] = "mycourse";
        $this->load->view('include/header',$this->data);
        $this->load->view('room/loginroom');
        $this->load->view('include/footer');
    }
    //显示教室flash
    function showroom($meetingid){
        /*
        echo "&loginOk=1&userPrem=".$power
            ."&userName=".urlencode($username)
            ."&meetingName=".urlencode($castname)
            ."&meetingMax=".$limit
            ."&srvUrl=".$srvUrl
            ."&srvMedia=".$srvMedia
            ."&srvName=".CONST_VS2_SERVERNAME
            ."&srvRoom=".CONST_VS2_ROOMNAME
            .'&actCode='.$OBJ_RM->ActCode
            .'&mCode='.$OBJ_RM->MachineCode
            .'&regCode='.$regCode;
            */
        $meetingid=1;
        $status=1;
        $token='55c6d227583d32f3ace584dd21baaee7';
        $adminuser="teacher";
        $userphoto="";
        $background="";
        $helplink="";
        $endpage="";
        $ip='127.0.0.1';
        $SET_OTHER="";
        
        $flashurl = base_url('assets/flash/mix20110120.swf');
        $this->data['value_str']=$flashurl."?meetingid=".$meetingid
        ."&meetingStatus=".$status
        ."&token=".$token
        ."&userAcc=".urlencode($adminuser)
        ."&faceImg=".urlencode($userphoto)
        ."&bgImg=".urlencode($background)
        .'&helpUrl='.urlencode($helplink)
        .'&endPage='.urlencode($endpage)
        .'&ipFrom='.urlencode($ip).$SET_OTHER;
        $this->data['curpage'] = "";
        $this->load->view('include/wheader',$this->data);
        $this->load->view('room/classroom');
        $this->load->view('include/footer');
    }
}