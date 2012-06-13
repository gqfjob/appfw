<?php
    //
    //检查当前action是否在排除过滤数组$ignorearr中
    //$ignorearr=array('className/actionName','*/actionName','className/*',...)
    //
    function ignoreAction($curCls, $curAction,$ignorearr){
        if(0 == count($ignorearr))return true;
        foreach($ignorearr as $val){
            $exp = explode('/', $val);
            $strA = (('*' == $exp[0]) && ($curAction == $exp[1]));
            $strB = (($curCls == $exp[0]) && ('*' == $exp[1]));
            $strC = (($curCls == $exp[0]) && ($curAction == $exp[1]));
            if($strA || $strB || $strC)return true;
        }
        return false;
    }