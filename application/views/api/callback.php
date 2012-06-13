<div class="hero-unit">
<?php 
if(is_array($res)){
	foreach($res as $key => $val){
		echo $key,"->",$val,"<br/>";
	}
}else{
	echo $res;
}
?>
</div>