<?php $site_url = $this->Url->build('/',true); ?> 
<h3><?php echo __('Locations of '.$city_name);?></h3>
<div class="users index">
	<table cellpadding="0" cellspacing="0" class="listing">
	<tr class="headings">
			<th><?php echo 'Id';?></th>
                        <th><?php echo 'Name';?></th>
			<th><?php echo 'Map';?></th>
			<th class="actions"><?php echo 'Actions';?></th>
	</tr>
	<?php
        if($Locations){
	foreach ($Locations as $Location): ?>
	<tr class="autoWidth">
		<td><?php echo $Location['id']; ?>&nbsp;</td>
                <td style=" width: 500px;"><?php echo $Location['name']; ?>&nbsp;</td>
                <td><?php if($Location['location_map'] != ''){?>
                <img src="<?=$site_url?>img/maps/<?php echo $Location['location_map'];?>" alt="img" width="20%" height="20%"/>
               <?php }else{?>
                 <img src="<?=$site_url?>img/maps/awaiting.jpg" alt="img" width="20%" height="20%"/>
               <?php }?>&nbsp;</td>
		
		<td class="actions">
			
			<?php echo $this->Html->link($this->Html->image('admin/edit.png',array('escape'=>false,'style'=>'height:18px; width:18px;','title'=>'Edit')), array('action' => 'edit', $Location['id']),array('escape'=>false)); ?>
		</td>
	</tr>
<?php endforeach;
        }else{?>
        <tr> <td colspan="5">No Record Found</td></tr>
        <?php }?>
	</table>
</div>
