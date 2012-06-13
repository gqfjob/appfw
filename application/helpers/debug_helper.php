<?php
 /*
  * 输出调试信息到文本
  * @param $input 需要输出的内容，支持对象，数组，和字符串遍历
  * @param $debugflag 调试标志位，便于在输出文本中定位输出信息

  * @param $die 设定调试是否需要终止程序继续执行
  *@usage 先定义一个全局变量IS_DEBUG,如果想调试变量，设置其为ture,然后 debug_log(变量名,"描述")
  * return 将结果数组输出到网站根目录的debug.txt中
  */
if(!defined('IS_DEBUG'))define("IS_DEBUG",true);

function debug_log($input,$debugflag="log",$die=false){

    if(IS_DEBUG){
        @$fp=fopen($_SERVER['DOCUMENT_ROOT']."/debug.txt",'a');       
        $val = vardump($input,$debugflag);
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
function vardump($ary,$flag="log"){
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

?>