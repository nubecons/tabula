<h3><?php echo __('Admins List');?></h3>
<div class="users index">
	<table cellpadding="0" cellspacing="0" class="listing">
	<tr class="headings">
			<th><?php echo $this->Paginator->sort('id');?></th>
            <th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
            <th>Password</th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($users as $key => $user): ?>
	<tr class="autoWidth<?php if( $key%2 ){echo '2';} ?>">
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
        <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
        <td><?php echo h($user['User']['new_password']); ?>&nbsp;</td>
		<td>
		 <?php
			if($user['User']['status'] == 1){
				echo $this->Html->image('icons/publish.png', array( "url" => "/admin/users/publish/".$user['User']['id']."/unpublish"));
			}else{
				echo $this->Html->image('icons/unpublish.png', array( "url" => "/admin/users/publish/".$user['User']['id']));
			}	
        ?>

        </td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php  // echo $this->Html->link($this->Html->image('admin/view.gif',array('escape'=>false,'style'=>'height:18px; width:18px;','title'=>'View')), array('action' => 'view', $user['User']['id']),array('escape'=>false)); ?>
			<?php echo $this->Html->link($this->Html->image('admin/edit.png',array('escape'=>false,'style'=>'height:18px; width:18px;','title'=>'Edit')), array('action' => 'edit', $user['User']['id']),array('escape'=>false)); ?>
			<?php 
			if($user['User']['id'] != 1)
			  {
			echo $this->Form->postLink($this->Html->image('admin/del.png',array('escape'=>false,'style'=>'height:18px; width:18px;','title'=>'Delete')), array('action' => 'delete', $user['User']['id']),array('escape'=>false), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); 
			 }
			?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p style="font-size:12px;">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')); ?>
	|	<?php echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
