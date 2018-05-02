<?php 
	echo $this->Html->css('validationEngine.jquery.css');
	echo $this->Html->script('languages/jquery.validationEngine-en.js');
	echo $this->Html->script('jquery.validationEngine.js');
?>
<script>
	jQuery(document).ready(function(){			
		jQuery("#UserForgotresetForm").validationEngine();
	});			
</script>			
<div id="create_order" class="widget_content">
<?php echo $this->Form->create(null, ['url' => ['action' => 'forgotreset'], 'id' => 'UserForgotresetForm']); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="form_table">
   <tr>
      <td width="120"><label>New Password:</label></td>
      <td><?php //echo $form->password('new_password', array('size'=>"40", 'class'=>'validate[required]'))?>
      <?php echo $this->Form->password('new_password', ['size'=>"40", 'class'=>'validate[required]','label'=>false, 'id'=>'UserNewPassword']); ?>
      </td>
   </tr>
   <tr>
      <td><label>Confirm Password:</label></td>
      <td><?php //echo $form->password('confirm_password', array('size'=>"40", 'class'=>'validate[required,equals[UserNewPassword]]'))?>
      <?php echo $this->Form->password('confirm_password', ['size'=>"40", 'class'=>'validate[required,equals[UserNewPassword]]']); ?>
      </td>
   </tr>
   <tr>
      <td>&nbsp </td>
      <td>
         <table>
            <tr>
               <td><?php //e($form->submit('Change',array('value'=>'Change','class'=>'b_empty btn_red','div'=>false,'label'=>false)))?>
               <?php echo $this->Form->button(__('Change'), ['class'=>'b_empty btn_red']); ?>
               </td>
               <td> &nbsp; </td>
               <td> &nbsp; </td>
            </tr>
         </table>
      </td>
   </tr>
</table>	
<?php echo $this->Form->end();?>	
</div>