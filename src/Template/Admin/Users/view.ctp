<h3><?php  echo __('User Detail');?></h3>
<div class="users view">
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userdata['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($userdata['User']['email']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Confirmed'); ?></dt>
		<dd>
			<?php echo h($userdata['User']['confirmed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($userdata['User']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userdata['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($userdata['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<nav class="actions">
	<ul class="view-list">
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $userdata['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $userdata['User']['id']), null, __('Are you sure you want to delete # %s?', $userdata['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<div style="clear:both"></div>
	</ul>
	
</nav>