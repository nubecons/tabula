<table style="width: 100%; height: 100%;" cellpadding="0" 
cellspacing="0">
<tbody><tr>
<td align="center">
	<?php echo $this->Form->create('User', array('url' =>array('action' => 'login')));?>
	
    <div class="box">
    
		<table cellpadding="0" cellspacing="0">
		<tbody><tr>
		<td class="login">Email: &nbsp;</td>
		<td class="login"><?php echo $this->Form->text('User.email', array('maxlength'=>'50','id' => 'username','class' => 'text'));?>&nbsp;</td>
		<td class="login">Password: &nbsp;</td>
		<td class="login"><?php echo $this->Form->text('User.password', array('maxlength'=>'50', 'type' => 'password','id' => 'password','class' => 'text'));?> &nbsp;</td>
		<td class="login"><?php echo $this->Form->submit('Login');?></td>
		</tr>
		</tbody></table>
  
	        <div class="error">
			<?php echo $this->Session->flash();
		        	echo   $this->Session->flash('auth');
			 ?>
	        </div>
	        	 
    </div>
	
	<?php echo $this->Form->end(); ?>
</td>
</tr>
</tbody></table>

