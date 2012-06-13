<div class="hero-unit">
<h2>授权请求</h2>


<script src="http://tjs.sjs.sinajs.cn/t35/apps/opent/js/frames/client.js" language="JavaScript"></script>
<?php if(0== $code){?>
<script> 
function authLoad(){
    App.AuthDialog.show({
    client_id : '<?php echo $wb_akey;?>',    //必选，appkey
    redirect_uri : '<?php echo $canvas_page;?>',     //必选，授权后的回调地址，例如：http://apps.weibo.com/giftabc
    height: 120    //可选，默认距顶端120px
    });
}
authLoad();
</script>
<?php }else{?>
<a href="<?php echo $base_URL;?>/frontpage/index?gid=123456" target="_self">另外一页</a>
<a href="<?php echo $base_URL;?>?c=classroom&m=loginroom&gid=123456&tid=220" target="_self">查看教室信息</a>
<a href="<?php echo $base_URL;?>/classroom/loginroom/123456/oox" target="_self">查看教室信息url2</a>

<?php }?>
</div>