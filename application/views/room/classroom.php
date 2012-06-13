<div class="container">  
                <!-- flash层 -->
                <div id="video_media">
                <!-- 提示安装flash -->
                        <table width="400" height="20" bgcolor="#009900" border="0" cellpadding="0" cellspacing="2">
                            <tr>
                                <td bgcolor="#eeeeee" align="left" valign="middle"><BR>
                                    <b>如果您看见本段文字，表示您的机器没有正常运行FlashPlayer。请首先检查您的浏览器是否开启了屏蔽和过滤Flash的功能。如果没有安装FlashPlayer的话，请使用下面的链接地址，进行快速安装，然后再登录会议</b><br><BR>
                                    <a href='http://www.adobe.com/products/flashplayer.html' target='_blank'>下载FlashPlayer安装包</a>
                                </td>
                            </tr>
                        </table>
                </div>
                 <!-- swf base="." 設定base="."，跟著Flash路徑走 -->
                <script language="javascript" type="text/javascript">
                    if(window.attachEvent){
                        window.attachEvent('onresize',video_media_resize);
                    }else{
                        window.addEventListener('resize',video_media_resize,false);
                    }

                    var v_DTD = (document.compatMode == "CSS1Compat" ? document.documentElement : document.body);
                    function video_media_resize()
                    {
                        var w = v_DTD.clientWidth;
                        var h = v_DTD.clientHeight;
                        var obj = document.getElementById("video_media");
                        if (obj)
                        {
                            w = (w<760?760:w);
                            h = (h<600?600:h);
                            obj.width = w;
                            obj.height = h;
                        }
                    }

                    var strf = "<?php echo $value_str;?>";
                    swfobject.embedSWF(strf, "video_media", (v_DTD.clientWidth<760?760:v_DTD.clientWidth), (v_DTD.clientHeight<600?600:v_DTD.clientHeight), "9.0.0", "expressInstall.swf", {}, {'height':'100%','width':'100%','bgcolor':'#ffffff','quality':'high','allowScriptAccess':'always','allowFullScreen':"true",'base':'.','align':'middle','menu':'false'}, {});
                </script>
</div>
