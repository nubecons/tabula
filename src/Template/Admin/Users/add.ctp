<h3><?php echo __('Add Admin')?></h3>
<div class="users form">
<?php echo $this->Form->create('User');?>
	<?php
	    echo $this->Form->input('role_id',array( 'required' => true,'style' => 'width:350px'));
		echo $this->Form->input('username',array( 'required' => true,'style' => 'width:350px'));
		echo $this->Form->input('email',array('type' => 'email' , 'required' => true, 'style' => 'width:350px'));
		echo $this->Form->input('new_password',array( 'required' => true,'label'=>'Password','type'=>'password','style' => 'width:350px'));
		echo $this->Form->input('confirm_password',array( 'required' => true,'label'=>'Confirm Password','type'=>'password','style' => 'width:350px'));
		echo $this->Form->input('status');
	?>
    <div class="btns">
	  <?php echo $this->Form->submit('Submit', array('div' => false,'class'=>'small button'));?>
	  <?php echo $this->Html->link('Cancel', array('div' => false,'action' => "index"),array('class'=>'small button'));?>
    </div>
</div>
