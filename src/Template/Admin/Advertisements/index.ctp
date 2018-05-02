<?php $site_url = $this->Url->build('/',true); ?> 
<h3><?php echo __('Advertisements');?> <div style=" float: right;"><?php echo $this->Html->link(__('Create New'), array('action' => 'add'));?></div></h3>

<div class="users index">
	<table cellpadding="0" cellspacing="0" class="listing">
	<tr class="headings">
			<th><?php echo 'Id';?></th>
                        <th><?php echo 'title';?></th>
			<th><?php echo 'Link';?></th>
                        <th><?php echo 'image';?></th>
                        <th><?php echo 'Paid';?></th>
                        <th><?php echo 'Status';?></th>
			<th class="actions"><?php echo 'Actions';?></th>
	</tr>
	<?php
        if($Advertisements){
	foreach ($Advertisements as $Advertisement): ?>
	<tr class="autoWidth">
		<td><?php echo $Advertisement['id']; ?>&nbsp;</td>
                <td style=" width: 500px;"><?php echo $this->Html->link(__($Advertisement['title']), array('action' => 'edit', $Advertisement['id'])); ?>&nbsp;</td>
                <td><?php echo $Advertisement['link'];?>&nbsp;</td>
                <td><?php echo $Advertisement['add_image'];?>&nbsp;</td>
                <td><?php echo $Advertisement['is_paid'];?>&nbsp;</td>
                <td><?php echo $Advertisement['status'];?>&nbsp;</td>
		
		<td class="actions">
			
			<?php echo $this->Html->link($this->Html->image('admin/edit.png',array('escape'=>false,'style'=>'height:18px; width:18px;','title'=>'Edit')), array('action' => 'edit', $Advertisement['id']),array('escape'=>false)); ?>
		</td>
	</tr>
<?php endforeach;
        }else{?>
        <tr> <td colspan="10">No Record Found</td></tr>
        <?php }?>
	</table>
</div>
