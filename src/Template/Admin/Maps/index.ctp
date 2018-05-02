<?php $site_url = $this->Url->build('/',true); ?> 
<h3><?php echo __('Pakistan Cities ');?></h3>
<div class="users index">
	<table cellpadding="0" cellspacing="0" class="listing">
	<tr class="headings">
			<th><?php echo 'Id';?></th>
                        <th><?php echo 'Name';?></th>
			<th><?php echo 'No Of Locations';?></th>
			<th class="actions"><?php echo 'Actions';?></th>
	</tr>
	<?php
        if($Cities){
	foreach ($Cities as $City): ?>
	<tr class="autoWidth">
		<td><?php echo $City['id']; ?>&nbsp;</td>
                <td style=" width: 500px;"><?php echo $this->Html->link(__($City['title']), array('action' => 'locations', $City['id'])); ?>&nbsp;</td>
                <td><?php echo number_format($this->GetInfo->getLocationCount(array('city_id'=>$City['id'])));?>&nbsp;</td>
		
		<td class="actions">
			
			<?php echo $this->Html->link($this->Html->image('admin/edit.png',array('escape'=>false,'style'=>'height:18px; width:18px;','title'=>'Edit')), array('action' => 'edit', $City['id']),array('escape'=>false)); ?>
		</td>
	</tr>
<?php endforeach;
        }else{?>
        <tr> <td colspan="5">No Record Found</td></tr>
        <?php }?>
	</table>
</div>
