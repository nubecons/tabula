<h3><?php echo __('Edit Admin');?></h3>
<div class="users form">
<?php echo $this->Form->create('User');?>
	<?php
		echo $this->Form->input('id');
		
		echo $this->Form->input('role_id',array( 'required' => true,'style' => 'width:350px'));
		echo $this->Form->input('username',array( 'required' => true,'style' => 'width:350px'));
		echo $this->Form->input('email',array('type' => 'email' , 'required' => true, 'style' => 'width:350px'));
		echo $this->Form->input('change_pass',array('id' =>'checkpass' , 'label' => 'Change Password' ,'type' => 'checkbox','onclick' => "showhide()"));
		
	?>
        <div id="div_change_pass" style="display:none" >
		<?php
		echo $this->Form->input('new_password',array( 'type'=>'password'));
		echo $this->Form->input('confirm_password',array( 'label'=>'Confirm Password','type'=>'password'));
		 ?>
         </div>
         <?php
		echo $this->Form->input('status');
	?>

 <div class="btns">
	  <?php echo $this->Form->submit('Submit', array('div' => false,'class'=>'small button'));?>
	  <?php echo $this->Html->link('Cancel', array('div' => false, 'action' => "index"),array('class'=>'small button'));?>
  </div>
</div>

<script>
function showhide()
{

    if($('#checkpass').attr('checked'))
	  {
	  $('#div_change_pass').show();	  
	 }else{
	  $('#div_change_pass').hide();		 
		 }
}

showhide();
</script>

