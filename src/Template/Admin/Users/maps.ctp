<nav class="actions">
	<ul class="view-list">
<?php  foreach($Cities as $city){?>
		<li><?php echo $this->Html->link(__($city['title']), array('action' => 'edit', $city['id'])); ?> </li>
<div style="clear:both"></div>
<?php }?>
		
	</ul>
	
</nav>