<h3>Change Password</h3>
<div class="form">
  <fieldset>  
  <?php echo $this->Form->create('User', array('class' =>'general', 'url' =>array('action' => 'changePassword')));?>
        <?php // echo $this->Form->input('id')?>
		  <?php echo $this->Form->input('group_id', array( 'style' => 'width:350px','type' => 'hidden'))?>
        <?php echo $this->Form->input("old_password", array('style' => 'width:350px','size' => 20, 'type'=>'password'))?>
        <?php echo $this->Form->input('new_password', array('style' => 'width:350px','size' => 20,'type'=>'password'))?>
        <?php echo $this->Form->input('confirm_password', array('style' => 'width:350px','size' => 20,'type'=>'password'))?>
        
   <div class="btns">
	  <?php echo $this->Form->submit('Change',array('div' => false, 'class'=>'small button'));?>
	  <?php echo $this->Html->link('Cancel', '/admin/users/index', array('class'=>'small button'));?>
  
	  
  </div>
</fieldset>
</div>