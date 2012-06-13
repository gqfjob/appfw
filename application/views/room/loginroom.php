<div class="container">  
    <div class="hero-unit">
        <h2>三源教育</h2>
		<?php echo form_open('weibo/index', array('class' => 'form-horizontal', 'id' => 'myform'));?>
		<?php echo form_fieldset('这里是教室信息介绍');?>

          <div class="control-group">
            <?php echo form_label('文本输入框', 'username', array('class' => 'control-label','style' => 'color: #000;'));?>
            <div class="controls">
              <?php echo form_input(array('name'=> 'username','id'=>'username','value'=> 'johndoe','maxlength'=> '100','size'=> '50'));?>
              <p class="help-block">除了文本域之外，任何HTML5输入框都是该样式</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="prependedInput">前置文本</label>
            <div class="controls">
              <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span><input id="prependedInput" size="20" type="text">
              </div>
              <p class="help-block">这里显示帮助信息</p>
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">单选钮</label>
            <div class="controls">
              <label class="radio">
                <?php echo form_radio(array('name'=> 'optionsRadios','id'=> 'optionsRadios1','value'=> '0','checked'=> TRUE,'style'=> 'margin-right:10px'),'onClick="some_function()"');?>
                                        选择异或不许—使用时最好给出选择的理由
                </label>
              <label class="radio">
                <?php echo form_radio(array('name'=> 'optionsRadios','id'=> 'optionsRadios2','value'=> '1','style'=> 'margin-right:10px'),'onClick="some_function()"');?>
                                         第二个选项，如果选译该选项就会取消第一个选项。
              </label>
            </div>
          </div>
          <div class="control-group">         
            <label class="control-label" for="optionsCheckbox">复选框</label>
            <div class="controls">
              <label class="checkbox">
                <?php echo form_checkbox(array('name'=> 'newsletter','id'=> 'optionsCheckbox','value'=> 'accept','checked'=> TRUE,'style'=> 'margin-right:10px'),'onClick="some_function()"');?>选择异或不许—使用时最好给出选择的理由
              </label>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="select01">选择框</label>
            <div class="controls">
			  <?php 
				$options = array('0'  => '请选择','1'    => 'Medium Shirt','2'   => 'Large Shirt','3' => 'Extra Large Shirt',);
				echo form_dropdown('select01', $options, '1','id="select01" onChange="some_function();"');
			  ?>            
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="multiSelect">复选框</label>
            <div class="controls">
            <?php
              $selects=array('0', '3'); 
              echo form_dropdown('select02', $options, $selects,'id="multiSelect" onChange="some_function();"');
            ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="fileInput">上传框</label>
            <div class="controls">
              <?php echo form_input(array('name'=> 'fileInput','id'=>'fileInput','class'=>'input-file','type'=>'file'));?>       
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="textarea">文本域</label>
            <div class="controls">
              <?php echo form_textarea(array('name'=> 'username','id'=>'textarea','class'=>'input-xlarge','value'=> 'johndoe','rows'=> '3','cols'=> '5'));?>
            </div>
          </div>
          <div class="form-actions">
            <?php echo form_button(array('name' => 'button','id' => 'button','class' => 'btn btn-primary','type' => 'submit','content' => '保存更改'));?>
            <?php echo form_button(array('class' => 'btn','type' => 'reset','content' => '取消'));?>
          </div>
		<?php echo form_fieldset_close()?>
		<?php echo form_close();?>
        <a class="btn btn-primary btn-large" href="<?php echo $base_URL."/classroom/showroom/12345" ?>" target="_self">进入教室</a>
    </div>
</div>
