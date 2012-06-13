<?php
if(!defined('IS_DEBUG'))define("IS_DEBUG",true);
class  CheckURI{
    private $URI;
    function __construct(){
        $this->URI =  $_SERVER["REQUEST_URI"];
    }
    /*
    | -------------------------------------------------------------------------
    | rectify
    | -------------------------------------------------------------------------
    | 矫正路由将路由中的 &action=xxxx变成 /action/xxxx格式
    |
    |
    */  
    function rectify(){
        $this->_debug_log($this->URI);
        $str = $this->URI;
        //正则替换字符串中出现的【？= &】为【/】，结尾的等号不能替换,有可能是base64编码形成的
        $glc=array('&','=','?');
        $replace = '/';
        if($this->_checkstr($str,$glc)){
            $newstr = str_replace($glc, $replace, $str);
            //TODO:如果有两个连续的等于号，先替换成**,然后再替换回来
            if(mb_substr($str, -2) == "=="){
                //还原最后两位
                $res = mb_substr($newstr, -2)."==";
            }else if(mb_substr($str, -1) == "="){
                //还原最后一位
                $res = mb_substr($newstr, -1)."=";
            }else{
                $res = $newstr;
            }
            $_SERVER["REQUEST_URI"] = $res;
        }

    }
    
    /*
     * 字符串$str中是否包含数组$gls中任一字符串
     */
    function _checkstr($str,$gls){
        foreach($gls as $gl){
            $tmparray = explode($gl,$str);
            if(count($tmparray)>1){
                return true;
            }
        }
        return false;
    }


    /*
    | -------------------------------------------------------------------------
    | _debug_log
    | -------------------------------------------------------------------------
    | 调试函数，记录调试信息到根目录
    */  
    function _debug_log($input,$debugflag="log",$die=false){
    
        if(IS_DEBUG){
            @$fp=fopen($_SERVER['DOCUMENT_ROOT']."/debug.txt",'a');       
            $val = $this->_vardump($input,$debugflag);
            $val = str_replace("__set_state","",$val);
            $val = str_replace("stdClass::(array(","object((",$val);
            fwrite($fp,$val);
            fclose($fp);
            if($die){
                echo "stoped";
                die();
            }
        }
     }
     /*
      *  返回变量字符串
      * 
      *  @param $flag   调试标签
      *  @param $ary    调试变量
      */
    function _vardump($ary,$flag="log"){
        $str = $pre = '';
        $r = "\r\n";
        $flgs = "-------------------------".$flag." start-----------------------------".$r;
        $flge = "-------------------------".$flag." end-------------------------------".$r;
        if(!is_array($ary)){
           if(is_string($ary)){
            $str .= 'string('.strlen($ary).') \''.$ary.'\'';
           }elseif(is_int($ary)){
            $str .= 'int('.$ary.')';
           }elseif(is_float($ary)){
            $str .= 'float('.$ary.')';
           }elseif(is_bool($ary)){
            $str .= 'bool('.var_export($ary, TRUE).')';
           }elseif(is_object($ary)){
            $str .= 'object('.var_export($ary, TRUE).')';
           }else{
            $str .= var_export($ary, TRUE);
           }
        }else{
           $str .= 'array('.count($ary).'){'.$r;
           foreach($ary as $key=>$value){
            $str .= '[\''.$key.'\']='.vardump($value, '[\''.$key.'\']');
           }
           $str .= '}'.$r;
        }
        return $flgs.$str.$r.$flge;
    } 
}
